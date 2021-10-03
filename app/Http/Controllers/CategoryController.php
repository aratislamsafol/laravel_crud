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
        $trust_cat=Category::onlyTrashed()->latest()->paginate(3);
        return view('admin.category.index',compact('category','trust_cat'));
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
    public function EditCat($id){
        $category_id=Category::find($id);
        return view('admin.category.edit',compact('category_id'));
    }

    public function UpdateCat(Request $request ,$id){
        $update=Category::find($id)->update([
            'categories_name'=>$request->category_name,
            'user_id'=>Auth::user()->id,
            'updated_at'=>Carbon::now()
        ]);

        return Redirect()->route('All.Store')->with('success','Category Updated');
    }

    public function SoftDelete($id){
        $delete=Category::find($id)->delete();

        return Redirect()->back()->with('success','Category Deleted');
    }

    public function Restore($id){
        $delete=Category::withTrashed()->find($id)->restore();

        return Redirect()->back()->with('success','Category Item Restored');
    }

    public function P_Delete($id){
        $delete=Category::onlyTrashed()->find($id)->forceDelete();

        return Redirect()->back()->with('success','Category Permanently Deleted')
    ;}

}
