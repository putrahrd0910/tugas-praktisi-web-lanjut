<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\Http\Request;
use DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = produk::all();
        return view('produk', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ubah
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ubah
        Produk::create( [
            //kiri db, kanan blade
            'nama' => $request->nama_produk,
            'id_kategori' => $request->id_produk,
            'qty' => $request->jumlah,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual
        ]);
        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(produk $produk)
    {
        //ubah
        return view('edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, produk $produk)
    {
        //ubah
        $produk -> update( [
            'nama' => $request->nama_produk,
            'id_kategori' => $request->id_produk,
            'qty' => $request->jumlah,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual
        ]);
        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(produk $produk)
    {
        //ubah
        $produk->delete();
        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    //praktikum builder
    public function builder() {
        $produk = DB::table('produk')->get();
        return view('produk/index',['produk'=>$produk]);
    }

    //praktikum orm
    public function show_eloquent()
    {
        // mengambil data produk
        $produk = produk::all();
        
        // mengirim data guru ke view produk
        return view('produk/indexorm', ['produk' => $produk]);
    }

    public function insert_eloquent()
    {
        produk::create([
            'nama' => 'Bahan Bangunan',
            'id_kategori' => '2',
            'qty' => '27',
            'harga_beli' => '35000',
            'harga_jual' => '40000',
        ]);
        echo"<h1>Data Berhasil Di Insert</h1>";  
    }

    public function update_eloquent()
    {
        produk::where('id',1)
        ->update(['harga_beli' => '49000']);
        echo"<h1>Data Berhasil Di Update</h1>";  
    }
    
}
