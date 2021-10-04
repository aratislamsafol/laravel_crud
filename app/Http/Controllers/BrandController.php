<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Carbon\Carbon;

class BrandController extends Controller
{
   public function index(){
    $brand=Brand::latest()->paginate(5);

    return view('admin.brand.index',compact('brand'));
   }

   public function AddBrand(Request $request){
        $request->validate([
        'brand_name' => 'required|max:255',
        'Brand_image' =>'required|mimes:png,jpg,jpeg'
    ],
    [
        'brand_name.required'=>'Please Input Brand Name',
        'brand_name.max'=>"please 255 characters",
        'Brand_image.required'=>'Please Input Brand Image',
    ]);

    $brand_image=$request->file('Brand_image');

    $name_gen=hexdec(uniqid());
    $img_ext=strtolower($brand_image->getClientOriginalExtension());
    $img_add=$name_gen.'.'.$img_ext;
    $img_loc='img/brand/';
    $img_add_loc=$img_loc.$img_add;
    $brand_image->move($img_loc,$img_add);

    Brand::insert([
        'Brand_name'=>$request->brand_name,
        'Brand_image'=>$img_add_loc,
        'created_at'=>Carbon::now(),
    ]);
    return Redirect()->back()->with('Success','Brand Inserted');
   }

   public function EditBrand($id){
       $brand_edit=Brand::find($id);
       return view('admin.brand.edit',compact('brand_edit'));
   }
}
