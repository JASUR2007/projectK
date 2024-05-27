<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MembersController;

use Illuminate\Http\Request;
use Illuminate\Http\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


use \Milon\Barcode\DNS1D;
use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\ProductController;

// excel
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Spatie\LaravelData\Data;    
use App\Http\Controllers\UserController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
// login
use Illuminate\Support\Facades\Auth;

Route::get('/demo', function () {
    return view('demo');
});
// php artisan make:middleware CheckRole
Route::get('/', function () {
    return redirect('/api');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/search-product', function () {
    return view('search');    
});

Route::get('/search-product/{id}', function ($id) {
    // return $id;
     return view('search');    
});

Route::get('/account/register', function () {
    return view('account_register');
});

Route::get('/account', function () {
    return view('account');
});


Route::get('/index', function () {
    return view('index');
});

Route::get('/admin-page', function () {
    return view('admin/admin-page');
})->middleware('is_admin');

Route::get('/admin-front', function () {
    return view('admin-front');
})->middleware('is_admin');

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/excelUpload', function () {
    return view('excelUpload.blade');
})->middleware('is_admin');
Route::get('/home', function () {
    return view('HOME');
});
Route::get('/blogs', function () {
    return view('BLOG');
});
Route::get('/contact', function () {
    return view('CONTACT');
});
Route::get('/portfolio', function () {
    return view('Portfolio');
});
// Route::get('admin-page/edit_people', function () {
//     return view('edit_people');
// })->middleware('is_admin');
Route::get('admin-page/z/fm all/{id}/{id_person}', function () {
    return view('edit_people');
})->middleware('is_admin');
Route::get('admin-page/edit_people/{id}/{id_person}', function () {
    return view('change_person');
})->middleware('is_admin');

// kid
Route::get('/kid', function () {
    $input_name = request()->has('search') ? request('search'): '%'; 
    $input_otdel = request()->has('otdel') ? request('otdel'): '%'; 
    $input_code = request()->has('product_code') ? request('product_code'): '%'; 
    $input_id = request()->has('id') ? request('id'): '%'; 
    $input_classification = request()->has('classification') ? request('classification'): '%'; 
    $per_page = request()->has('limit') ? request('limit'):10; 
    $table = DB::table('kid')->where("fired",null)->get(); 
    $paginate = DB::table('kid')->where("fired",null)->where('name', 'like', $input_name)->where('otdel', 'like', $input_otdel)->where('classification', 'like', $input_classification)->where('product_code', 'like', $input_code)->where('id_person', 'like', $input_id)->paginate($per_page);   
    return json_encode(['status' => 'ok','worker' => $table,'pagine' => $paginate]);  
})->middleware('is_admin');
Route::get('/kid/{id}/{id_person}', function ($id,$id_person) {
    $table = DB::table('kid')->where("fired",null)->where("id",$id)->where("id_person",$id_person)->get(); 
    return json_encode(['status' => 'ok','worker' => $table]);  
})->middleware('is_admin');

Route::get('/kid_search', function () {    

  
})->middleware('is_admin');



Route::post('/printing', function () {
    $table = DB::table('kid')->where("id_person",request('id'))->get();                                                     
    return json_encode(['status' => 'ok','print' => $table]);  
})->middleware('is_admin');


