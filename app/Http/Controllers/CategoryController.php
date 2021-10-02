<?php

namespace App\Http\Controllers;

use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function AllCat(){
        $category=Category::latest()->paginate(4);
        return view('admin.category.index',compact('category'));
    }
    public function AddCat(Request $request){
        $request->validate([
            'category_name' => 'required|max:255'
        ],
        [
            'category_name.required'=>'Please Input Category Name',
            'category_name.max'=>"please 255 characters",
        ]);

        Category::insert([
            'categories_name'=>$request->category_name,
            'created_at'=>Carbon::now(),
            'user_id'=>Auth::user()->id,
        ]);
        return Redirect()->back()->with('Success','Category Inserted');
        }
}