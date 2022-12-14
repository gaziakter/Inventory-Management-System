<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Image;
use Illuminate\Support\Carbon;


class BlogController extends Controller
{
    // All Blog
    public function AllBlog(){

        $blogs = Blog::latest()->get();
        return view('admin.blogs.blogs_all', compact('blogs'));

    }    

        // Add Blog
    public function AddBlog(){
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.add_blog', compact('categories'));
    }

            // store Blog
    public function StoreBlog(Request $request){
 
        $image = $request->file('blog_image');

            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(430, 327)->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'.$name_gen;
    
            Blog::insert([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_description' => $request->blog_description,
                'blog_tags' => $request->blog_tags,
                'blog_image' => $save_url,
                'created_at' => Carbon::now()
            ]);             
        
            $notification = array(
            'message' => 'Blog Inserted Successfully', 
            'alert-type' => 'success'
            );

        return redirect()->route('all.blog')->with($notification);
    }

    public function EditBlog($id){
        $EditBlog = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.blog_edit', compact('EditBlog','categories'));
    }

    public function UpdateBlog(Request $request){

        $UpdateBlog_id = $request->id;

        if ($request->file('blog_image')) {
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(430, 327)->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'.$name_gen;

            Blog::findOrFail($UpdateBlog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_description' => $request->blog_description,
                'blog_tags' => $request->blog_tags,
                'blog_image' => $save_url,

            ]); 
            $notification = array(
            'message' => 'Updated Blog Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog')->with($notification);

        } else{

            Blog::findOrFail($UpdateBlog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_description' => $request->blog_description,
                'blog_tags' => $request->blog_tags,

            ]); 
            $notification = array(
            'message' => 'Updated Blog without image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog')->with($notification);

        } // end Else

     } // End Method 


     public function DeleteBlog($id){
        $blog = Blog::findOrFail($id);
        $img = $blog->blog_image;
        unlink($img);

        Blog::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function BlogDetails($id){

        $AllBlog = Blog::latest()->limit(5)->get();
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('frontend.blog_details', compact('blog', 'AllBlog', 'categories'));
    }

    public function CategoryBlog($id){
        $BlogPost = Blog::where('blog_category_id', $id)->orderBy('id', 'DESC')->get();
        $AllBlog = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $CategoryTitle = BlogCategory::findOrFail($id);
        return view('frontend.cat_blog_details', compact('BlogPost', 'AllBlog', 'categories', 'CategoryTitle'));
    }

    public function BlogPage(){
        $BlogPost = Blog::latest()->paginate(3);
        $AllBlog = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('frontend.blog_page', compact('BlogPost', 'AllBlog', 'categories'));
    }


}
