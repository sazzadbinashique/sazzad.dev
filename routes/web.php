	<?php


    use App\Country;
    use Carbon\Carbon;
	use App\User;
	use App\Post;
	use App\Role;
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

	Route::get('/', function () {
	    return view('welcome');
	});





    Route::group(['middleware'=>'web'], function (){

        Route::resource('posts', 'PostController');


//        Route::get('/dates', function (){
//
//            $dates = new DateTime('+1 weeek');
//            echo  $dates->format('m-d-y');
//            echo  "<br>";
//            echo Carbon::now();
//            echo  "<br>";
//            echo Carbon::now()->subMonths(5)->diffForHumans();
//            echo  "<br>";
//            echo Carbon::now()->yesterday()->diffForHumans();
//        });
//
////
//        Route::get('/getname', function (){
//
//            $users = User::find(1);
//
//            echo $users->name;
//        });
//
//        Route::get('/setname', function (){
//
//            $users = User::find(1);
//
//            $users->name= "shamima yesmin";
//            $users->save();
//        });




    });


Auth::routes();

Route::get('/home', 'HomeController@index');
