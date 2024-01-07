<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Customization;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function filterKategori(Request $request, $kategori)
    {
        // Validasi input
        // $request->validate([
        //     'nama' => 'string',
        //     'harga_min' => 'numeric',
        //     'harga_max' => 'numeric',
        // ]);
    
        // Query awal
        $query = Product::where('kategori', $kategori);
    
        // Filter by nama jika ada input nama
        $query->when($request->filled('nama'), function ($query) use ($request) {
            $query->where('nama', 'like', '%' . $request->input('nama') . '%');
        });
    
        // Filter by harga jika ada input harga_min
        $query->when($request->filled('harga_min'), function ($query) use ($request) {
            $query->where('harga', '>=', $request->input('harga_min'));
        });
    
        // Filter by harga jika ada input harga_max
        $query->when($request->filled('harga_max'), function ($query) use ($request) {
            $query->where('harga', '<=', $request->input('harga_max'));
        });
    
        // Ambil hasil query
        $products = $query->get();
    
        // Mendapatkan array nama kategori
        $kategoriNames = $products->pluck('kategori')->unique()->values()->all();
    
        // Tampilkan hasil pada view
        return view('user.kategori', compact('products', 'kategori', 'kategoriNames'));
    }
    


    public function myProducts()
{
    $userProducts = auth()->user()->products;

    return view('owner.my_product', compact('userProducts'));
}

    public function index()
    {
        $products = Product::latest()->take(5)->get();
        return view('dashboard', ['products' => $products]);

    }

    public function searchProducts(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('nama', 'like', '%' . $query . '%')
            ->orWhere('detail', 'like', '%' . $query . '%')
            ->get();

        return view('user.searchproduct', compact('products', 'query'));
    }

    public function addProduct()
    {
        return view('owner.addProduct');

    }

    public function show($id)
    {
        $product = Product::with('user')->findOrFail($id);
        return view('user.detailProduct', compact('product'));
    }


    public function kategori($kategori)
{
    // Ambil produk berdasarkan kategori
    $products = Product::where('kategori', $kategori)->get();

    return view('user.kategori', compact('products', 'kategori'));
}

public function store(Request $request)
    {
       
        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images', $filename);
            // Save the image path to the database
            $imagePath = 'images/' . $filename;
        }

        Product::create([
        'nama' => $request->input('nama'),
        'harga' => $request->input('harga'),
        'detail' => $request->input('detail'),
        'stok' => $request->input('stok'),
        'kategori' => $request->input('kategori'),
        'user_id' => auth()->id(),
        'image' => $imagePath,
        ]);

        session()->flash('success', 'Data koleksi berhasil ditambahkan.');

        return redirect()->route('dashboard')->with('success', 'Product added successfully');
    }

    public function edit(Product $product)
{
    return view('owner.editProduct', compact('product'));
}

public function update(Request $request, Product $product)
{
    // Validasi input form
    $request->validate([
        'nama' => 'required|string',
        'harga' => 'required|numeric',
        'detail' => 'required|string',
        'stok' => 'required|integer',
    ]);

    // Update data produk
    $product->update($request->all());

    return redirect()->route('my-products')->with('success', 'Product updated successfully');
}

public function destroy(Product $product)
{
    $product->delete();

    return redirect()->route('my-products')->with('success', 'Product deleted successfully');
}


public function profil(User $brandOwner)
    {
        $brandOwner->load('products');

        return view('owner.profil', compact('brandOwner'));
    }


    public function confirmPayment(Request $request, Customization $customization)
{
    $request->validate([
        'bank' => 'required|in:bca,bri,mandiri,bni,ovo,dana',
        'proof_of_payment' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $proofOfPaymentPath = null;

    if ($request->hasFile('proof_of_payment')) {
        $image = $request->file('proof_of_payment');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('public/images', $filename);
        // Save the image path to the database
        $proofOfPaymentPath = 'images/' . $filename;
    }
    Transaction::create([
        'address' => $request->input('address'),
        // 'product_id' => $request->input('product_id'),
        'customization_id' => $customization->id,
        'user_id' => auth()->id(),
        'bank' => $request->bank,
        'proof_of_payment' => $proofOfPaymentPath,
    ]);

    // Ubah status kustomisasi menjadi 'Dalam Peninjauan'
    $customization->update(['status' => 'Proses validasi']);

    return redirect()->route('dashboard')->with('status', 'Pembayaran kustomisasi berhasil dikonfirmasi.');
}


public function direct(Request $request)
{
    $proofOfPaymentPath = null;

    if ($request->hasFile('proof_of_payment')) {
        $image = $request->file('proof_of_payment');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('public/images', $filename);
        // Save the image path to the database
        $proofOfPaymentPath = 'images/' . $filename;
    }
    Transaction::create([
        'address' => $request->input('address'),
        // 'product_id' => $request->input('product_id'),
        // 'customization_id' => $customization->id,
        'user_id' => auth()->id(),
        'bank' => $request->bank,
        'proof_of_payment' => $proofOfPaymentPath,
    ]);

    // Ubah status kustomisasi menjadi 'Dalam Peninjauan'
    // $customization->update(['status' => 'Proses validasi']);

    return redirect()->route('dashboard')->with('status', 'Pembayaran kustomisasi berhasil dikonfirmasi.');
}

}