Route::post('/add-worker', function (Request $request) {
    DB::table('kid') ->insert([
        'id_person' => request('id_person'),
        'seriya' => request('seriya'),
        'name' => request('name'),
        'surname' => request('surname'),
        'patronomyc' => request('patronomyc'),
        'birth' => request('birth'),
        'otdel' => request('otdel'),
        'classification' => request('classification'),
        'potok_number' => request('potok_number'),
        'letters' => request('letters'),
        'earning' => request('earning'),
        'gender' => request('gender'),
        'img' => request('img'),
        'phone_num' => request("phone_num"),  
        'transport' => request("transport"),  
        'JSHSHIR' => request("JSHSHIR"),  
        'KIM_vidan' => request("KIM_vidan"),  
        'Pass_vidan' => request("Pass_vidan"),  
        'street' => request("street"),  
        'Prikaz_nomer' => request("Prikaz_nomer"),  
        'Ish_olingan' => request("Ish_olingan"),  
        'date_made' => request('date_made'),
    ]);
    return json_encode(['status' => 'ok']);    
})->middleware('is_admin');
Route::post('/edit-person', function () {
    DB::table('kid')->where('id',request('id'))->where('id_person',request('id_person'))->update([        
        'seriya' => request('seriya'),
        'name' => request('name'),
        'surname' => request('surname'),
        'patronomyc' => request('patronomyc'),
        'birth' => request('birth'),
        'otdel' => request('otdel'),
        'classification' => request('classification'),
        'potok_number' => request('potok_number'),
        'letters' => request('letters'),
        'earning' => request('earning'),
        'gender' => request('gender'),
        'img' => request('img'),
        'phone_num' => request("phone_num"),  
        'transport' => request("transport"),  
        'JSHSHIR' => request("JSHSHIR"),  
        'KIM_vidan' => request("KIM_vidan"),  
        'Pass_vidan' => request("Pass_vidan"),  
        'street' => request("street"),  
        'Prikaz_nomer' => request("Prikaz_nomer"),  
        'Ish_olingan' => request("Ish_olingan"), 
    ]);
    return json_encode(['status' => 'ok']);
})->middleware('is_admin');
// Route::post('/checked', function () {
//     DB::table('kid')->where('id',request("id"))->update([
//        "selected" => 'selected'
//     ]);
//    return json_encode(['status' => 'selected!']);  
// });

Route::post('/worker-delete', function () {
    Log::info(json_decode(request('list')));

    foreach(json_decode(request('list')) as $id) {
        DB::table('kid')->where('id',$id)->update([
            "fired" => Carbon::now()
         ]);
    }
        
    return json_encode(['status' => 'deleted!']);  
})->middleware('is_admin');
   

    

Route::post('/upload_img_workers', function (Request $request) {

    $link = $request->file('photo')->store('work_photo');
    return json_encode(['status' => 'ok', "data" => $link]);
})->middleware('is_admin');

Route::post('/delete-work', function () {
    DB::table('kid')->where('id',request("id"))->update([
       "fired" => Carbon::now()
    ]);

   return json_encode(['status' => 'deleted!']);  
})->middleware('is_admin');

Route::get('/product', function () {
    $table = DB::table('product')->where("deleted_at",null)->get();
    return json_encode(['status' => 'ok','product' => $table]);    
})->middleware('is_admin');

// worker and image swiper
Route::post('/delete-image_work', function () {
    
    Storage::delete(request('link'));

    return json_encode(['status' => 'deleted!']);  
})->middleware('is_admin');

// classification
Route::get('/classification', function () {
    $table = DB::table('classification')->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','classification' => $table]);    
})->middleware('is_admin');
Route::post('/add-class', function (Request $request) {
    DB::table('classification') ->insert([
        'classification' => request('classification'),
        'classif_id' => request('classif_id'),
    ]);
    return json_encode(['status' => 'ok']);    
})->middleware('is_admin');
Route::post('/edit-class', function () {
    DB::table('classification')->where('id',request('id'))->update([
        "updated_at"=> Carbon::now(),
        'classification' => request('classification'),
        'classif_id' => request("classif_id"),  
    ]);
    return json_encode(['status' => 'ok!']);
})->middleware('is_admin');
Route::get('/classification/{id}', function ($id) {

    $table = DB::table('classification')->where('id',$id)->get();   
    return json_encode(['status' => 'ok','classification' => $table]);    
})->middleware('is_admin');
Route::post('/delete-class', function () {
    DB::table('classification')->where('id',request("id"))->update([
       "deleted_at" => Carbon::now()
    ]);
   return json_encode(['status' => 'deleted!']);  
});

