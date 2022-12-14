<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home all route
Route::controller(DemoController::class)->group(function(){
    Route::get('/', 'homePageFunction')->name('home.page');
});

// Admin all route with middleware
Route::middleware(['auth'])->group(function(){
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'Profile')->name('admin.profile');
        Route::get('/edit/profile', 'editProfile')->name('edit.profile');
        Route::post('/store/profile', 'storeProfile')->name('store.profile');
        Route::get('/change/password', 'ChangePassword')->name('change.password');
        Route::post('/update/password', 'UpdatePassword')->name('update.password');
    });
});

// Home Slide all route
Route::controller(HomeSliderController::class)->group(function(){
    Route::get('/home/slide', 'HomeSlider')->name('home.slide');
    Route::post('/update/slide', 'UpdateSlider')->name('update.slider');
});

// About Page all route
Route::controller(AboutController::class)->group(function(){
    Route::get('/about/page', 'AboutPage')->name('about.page');
    Route::post('/update/about', 'UpdateAbout')->name('update.about');
    Route::get('/about', 'HomeAbout')->name('home.about');
    Route::get('/about/multi/image', 'AboutMultiImage')->name('about.multi.image');
    Route::post('/store/multi/image', 'StoreMultiImage')->name('store.mult.image');
    Route::get('/all/multi/image', 'AllMultiImage')->name('all.multi.image');
    Route::get('/edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image');
    Route::post('/update/multi/image', 'UpdateMultiImage')->name('update.multi.image');
    Route::get('/delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image');

});

// Portfolio all route
Route::controller(PortfolioController::class)->group(function(){
    Route::get('/add/portfolio', 'AddPortfolio')->name('add.portfolio');
    Route::get('/all/portfolio', 'AllPortfolio')->name('all.portfolio');
    Route::post('/store/portfolio', 'StorePortfolio')->name('store.portfolio');
    Route::get('/edit/portfolio/{id}', 'EditPortfolio')->name('edit.portfolio');
    Route::post('/update/portfolio', 'UpdatePortfolio')->name('update.portfolio');
    Route::get('/delete/portfolio/{id}', 'DeletePortfolio')->name('delete.portfolio');
    Route::get('/portfolio/details/{id}', 'PortfolioDetails')->name('portfolio.details');
});

// Blog Category all route
Route::controller(BlogCategoryController::class)->group(function(){
    Route::get('/all/blog/category', 'AllBlogCategory')->name('all.blog.category');
    Route::get('/add/blog/category', 'AddBlogCategory')->name('add.blog.category');
    Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');
    Route::get('/edit/blog/category/{id}', 'EditBlogCategory')->name('edit.blog.category');
    Route::post('/update/blog/category', 'UpdateBlogCategory')->name('update.blog.category');
    Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');
});

// Blog all route
Route::controller(BlogController::class)->group(function(){
    Route::get('/all/blog', 'AllBlog')->name('all.blog');
    Route::get('/add/blog', 'AddBlog')->name('add.blog');
    Route::post('/store/blog', 'StoreBlog')->name('store.blog');
    Route::get('/edit/blog/{id}', 'EditBlog')->name('edit.blog');
    Route::post('/update/blog', 'UpdateBlog')->name('update.blog');
    Route::get('/delete/blog/{id}', 'DeleteBlog')->name('delete.blog');
    Route::get('/details/blog/{id}', 'BlogDetails')->name('blog.detais');
    Route::get('/category/blog/{id}', 'CategoryBlog')->name('category.blog');
    Route::get('/blog', 'BlogPage')->name('blog.page');
});

// Footer all route
Route::controller(FooterController::class)->group(function(){
    Route::get('/all/footer', 'FooterAll')->name('footer.all');
    Route::post('/update/footer/', 'UpdateFooter')->name('update.footer');
});

// Contact all route
Route::controller(ContactController::class)->group(function(){
    Route::get('/contact', 'ContactMe')->name('contact.me');
    Route::post('/message', 'StoreMessage')->name('store.message');
    Route::get('/all/message', 'AllMessage')->name('all.message');
    Route::get('/show/message/{id}', 'ShowMessage')->name('show.message');
    Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
