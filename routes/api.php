<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Post;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/IP-text', function () {
    return view('factory');
});



    
Route::get('/', function () {
    return view('ih-tex');
});

Route::get('/terms', function () {
    return view('terms');
});
Route::get('/privacy', function () {
    return view('privacy');
});
Route::get('/delivery', function () {
    return view('delivery');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about-us', function () {
    return view('about');
});
Route::get('/product_id', function () {
    return view('product_id');
});
Route::get('/items', function () {
    return view('product');
});
Route::get('/sitemap', function () {
    return view('sitemap');
});
Route::get('/special', function () {
    return view('special');
});
Route::get('/cart', function () {
    return view('cart');
});



// id
Route::get('/kid/{url_url}/{url}', function ($url) {
    return view('product');
});
Route::get('/kid/{url_url}', function ($url_url) {
    return view('gender');
});

Route::get('/kid/{url_url}/{url}/{id}', function ($id) {
    return view('product_id');
});
// message
Route::post('/send-message', function (Request $request) {
    DB::table('message') ->insert([
        'name' => request('name'),
        'text' => request('text'),
        'mail' => request('email'),
    ]);
    return json_encode(['status' => 'ok']);    
});



// swipe
Route::get('/swiper', function () {
    $table = DB::table('image_home')->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','swpies' => $table]);    
});


// price
Route::get('/price', function () {
    $table = DB::table('price')->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','price' => $table]);    
});

// search
Route::get('/searching', function () {
    $table = DB::table('searching')->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','searching' => $table]);    
});

Route::post('/add-searching', function (Request $request) {
    DB::table('searching') ->insert([
        'search_product' => request('search_product'),
    ]);
    return json_encode(['status' => 'ok']);    
});
Route::post('/edit-searching', function () {
    DB::table('searching')->where('id',request('id'))->update([
        'search_product' => request('search_product'),
    ]);
    return json_encode(['status' => 'ok']);
});

// feedbacks
Route::get('/feedbacks/{id}', function ($id) {
    $table = DB::table('feedbacks')->where("product_id",$id)->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','feedbacks' => $table]);    
});
Route::post('/add-feedbacks', function (Request $request) {
    DB::table('feedbacks') ->insert([
        'name' => request('name'),
        'feedback' => request('feedback'),
        'gender' => request('gender'),
        'product_id' => request('product_id'),
        'stars' => request('stars'),
    ]);
    return json_encode(['status' => 'ok']);    
});
// img-group
Route::get('/image_type', function () {
    $table = DB::table('image_type')->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','image_type' => $table]);    
});
// group
Route::get('/group', function () {
    $table = DB::table('groupa')->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','group' => $table]);    
});
// type
Route::get('/type', function () {
    $table = DB::table('type')->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','type' => $table]);    
});

// product
Route::get('/product', function () {
    $per_pag = request()->has('limit') ? request('limit'):15; 
    $order = request()->has('filter') ? request('filter'):'id'; 
    $byin = request()->has('byin') ? request('byin'):'asc';

    $table = DB::table('product')->where("status",'true')->orderBy($order,$byin)->get();
    $paginate = DB::table('product')->where("deleted_at",null)->where("status",'true')->orderBy($order,$byin)->paginate($per_pag);   
    return json_encode(['status' => 'ok','product' => $table,'pagined' => $paginate]);    

});

Route::get('/product_recomended', function () {
    $table = DB::table('product')->where("deleted_at",null)->where("status",'true')->where("recomended",'true')->get();   
    return json_encode(['status' => 'ok','product' => $table]);    
});
// Route::get('/product_gend', function () {
//     $per_pag = request()->has('limit') ? request('limit'):1; 
//     $paginate = DB::table('product')->where("deleted_at",null)->paginate($per_pag);   
//     $table = DB::table('product')->where("deleted_at",null)->get();   
//     return json_encode(['status' => 'ok','product' => $table,'pagined' => $paginate]);      
// });

// ->orderBy('price','desc')
// orderBy('price','asc')->
Route::get('/product_gend/{id}', function ($id) {        
    $per_pag = request()->has('limit') ? request('limit'):15; 
    $order = request()->has('filter') ? request('filter'):'id'; 
    $byin = request()->has('byin') ? request('byin'):'asc';

    $table = DB::table('product')->where("url_url", $id)->where("status",'true')->where("deleted_at",null)->orderBy($order,$byin)->get();       
    $paginate = DB::table('product')->where("url_url", $id)->where("status",'true')->where("deleted_at",null)->orderBy($order,$byin)->paginate($per_pag); 
    return json_encode(['status' => 'ok','table' => $table,'pagined' => $paginate]);      
});


Route::get('/product_id/{id}', function ($id) {

    $per_pag = request()->has('limit') ? request('limit'):15; 
    $order = request()->has('filter') ? request('filter'):'id'; 
    $byin = request()->has('byin') ? request('byin'):'asc';

    $paginate = DB::table('product')->where("url", $id)->where("deleted_at",null)->where("status",'true')->orderBy($order,$byin)->paginate($per_pag);       
    $table = DB::table('product')->where("url", $id)->where("deleted_at",null)->where("status",'true')->orderBy($order,$byin)->get();      
    $cur = DB::table('currency')->where("deleted_at",null)->get();       
    return json_encode(['status' => 'ok','table' => $table,'pagined' => $paginate ,'currency' => $cur]);      
}); 
Route::get('/products/{id}', function ($id) {
    $per_pag = request()->has('limit') ? request('limit'):15; 
    $paginate = DB::table('product')->where("id", $id)->where("status",'true')->where("deleted_at",null)->paginate($per_pag);       
    return json_encode(['status' => 'ok','pagined' => $paginate]);      
});

Route::get('/group_type/{id}', function ($id) {
    $table = DB::table('groupa')->where("url", $id)->where("deleted_at",null)->get();       
    return json_encode(['status' => 'ok','group' => $table]);      
});
Route::get('/type_group/{id}', function ($id) {
    $table = DB::table('type')->where("url_url",$id)->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','type' => $table]);    
});

Route::post('/add-searching', function (Request $request) {

    $cont = request()->has('content_search');

    $search = DB::table('product')->where("status",'true')->where("deleted_at",null)->where('product_name', request('title'));

    if($cont) {
        $search->where('info', request('title'))->where('cotton', request('title'));
    }

    return json_encode(['status' => 'ok', 'data' => $search->get()]);    
});





// currency
Route::get('/currency', function () {
    $table = DB::table('currency')->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','currency' => $table]);    
});