// potok-num
Route::get('/potok_number', function () {
    $table = DB::table('potok_number')->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','potok_number' => $table]);    
})->middleware('is_admin');
Route::post('/add-potok_number', function (Request $request) {
    DB::table('potok_number') ->insert([
        'otdel_choose' => request('otdel_choose'),
        'numeration' => request('numeration'),
    ]);
    return json_encode(['status' => 'ok']);    
})->middleware('is_admin');
Route::post('/edit-potok_number', function () {
    DB::table('potok_number')->where('id',request('id'))->update([
        "updated_at"=> Carbon::now(),
        'otdel_choose' => request('otdel_choose'),
        'numeration' => request("numeration"),  
    ]);
    return json_encode(['status' => 'ok!']);
})->middleware('auth');
Route::get('/potok_number/{id}', function ($id) {

    $table = DB::table('potok_number')->where('id',$id)->get();   
    return json_encode(['status' => 'ok','potok_number' => $table]);    
})->middleware('is_admin');
Route::post('/delete-potok_number', function () {
    DB::table('potok_number')->where('id',request("id"))->update([
       "deleted_at" => Carbon::now()
    ]);
   return json_encode(['status' => 'deleted!']);  
})->middleware('is_admin');


// otdel
Route::get('/otdel', function () {
    $table = DB::table('otdel')->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','otdel' => $table]);    
})->middleware('is_admin');
Route::post('/add-otdel', function (Request $request) {
    DB::table('otdel') ->insert([
        'otdel' => request('otdel'),
    ]);
    return json_encode(['status' => 'ok']);    
})->middleware('auth');
Route::post('/edit-otdel', function () {
    DB::table('otdel')->where('id',request('id'))->update([
        "updated_at"=> Carbon::now(),
        'otdel' => request('otdel'),
    ]);
    return json_encode(['status' => 'ok!']);
})->middleware('auth');
Route::get('/otdel/{id}', function ($id) {

    $table = DB::table('otdel')->where('id',$id)->get();   
    return json_encode(['status' => 'ok','otdel' => $table]);    
})->middleware('auth');
Route::post('/delete-otdel', function () {
    DB::table('otdel')->where('id',request("id"))->update([
       "deleted_at" => Carbon::now()
    ]);
   return json_encode(['status' => 'deleted!']);  
})->middleware('auth');

// letter
Route::get('/letter', function () {
    $table = DB::table('letter')->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','letter' => $table]);    
})->middleware('auth');
Route::post('/add-letter', function (Request $request) {
    DB::table('letter') ->insert([
        'letter' => request('letter'),
        'otdel_id' => request('otdel_id'),
    ]);
    return json_encode(['status' => 'ok']);    
})->middleware('auth');
Route::post('/edit-letter', function () {
    DB::table('letter')->where('id',request('id'))->update([
        "updated_at"=> Carbon::now(),
        'letter' => request('letter'),
        'otdel_id' => request("otdel_id"),  
    ]);
    return json_encode(['status' => 'ok!']);
})->middleware('auth');
Route::get('/letter/{id}', function ($id) {

    $table = DB::table('letter')->where('id',$id)->get();   
    return json_encode(['status' => 'ok','letter' => $table]);    
})->middleware('auth');
Route::post('/delete-letter', function () {
    DB::table('letter')->where('id',request("id"))->update([
       "deleted_at" => Carbon::now()
    ]);
   return json_encode(['status' => 'deleted!']);  
})->middleware('auth');


// transport
Route::get('/transport', function () {
    $table = DB::table('car')->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','transport' => $table]);    
})->middleware('auth');
Route::post('/add-transport', function (Request $request) {
    DB::table('car') ->insert([
        'cars' => request('cars'),
    ]);
    return json_encode(['status' => 'ok']);    
})->middleware('auth');
Route::post('/edit-transport', function () {
    DB::table('car')->where('id',request('id'))->update([
        "updated_at"=> Carbon::now(),
        'cars' => request('cars'),
    ]);
    return json_encode(['status' => 'ok!']);
})->middleware('auth');
Route::get('/transport/{id}', function ($id) {

    $table = DB::table('car')->where('id',$id)->get();   
    return json_encode(['status' => 'ok','transport' => $table]);    
})->middleware('auth');
Route::post('/delete-transport', function () {
    DB::table('car')->where('id',request("id"))->update([
       "deleted_at" => Carbon::now()
    ]);
   return json_encode(['status' => 'deleted!']);  
})->middleware('auth');

