<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use  Illuminate\Support\Facades\File;
// use Intervention\Image\Facades\Image;


class UserController extends Controller
{

    public function Register(Request $request){

        //server side validation 
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'address' => 'required|string|max:1000',
            'password' => 'required|string|min:4',
            'phone' => 'required|regex:/^\+?[0-9]{10,15}$/',

        ]);
        
        //save data into database
        User::Create([
                
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'password' => $request->password,
             'phone' => $request->phone,
        ]);

        return redirect()->intended('/login')->with('Register','Register Successfully ! Login Please');
    }



    public function login(Request $request){
       
    //    validation

        $request->validate([

            'email' => 'required|email',
            'password' => 'required|string|min:4'

        ]);

        //eloquent se user find kiya
        $user = User::where('email',$request->email)->first();

        if($user && Hash::check($request->password, $user->password)){
            //login kar do
            Auth::login($user);
            if($user->role=="customer"){

                 //redirect with success message
            // Alert::success('successmsg','Login Successful - Welcome'. $user->name);
            // return redirect('/');
            return redirect()->intended('/shophere')->with('success','Welcome'." ". $user->name);
            }else{
                return redirect()->intended('/admin/dashboard')->with('adminlog','Welcome Admin'." ". $user->name);
            }
           
        }

        // warna error jayega

        return back()->with(['error'=>'Email Or Password is incorrect'])->withInput();
       
    }




    Public Function Logout(){
        Auth::logout();
        return redirect('/')->with('logoutmsg','You Have Logged Out Successfully.');
    }




    Public Function categories(Request $request){

       $request->validate([
            'category_name' => 'required|string|max:50',
            'category_desc' => 'required|string|min:5|max:20',
            'category_img' => [
                                  'required',
                                  'mimes:jpg,jpeg,png,gif',
                                  'max:3000', //3 mb
                                        // 'dimensions:min_width=400,min_height=400,max_width=4000,max_height=4000'
                                  ],
                          ]);
                
                    $image =$request->file('category_img');
            
        // step1 check agar image upload hoti hai tho usko save karna
                     if($request->hasFile('category_img'))
                    {
                      $path = $request->file('category_img')->store('image','public');;
                    }

        // dd($cat_name);
                    Category::Create([
                            
                        'cat_name' => $request->category_name,
                        'cat_desc' => $request->category_desc,
                        'image'=> $path,
                        
                    ]);

                return back()->with(['cat_success'=>'Category Add'])->withInput();
        

    }




    Public Function show_category(){

        //Databse se data fetch karna 
        $categories = Category::all();

        //view file mai data send karana
        return view ('/admin/categories',compact('categories'));
    }




    Public Function Manage_products(Request $request){

           $request->validate([
                    'product_name' => 'required|string|max:100',
                    'product_desc' => 'required|string|max:255',
                    'product_price' => 'required|numeric|min:1',
                    'product_stock' => 'required|integer|min:0',
                    'product_img' => [
                                        'required',
                                        'mimes:jpg,jpeg,png,gif',
                                        'max:3000', //3 mb
                                        // 'dimensions:min_width=400,min_height=400,max_width=4000,max_height=4000'
                                      ],
                              ]);

      

                    $image =$request->file('product_img');
            
        // step1 check agar image upload hoti hai tho usko save karna
                     if($request->hasFile('product_img'))
                    {
                      $path = $request->file('product_img')->store('image','public');;
                    }

        // step 2 product save karna 

                    Product::Create([
                        'product_name'=>$request->product_name,
                        'desc'=>$request->product_desc,
                        'price'=>$request->product_price,
                        'stock'=>$request->product_stock,
                        'category_id'=>$request->product_category,
                        'image'=> $path,
                    ]);
                        // dd($image);
                    return back()->with(['product_success'=>'product added'])->withInput();

    }


         Public Function admin_product_delete($id){

             $products = Product::Find($id);

            //  dd($products);
            $imagepath = public_path('storage/' . $products->image);

            if(File::exists($imagepath)){
                File::delete($imagepath);
            }

            $products->delete();

             return back()->with(['product_deleted'=>'product deleted'])->withInput();

        }



        
         Public Function admin_category_delete($id){

             $categories = Category::Find($id);

            //  dd($products);
            $imagepath = public_path('storage/' . $categories->image);

            if(File::exists($imagepath)){
                File::delete($imagepath);
            }

            $categories->delete();

             return back()->with(['categories_delete'=>'categories deleted'])->withInput();

        }


     Public Function Manage_products_two(){

        //Databse se data fetch karna 
        $products = Product::with('Category')->get();
        $categories = Category::all();
        // dd($products);
        //view file mai data send karana
        return view ('/admin/manageproducts',compact('products','categories'));
    }





    Public Function show_User(){

        //Databse se data fetch karna 
        $Users = User::all();

        //view file mai data send karana
        return view ('/admin/manageusers',compact('Users'));
    }




    Public Function Product_homepage(){

        //Databse se data fetch karna 
        $Categories = Category::all();

        //view file mai data send karana
        return view ('welcome', compact('Categories'));
    }




    Public Function Shop_homepage($id){

        //Databse se data fetch karna 
        $products = Product::Where('category_id',$id)->get();
        // dd($products);
        //view file mai data send karana
        return view ('/shop', compact('products'));
    }




     Public Function Product_page($id){
        
        //Databse se data fetch karna 
        $products = Product::Where('id',$id)->get();
        // $user     = User::
        // dd($products);
        //view file mai data send karana
        return view ('/product', compact('products'));
    }





     Public Function Product(){

        //Databse se data fetch karna 
        $products = Product::all();
        // dd($products);
        //view file mai data send karana
        return view ('/shophere', compact('products'));
    }
    
        public function destroy($id)
    {
            Cart::findOrFail($id)->delete();
            return redirect()->back()->with('success', 'Item removed from cart successfully!');
    }


    Public Function Add_to_cart(Request $request,$product_id){

        //Databse se data fetch karna 
       $user= Auth::User();
    //    dd($user);
         if(!$user){
                return redirect('/login')->with('error','Please Login To Add Items to Cart');
            }
        $cart = Cart::Where('user_id',$user->id)
                    ->Where('product_id',$product_id)
                    ->first();
        if($cart){

                $cart->delete();
                return redirect()->back()->with('success','product removed from cart');
                // return response()->json(['status'=>'Removed']);
                
        }else{
             // Add To Cart
                Cart::create([
                    'user_id' => $user->id,
                    'product_id' => $product_id,
                    'quantity'=> $request->quantity,

                ]);
                // return redirect('/cart')->with('item_added','Product Added To Cart Successfully');
                return redirect()->back()->with('success','Product Added In Cart');
                // return response()->json(['status'=>'added']);
                // return back()->with('item_added','Product Already In Cart');
             }
         }



    Public Function Cart_item(){

        $user = Auth::id();

        $cartItems  = Cart::with('product')
                 ->where('user_id', $user)
                 ->get();
        $grandtotal = 0;
            foreach($cartItems as $item){
                $item->total_price = $item->product->price * $item->quantity;
                $grandtotal += $item->total_price;

            }
        //  dd($cartItems->toArray());
       
        
          return view('cart', compact('cartItems','grandtotal'));
        
    }

    


    
}
