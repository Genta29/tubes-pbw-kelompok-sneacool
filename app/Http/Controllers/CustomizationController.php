<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customization;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class CustomizationController extends Controller
{

    public function paymentHistory()
{
    // Ambil transaksi berdasarkan customization -> product -> user
    $transactions = Transaction::whereHas('customization.product.user', function ($query) {
        $query->where('id', auth()->id());
    })->get();

    return view('owner.paymentRequest', compact('transactions'));
}


    public function payment(Customization $customization)
    {

        return view('user.payment', compact('customization'));
    }
    public function directPayment(Product $product_id)
    {

        return view('user.directPayment', compact('product_id'));
    }


    public function index()
{
    // Get the authenticated user
    $user = Auth::user();

    // Fetch customizations for the logged-in user
    $customizations = Customization::where('user_id', $user->id)->get();

    return view('user.history', compact('customizations'));
}


public function create($product_id)
{
    // Ambil data produk berdasarkan ID
    $product = Product::find($product_id);

    // Kirim data produk ke tampilan kustomisasi
    return view('user.customization', compact('product'));
}


    public function store(Request $request)
{
    // Validate the form data
    $request->validate([
        'description' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Get the authenticated user
    $user = Auth::user();
    $imagePath = null;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('public/images', $filename);
        // Save the image path to the database
        $imagePath = 'images/' . $filename;
    }

    // Save customization data to the database
    $customization = new Customization();
    $customization->product_id = $request->input('product_id');
    $customization->user_id = $user->id;
    $customization->description = $request->input('description');
    $customization->status = 'Dalam peninjauan'; // Set default status

    // Handle image upload
    $customization->image = $imagePath;

    $customization->save();

    return redirect()->route('dashboard')->with('success', 'Customization saved successfully');
}




public function brandownerCustomizations()
{
    // Get the authenticated user
   // Get the currently logged-in user
   $user = Auth::user();

   // Fetch customizations with a condition based on the user_id of the associated Product
   $customizations = Customization::whereHas('product', function ($query) use ($user) {
       $query->where('user_id', $user->id);
   })->get();

    // You can return these customizations to your view
    return view('owner.customizationRequest', compact('customizations'));
}

public function approve(Customization $customization)
{
    $customization->update(['status' => 'approved']);
    return redirect()->back()->with('success', 'Customization approved successfully');
}
public function transactionApp(Customization $transaction)
{
    $transaction->update(['status' => 'Pembayaran berhasil']);
    return redirect()->back()->with('success', 'Customization approved successfully');
}

public function reject(Customization $customization)
{
    $customization->delete();
    return redirect()->back()->with('success', 'Customization rejected successfully');
}
}