// earning
Route::get('/earning', function () {
    $table = DB::table('earning')->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','earn' => $table]);    
})->middleware('auth');
Route::post('/add-earning', function (Request $request) {
    DB::table('earning') ->insert([
        'earn' => request('earn'),
        'otdel_id' => request('otdel_id'),
        'class_id' => request('class_id'),
    ]);
    return json_encode(['status' => 'ok']);    
})->middleware('auth');
Route::post('/edit-earning', function () {
    DB::table('earning')->where('id',request('id'))->update([
        "updated_at"=> Carbon::now(),
        'earn' => request('earn'),
        'class_id' => request("class_id"),  
    ]);
    return json_encode(['status' => 'ok!']);
})->middleware('auth');
Route::get('/earning/{id}', function ($id) {

    $table = DB::table('earning')->where('id',$id)->get();   
    return json_encode(['status' => 'ok','earn' => $table]);    
});
Route::post('/delete-earning', function () {
    DB::table('earning')->where('id',request("id"))->update([
       "deleted_at" => Carbon::now()
    ]);
   return json_encode(['status' => 'deleted!']);  
})->middleware('is_admin');

// potok_num
Route::get('/potok_number', function () {
    $table = DB::table('potok_number')->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','potok_number' => $table]);    
})->middleware('is_admin');
Route::post('/potok_number', function (Request $request) {
    DB::table('otdel') ->insert([
        'otdel_choose' => request('otdel_choose'),
        'numeration' => request('numeration'),
    ]);
    return json_encode(['status' => 'ok']);    
})->middleware('is_admin');




Route::post('/users/import', function(Request $request) {
    $table = Excel::import(new UsersImport, $request->file('excel_file'));
    return response()->json([
        "status" => $table ? "ok" : "none",
    ]);
})->middleware('is_admin');

Route::get('/users/export', function(Request $request) {
    return Excel::download(new UsersExport, 'users.xlsx'); 
    return Excel::download(new UsersExport, 'users.xlsx'); 
    
})->middleware('is_admin');


Route::get('/barcode', function () {
    return view('barcode');
})->middleware('is_admin');

Route::post('/generate-barcode', [BarcodeController::class, 'generateBarcode'])->middleware('is_admin');





// message admin-front
Route::get('/message', function () {
    $table = DB::table('message')->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','learn' =>$table]);  
      
})->middleware('is_admin');
Route::post('/delete-message', function () {
    DB::table('message')->where('id',request("id"))->update([
       "deleted_at" => Carbon::now()
    ]);
   return json_encode(['status' => 'deleted']);  
})->middleware('is_admin');

// swipe admin-front
// swipe

Route::get('/swiper', function () {
    $table = DB::table('image_home')->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','swiper' => $table]);    
});
Route::get('/swiper_null', function () {
    $table = DB::table('image_home')->get();   
    return json_encode(['status' => 'ok','swiper_null' => $table]);    
})->middleware('is_admin');
// Route::post('/add-swiper', function (Request $request) {
//     DB::table('image_home') ->insert([
//         'images' => request('images'),
//         'source' => request('source'),
//     ]);
//     return json_encode(['status' => 'ok']);    
// })->middleware('auth');
Route::post('/add-img_swipe', function () {
    DB::table('image_type')->insert([        
        'img' => request('img'),
        'created_at' => Carbon::now(+5),
        'deleted_at' => null,
        'updated_at' => null,
    ]);
    return json_encode(['status' => 'ok']);
})->middleware('is_admin');
Route::post('/add-swiper', function () {
    DB::table('image_home')->insert([        
        'images' => request('images'),
        'source' => request('source'),
        'created_at' => Carbon::now(+5),
        'deleted_at' => null,
        'updated_at' => null,
    ]);
    return json_encode(['status' => 'ok']);
})->middleware('is_admin');
Route::post('/save-swiper', function () {
    DB::table('image_home')->where('id',request("id"))->update([        
        'source' => request("source"), 
        'images' => request('images'),
    ]);
    return json_encode(['status' => 'ok']);
})->middleware('is_admin');

