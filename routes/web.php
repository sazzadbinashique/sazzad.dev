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

	Route::get('/', function (){

//	    return view('welcome');



        $data = [
          'title' => 'Hi Student How are you second ',
          'content'=> 'This a test mail , are you understand that'
        ];



	    Mail::send('emails.test', $data, function($message){

	        $message->to('sazzad.sumon35@gmail.com', 'Sazzad Bin Ashique')->subject('Hello Sazzad');
        });


	});





    Route::group(['middleware'=>'web'], function (){

        Route::resource('posts', 'PostController');


    });


Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('/admin/users/role', ['middleware'=>['role', 'auth', 'web'], function(){

    return "middleware Role";
}]);


Route::get('/admin', 'AdminController@index');


