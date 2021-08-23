<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $page_data = [
            'page_name' => "Products List",
            'products' => Products::get()
        ];
        return view('home', $page_data);
    }

    public function create_products(Request $request)
    {
        $image = "image" . rand(1, 1000000) . ".png";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            //Move Uploaded File
            $destinationPath = 'images';
            $file->move($destinationPath, $image);
        }
        $data = array(
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'release_date' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
        );
        Products::insertGetId($data);
        return redirect("home");
    }
}