Route::post('/delete-image_type', function () {
    DB::table('image_type')->where('id',request("id"))->update([
       "deleted_at" => Carbon::now()
    ]);
   return json_encode(['status' => 'deleted']);  
})->middleware('is_admin');
Route::post('/delete-image', function () {
    DB::table('image_home')->where('id',request("id"))->update([
       "deleted_at" => Carbon::now()
    ]);
   return json_encode(['status' => 'deleted']);  
})->middleware('is_admin');
Route::post('/edit-image', function () {
    DB::table('image_home')->where('id',request('id'))->update([
        "updated_at"=> Carbon::now(),
        'images' => request('images'),
        'source' => request("source"),  
    ]);
    return json_encode(['status' => 'ok!']);
})->middleware('is_admin');
Route::post('/get-image', function (Request $request) {
    $link = $request->file('photo')->store('swipe-home');
    $li = $request->file('photo')->store('swipe-home');
    Log::info($li);
    return json_encode(['status' => 'ok', "data" => $link]);
})->middleware('is_admin');

// group admin-front
Route::get('/admin_group', function () {
    $table = DB::table('groupa')->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','group' => $table]);    
})->middleware('is_admin');
Route::get('/admin_group_null', function () {
    $table = DB::table('groupa')->whereNotNull("deleted_at")->get();   
    return json_encode(['status' => 'ok','group' => $table]);    
})->middleware('is_admin');
Route::post('/add-group', function (Request $request) {
    DB::table('groupa') ->insert([
        'group_id' => request('group_id'),
        'url' => request('url'),        
        'name_site' => request('name_site'),
        'namin' => request('namin'),
    ]);
    DB::table('product')->where('product_id',request('namin'))->where('gender',request('group_id'))->update([
        "deleted_at" => null
    ]);
    return json_encode(['status' => 'ok']);    
})->middleware('is_admin');       

Route::post('/delete-group', function () {
    DB::table('groupa')->where('id',request("id"))->update([
       "deleted_at" => Carbon::now()
    ]);
    $dad = DB::table('product')->where('product_id',request("name"))->where('gender',request('group_id'))->update([
        "deleted_at" => Carbon::now()
     ]);
   return json_encode(['status' => 'deleted','dad' => $dad]);  
})->middleware('is_admin');

Route::post('/edit-group', function () {
    DB::table('groupa')->where('id',request('id'))->update([
        'group_id' => request('group_id'),
        'namin' => request('namin'),
        'url' => request('url'),
        'name_site' => request('name_site'),
    ]);
    return json_encode(['status' => 'ok']);
})->middleware('is_admin');

Route::get('/group/{id}', function ($id) {

    $table = DB::table('groupa')->where('id',$id)->get();   
    return json_encode(['status' => 'ok','groupa' => $table]);    
});

// product admin-front
Route::post('/add-types', function (Request $request) {
    DB::table('type') ->insert([
        'gender' => request('gender'),
        'source' => request('source'),
    ]);
    return json_encode(['status' => 'ok']);    
})->middleware('is_admin');

Route::post('/add_image-product_edit_1', function () {
    DB::table('product')->where('id',request('id'))->update([        
        'img' => request('img'),
    ]);
    return json_encode(['status' => 'ok']);
})->middleware('is_admin');

Route::post('/add-product', function (Request $request) {
    DB::table('product') ->insert([
        'product_name' => request('product_name'),
        'url' => request('url'),
        'url_url' => request('url_url'),
        'img' => request('img'),
        'stars' => request('stars'),
        'gender' => request('genderer'),
        'item' => request('item'),        
        'product_id' => request('product_id'),
        'price' => request('price'),
        'info' => request('info'),
        'availability' => request('availability'),    
        'code_product' => request('code_product'),
        'size' => request('size'),
        'plotnost' => request('plotnost'),
        'settings' => request('settings'),
        'cotton' => request('cotton'),
        'recomended' => request('recomended'),
        'name_site' => request('name_site'),
        'tags' => request('tags'),
        'status'=> request('status'),
        'thread' => request('thread'),
    ]);
    return json_encode(['status' => 'ok']);    
})->middleware('is_admin');

