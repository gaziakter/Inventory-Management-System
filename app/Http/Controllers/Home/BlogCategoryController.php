<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Illuminate\Support\Carbon;

class BlogCategoryController extends Controller
{
    // All blog category function
    public function AllBlogCategory(){
        $BlogCategory = BlogCategory::latest()->get();
        return view('admin.blog_category.blog_category_all', compact('BlogCategory'));
    }

    public function  AddBlogCategory(){
        return view('admin.blog_category.blog_category_add');
    }


    public function StoreBlogCategory(Request $request){
        $request->validate([
            'blog_category' => 'required',
        ],[
            'blog_category.required' => 'Blog Category Name is Required',
        ]);
   
        BlogCategory::insert([
                'blog_category' => $request->blog_category,
                'created_at' => Carbon::now()
            ]);             
        
            $notification = array(
            'message' => 'Blog Category Inserted Successfully', 
            'alert-type' => 'success'
            );

        return redirect()->route('all.blog.category')->with($notification);
    }

    

    public function EditBlogCategory($id){
        $BlogCategory = BlogCategory::findOrFail($id);
        return view('admin.blog_category.blog_category_edit', compact('BlogCategory'));
    }
    

    public function UpdateBlogCategory(Request $request){

        $BlogCategoryId = $request->id;

        BlogCategory::findOrFail($BlogCategoryId)->update([
                'blog_category' => $request->blog_category,

            ]); 
            $notification = array(
            'message' => 'Updated blog Category Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification);

     } // End Method 


     public function DeleteBlogCategory($id){
      
        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Category Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


}
