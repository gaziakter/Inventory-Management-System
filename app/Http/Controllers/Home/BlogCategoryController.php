<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    // All blog category function
    public function AllBlogCategory(){
        $BlogCategory = BlogCategory::latest()->get();
        return view('admin.blog_category.blog_category_all', compact('BlogCategory'));
    }
}