Route::post('/delete-type', function () {
    DB::table('type')->where('id',request("id"))->update([
       "deleted_at" => Carbon::now()
    ]);
   return json_encode(['status' => 'deleted']);  
})->middleware('is_admin');



Route::post('/worker-delete', function () {
    // Log::info(json_decode(request('list')));

    foreach(json_decode(request('list')) as $id) {
        DB::table('kid')->where('id',$id)->update([
            "fired" => Carbon::now()
         ]);
    }
        
    return json_encode(['status' => 'deleted!']);  
})->middleware('is_admin');



Route::post('/delete_product', function () {
    Log::info(json_decode(request('list')));
    
    foreach(json_decode(request('list')) as $id) {
        DB::table('product')->where('id',$id)->update([
            "deleted_at" => Carbon::now()
         ]);
    }
        
    return json_encode(['status' => 'deleted!']);  
})->middleware('is_admin');

Route::post('/edit-product', function () {
    DB::table('product')->where('id',request('id'))->update([        
        'url' => request('url'),
        'url_url' => request('url_url'),
        'product_name' => request('product_name'),
        'status'=> request('status'),
        'gender' => request('gender'),
        'item' => request('item'),        
        'price' => request('price'),
        'info' => request('info'),
        'img' => request('img'),
        'product_id' => request('product_id'),
        'availability' => request('availability'),
        'code_product' => request('code_product'),
        'size' => request('size'),
        'plotnost' => request('plotnost'),
        'settings' => request('settings'),
        'cotton' => request('cotton'),
        'thread' => request('thread'),
        'stars' => request('stars'),
        'recomended' => request('recomended'),
        'name_site' => request('name_site'),
        'tags' => request('tags'),
    ]);
    return json_encode(['status' => 'ok']);
})->middleware('is_admin');
Route::post('/save-image', function () {
    DB::table('product')->where('id',request('id'))->update([        
        'img' => request('img'),
    ]);
    return json_encode(['status' => 'ok']);
})->middleware('is_admin');


Route::get('/product/{id}', function ($id) {

    $table = DB::table('product')->where('id',$id)->get();   
    return json_encode(['status' => 'ok','pro_edit' => $table]);    
});
Route::get('/product', function () {

    $table = DB::table('product')->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','products' => $table]);    
})->middleware('is_admin');
Route::get('/admin_product', function () {

    $table = DB::table('product')->get();   
    return json_encode(['status' => 'ok','products' => $table]);    
})->middleware('is_admin');
// img group
Route::get('/image_type', function () {
    $table = DB::table('image_type')->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','image_type' => $table]);    
});
Route::get('/image_type_null', function () {
    $table = DB::table('image_type')->get();   
    return json_encode(['status' => 'ok','image_type' => $table]);    
})->middleware('is_admin');
Route::post('/add-image_type', function (Request $request) {
    DB::table('image_type') ->insert([
        'img' => request('img'),
    ]);
    return json_encode(['status' => 'ok']);    
})->middleware('is_admin');

Route::post('/delete-image_type', function () {
    DB::table('image_type')->where('id',request("id"))->update([
       "deleted_at" => Carbon::now()
    ]);
   return json_encode(['status' => 'deleted']);  
})->middleware('is_admin');


Route::post('/edit-image_type', function () {
    DB::table('image_type')->where('id',request('id'))->update([
        "updated_at"=> Carbon::now(),
        'img' => request('img'),
    ]);
    return json_encode(['status' => 'ok!']);
})->middleware('is_admin');

Route::get('users', [UserController::class, 'index'])->name('users.index');

