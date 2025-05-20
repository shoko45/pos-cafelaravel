<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:45',
            'jenis' => 'required|max:45',
            'harga_jual' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 45 karakter',
            'jenis.required' => 'Jenis wajib diisi',
            'jenis.max' => 'Jenis maksimal 45 karakter',
            'foto.max' => 'Foto maksimal 2 MB',
            'foto.mimes' => 'File ekstensi hanya bisa jpg, png, jpeg, gif, svg',
            'foto.image' => 'File harus berbentuk image',
        ]);

        if ($request->hasFile('foto')) {
            $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            $request->foto->move(public_path('image'), $fileName);
        } else {
            $fileName = 'nophoto.jpg';
        }

        DB::table('products')->insert([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'harga_jual' => $request->harga_jual,
            'harga_beli' => $request->harga_beli,
            'deskripsi' => $request->deskripsi,
            'foto' => $fileName,
        ]);

        return redirect()->route('index.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|max:45',
        'jenis' => 'required|max:45',
        'harga_jual' => 'required|numeric',
        'harga_beli' => 'required|numeric',
        'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    ], [
        'nama.required' => 'Nama wajib diisi',
        'nama.max' => 'Nama maksimal 45 karakter',
        'jenis.required' => 'Jenis wajib diisi',
        'jenis.max' => 'Jenis maksimal 45 karakter',
        'foto.max' => 'Foto maksimal 2 MB',
        'foto.mimes' => 'File ekstensi hanya bisa jpg, png, jpeg, gif, svg',
        'foto.image' => 'File harus berbentuk image',
    ]);

    $product = Product::findOrFail($id);

    // Handle upload foto baru
    if ($request->hasFile('foto')) {
        $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
        $request->foto->move(public_path('image'), $fileName);

        // Hapus foto lama jika bukan default dan file-nya valid
        $oldFotoPath = public_path('image/' . $product->foto);
        if ($product->foto && $product->foto !== 'nophoto.jpg' && file_exists($oldFotoPath) && is_file($oldFotoPath)) {
            unlink($oldFotoPath);
        }
    } else {
        $fileName = $product->foto;
    }

    // Update data produk
    $product->update([
        'nama' => $request->nama,
        'jenis' => $request->jenis,
        'harga_jual' => $request->harga_jual,
        'harga_beli' => $request->harga_beli,
        'deskripsi' => $request->deskripsi,
        'foto' => $fileName,
    ]);

    return redirect()->route('index.index')->with('success', 'Produk berhasil diperbarui.');
}
/**
 * Remove the specified resource from storage.
 */
public function destroy(Product $id)
{
    $id->delete();
    
    return redirect()->route('index.index')
            ->with('success','Data berhasil di hapus' );
}

}
