<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\CartSend;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        // dd($products);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
	        'name'=>'required',
	        'price'=> 'required|regex:/^\d+(\.\d{1,2})?$/',
	        'quantity' => 'required|integer',
	        'size' => 'required',
	        'code' => 'required|size:4|alpha_num|unique:products'
	    ]);

	    $product = new Product([
	        'name' => $request->get('name'),
	        'price'=> $request->get('price'),
	        'quantity'=> $request->get('quantity'),
	        'size'=> $request->get('size'),
	        'code'=> $request->get('code'),
	    ]);

        $product->save();

      	return redirect('products')->with('success', 'Product has been added');
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
    public function edit($id)
    {
        //
        $product = Product::find($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
	        'name'=>'required',
	        'price'=> 'required|regex:/^\d+(\.\d{1,2})?$/',
	        'quantity' => 'required|integer',
	        'size' => 'required',
	        'code' => 'required|size:4|alpha_num|unique:products,code,'. $id.',id',
      	]);

      	$product = Product::find($id);
	      $product->name = $request->get('name');
	      $product->price = $request->get('price');
	      $product->quantity = $request->get('quantity');
	      $product->size = $request->get('size');
	      $product->code = $request->get('code');
	      $product->save();

      	return redirect('products')->with('success', 'Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
	    $product->delete();

	    return redirect('/products')->with('success', 'Product has been deleted Successfully');
    }

    public function cart()
    {
        return view('cart');
    }

    public function addToCart($id)
    {
 		$product = Product::find($id);
 
        if(!$product) {
 
            abort(404);
 
        }
 
        $cart = session()->get('cart');
 
        // if cart is empty then this the first product
        if(!$cart) {
 
            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "size" => $product->size,
                        "code" => $product->code
                    ]
            ];
 
            session()->put('cart', $cart);
 
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
 
            $cart[$id]['quantity']++;
 
            session()->put('cart', $cart);
 
            return redirect()->back()->with('success', 'Product added to cart successfully!');
 
        }
 
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "size" => $product->size,
            "code" => $product->code
        ];
 
        session()->put('cart', $cart);
 
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function send(){
    	$cart = session()->get('cart');
    	

    	foreach($cart as $key => $value){
    		$code = $value['code'];
    		$quantity = $value['quantity'];

    		$product = Product::where('code', '=', $value['code'])->firstOrFail();
    		$product->quantity = $product->quantity - $quantity;
    		$product->save();
    	}

    	if(!$cart){
    		return 'No item in the cart';
    	}

    	Mail::to('milko2427@gmail.com')
    		->send(new CartSend($cart)
    	);

    	session()->forget('cart');

		return redirect()->back()->with('success', 'Email sent successfully!');

    }
}