Route::get('/users', [ProductController::class, 'allProducts']);


// login

Route::post('/login', function () {

    $check = DB::table('users')->where('nami', request("nami"))->where('password', request("password"))->exists();

    if($check) {
        $user = DB::table('users')->where('nami',request("nami"))->where('password',request("password"))->first();
        Auth::loginUsingId($user->id);  
}

    return response()->json([
        "status" => $check ? "ok" : "none",
    ]);

})->name('login');


Route::post('/logout-system', function () {

    Auth::logout();
 
    return redirect('/api');
 
 })->middleware('is_admin');
 
//  admin_user
Route::get('/user', function () {

    $table = DB::table('users')->where('deleted_at',null)->where('role','0')->get();   
    return json_encode(['status' => 'ok','register' => $table]);    
})->middleware('is_admin');
Route::post('/add_image-product_edit', function () {
    DB::table('users')->where('id',request('id'))->update([        
        'img' => request('img'),
    ]);
    return json_encode(['status' => 'ok']);
})->middleware('is_admin');


Route::post('/edit_user', function () {
    DB::table('users')->where('id',request('id'))->update([
        "nami"=> request('nami'),
        'surname' => request('surname'),
        'img' => request('img'),
        'mail' => request('mail'),
        'password' => request('password'),
        'confirm_password' => request('confirm'),
    ]);
    return json_encode(['status' => 'ok!']);
})->middleware('is_admin');

Route::post('/edit_time', function () {
    DB::table('kid')->where('barcode',request('barcode'))->update([
        "date_made"=> request('date_made'),
    ]);
    return json_encode(['status' => 'ok']);
})->middleware('is_admin');


//  add_register_user
Route::post('/add-users', function (Request $request) {
    DB::table('users') ->insert([
        'nami' => request('nami'),
        'surname' => request('surname'),
        'mail' => request('mail'),
        'phone' => request('phone'),
        'company' => request('company'),
        'address' => request('address'),
        'city' => request('city'),        
        'index_post' => request('index_post'),
        'country' => request('country'),
        'region' => request('info'),
        'confirm_password' => request('confirm_password'),
        'news' => request('news'),
        'password' => request('password'),
        'role' => '1'   
    ]);
    return json_encode(['status' => 'ok']);    
})->middleware('is_admin');


Route::post('/delete-image_edit', function () {
    DB::table('users')->where('id',request('id'))->update([
        'img' => request('img'),
    ]);

   return json_encode(['status' => 'deleted']);  
})->middleware('is_admin');
//  recom
Route::post('/edit-rec', function () {
    DB::table('product')->where('id',request('id'))->update([
        "recoment_updated"=> Carbon::now(),
        'recomended' => request('recomended'),
    ]);
    return json_encode(['status' => 'ok!']);
})->middleware('is_admin');



// feedbacks
Route::get('/feedbacks', function () {
    $table = DB::table('feedbacks')->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','feedbacks' => $table]);    
});
Route::post('/delete-feedbacks', function () {
    DB::table('feedbacks')->where('id',request("id"))->update([
       "deleted_at" => Carbon::now()
    ]);
   return json_encode(['status' => 'deleted']);  
})->middleware('is_admin');










// type
Route::get('/admin_type', function () {
    $table = DB::table('type')->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','type' => $table]);    
})->middleware('is_admin');

Route::get('/admin_type_null', function () {
    $table = DB::table('type')->whereNotNull("deleted_at")->get();   
    return json_encode(['status' => 'ok','type' => $table]);    
})->middleware('is_admin');






Route::post('/delete_image_edit', function () {
    $prod = DB::table('product')->where('id',request("id"))->first();
    
    
    
    $img_array = json_decode($prod->img);
    $lest = array_splice($img_array[0]->image,request('index'),1);
    Log::info($img_array);


    DB::table('product')->where('id',request("id"))->update([
        'img' => json_encode($img_array)
    ]);

   return json_encode(['status' => 'deleted']);  
})->middleware('is_admin');
Route::post('/delete_image_edit_o', function () {
    $prod = DB::table('product')->where('id',request("id"))->first();
    
    
    
    $img_array = json_decode($prod->img);
    $lest = array_splice($img_array[0]->image,request('index'),1,'swipe-home/Z9sOBz8V5vSCdEjkgOh8lttFR1D63FRHcVSM262G.jpg');


    DB::table('product')->where('id',request("id"))->update([
        'img' => json_encode($img_array)
    ]);

   return json_encode(['status' => 'deleted']);  
})->middleware('is_admin');

