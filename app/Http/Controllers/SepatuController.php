<?php

namespace App\Http\Controllers;

use App\Models\Sepatu;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SepatuController extends Controller
{

    public function index()
    {

        $query = Sepatu::latest();
        if (request('search')) {
            $query->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('deskripsi', 'like', '%' . request('search') . '%');
        }
        $sepatus = $query->paginate(6)->withQueryString();
        return view('homepage', compact('sepatus'));
    }

    public function detail($id)
    {
        $sepatu = Sepatu::find($id);
        return view('detail', compact('sepatu'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('input', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'string', 'max:255', Rule::unique('sepatu', 'id')],
            'nama' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer',
            'brand' => 'required|string',
            'foto_sampul' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Jika validasi gagal, kembali ke halaman input dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect('sepatus/create')
                ->withErrors($validator)
                ->withInput();
        }

        $randomName = Str::uuid()->toString();
        $fileExtension = $request->file('foto_sampul')->getClientOriginalExtension();
        $fileName = $randomName . '.' . $fileExtension;

        // Simpan file foto ke folder public/images
        $request->file('foto_sampul')->move(public_path('images'), $fileName);
        // Simpan data ke table movies
        sepatu::create([
            'id' => $request->id,
            'nama' => $request->nama,
            'category_id' => $request->category_id,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'brand' => $request->brand,
            'foto_sampul' => $fileName,
        ]);

        return redirect('/')->with('success', 'Data berhasil disimpan');
    }

    public function data()
    {
        $sepatus = Sepatu::latest()->paginate(10);
        return view('data-sepatus', compact('sepatus'));
    }

    public function edit($id)
    {
        $sepatu = Sepatu::find($id);
        $categories = Category::all();
        return view('form-edit', compact('sepatu', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer',
            'brand' => 'required|string',
            'foto_sampul' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Jika validasi gagal, kembali ke halaman edit dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect("/sepatus/edit/{$id}")
                ->withErrors($validator)
                ->withInput();
        }

        // Ambil data movie yang akan diupdate
        $sepatu = Sepatu::findOrFail($id);

        // Jika ada file yang diunggah, simpan file baru
        if ($request->hasFile('foto_sampul')) {
            $randomName = Str::uuid()->toString();
            $fileExtension = $request->file('foto_sampul')->getClientOriginalExtension();
            $fileName = $randomName . '.' . $fileExtension;

            // Simpan file foto ke folder public/images
            $request->file('foto_sampul')->move(public_path('images'), $fileName);

            // Hapus foto lama jika ada
            if (File::exists(public_path('images/' . $sepatu->foto_sampul))) {
                File::delete(public_path('images/' . $sepatu->foto_sampul));
            }

            // Update record di database dengan foto yang baru
            $sepatu->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'category_id' => $request->category_id,
                'harga' => $request->harga,
                'brand' => $request->brand,
                'foto_sampul' => $fileName,
            ]);
        } else {
            // Jika tidak ada file yang diunggah, update data tanpa mengubah foto
            $sepatu->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'category_id' => $request->category_id,
                'harga' => $request->harga,
                'brand' => $request->brand,
            ]);
        }

        return redirect('/sepatus/data')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $sepatu = Sepatu::findOrFail($id);

        // Delete the movie's photo if it exists
        if (File::exists(public_path('images/' . $sepatu->foto_sampul))) {
            if ($sepatu->foto_sampul != 'default.jpg') {
                File::delete(public_path('images/' . $sepatu->foto_sampul));
            }
        }

        // Delete the movie record from the database
        $sepatu->delete();

        return redirect('/sepatus/data')->with('success', 'Data berhasil dihapus');
    }
}