Route::post('/save-image_type', function (Request $request) {
    $link = $request->file('photo')->store('swipe-home');    
    $prod = DB::table('image_type')->where('id',request("id"))->first();
    
    
    
    $img_array = $prod->img;
    // Log::info($link);
    $lest = str_replace($img_array,$link,$img_array);

    DB::table('image_type')->where('id',request("id"))->update([
        'img' => $link,
    ]);

   return json_encode(['status' => 'ok',"data" => $lest]); 
})->middleware('is_admin');
Route::post('/save-banner', function (Request $request) {
    $link = $request->file('photo')->store('swipe-home');    
    $prod = DB::table('image_home')->where('id',request("id"))->first();
    
    
    
    $img_array = $prod->images;
    // Log::info($link);
    $lest = str_replace($img_array,$link,$img_array);

    DB::table('image_home')->where('id',request("id"))->update([
        'images' => $link,
    ]);

   return json_encode(['status' => 'ok',"data" => $lest]); 
})->middleware('is_admin');



Route::post('/edit-image_product', function () {
    $prod = DB::table('product')->where('id',request("id"))->first();
    
    
    
    $img_array = json_decode($prod->img);
    $lest = array_splice($img_array[0]->image,request('index'),1);
    Log::info($img_array);


    DB::table('product')->where('id',request("id"))->update([
        'img' => json_encode($img_array)
    ]);

   return json_encode(['status' => 'deleted']); 
})->middleware('is_admin');

Route::post('/image_save_edit', function (Request $request) {
    $link = $request->file('photo')->store('swipe-home');

    $prod = DB::table('product')->where('id',request("id"))->first();
    
    
    
    $img_array = json_decode($prod->img);
    $lest = array_splice($img_array[0]->image,request('index'),1,$link);
    Log::info($link);


    DB::table('product')->where('id',request("id"))->update([
        'img' => json_encode($img_array)
    ]);

   return json_encode(['status' => 'ok',"data" => $link]); 
})->middleware('is_admin');





// currency
Route::get('/currency', function () {
    $table = DB::table('currency')->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','currency' => $table]);    
})->middleware('is_admin');
Route::get('/currency_status', function () {
    $table = DB::table('currency')->where("level",'1')->where("deleted_at",null)->get();   
    return json_encode(['status' => 'ok','currency' => $table]);    
})->middleware('is_admin');
Route::post('/delete-currency', function () {
    DB::table('currency')->where('id',request("id"))->update([
       "deleted_at" => Carbon::now()
    ]);
   return json_encode(['status' => 'deleted!']);  
})->middleware('is_admin');
Route::post('/add-currency', function (Request $request) {
    DB::table('currency') ->insert([
        'name' => request('name'),
        'symbol' => request('symbol'),
        'level' => request('level'),
    ]);
    return json_encode(['status' => 'ok']);    
})->middleware('is_admin');
Route::post('/edit-currency', function () {
    DB::table('currency')->where('id',request('id'))->update([
        'name' => request('name'),
        'symbol' => request('symbol'),
        'level' => request('level'),
    ]);
    return json_encode(['status' => 'ok!']);
})->middleware('is_admin');
Route::get('/currency/{id}', function ($id) {

    $table = DB::table('currency')->where('id',$id)->get();   
    return json_encode(['status' => 'ok','currency' => $table]);    
})->middleware('is_admin');

// Route::get('qr-code', function () {
    
//     return QrCode::encoding('UTF-8')->size(500)->generate('Добро пожаловать на jobtools.ru');
//     // return response($pngImage);
// });