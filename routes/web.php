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


	// Route::get('/date', function(){

	// 	echo Carbon::now()->addDays(5)->diffForHumans();

	// 	echo '<br>'; 


	// 	echo Carbon::now()->yesterday()->diffForHumans();

	// 	echo '<br>'; 


	// 	echo Carbon::now()->subMonths(5)->diffForHumans();

	// 	echo '<br>'; 


	// });


	// Route::get('/getname', function(){

	// 	$users = User::all();

	// 	 //dd($users);

	// 	foreach ($users as $user) {

	// 		echo $user->name ;
	// 		echo "<br>";
	// 	}

	// });

	// Route::get('/setname', function (){

	// 	$user = User::find(1);

	// 	$user->name = "Jhagangir alam"; 
	// 	$user->save();


	// });


	Route::resource('posts', 'PostController');


	// Laravel eloquent for Database

    Route::get('/insert', function (){

        $post= new Post;

        $post->title="This Second line";
        $post->user_id=1;
        $post->content="this is Second new body";
        $post->is_admin=0;
        $post->save();
    });

    Route::get('/insertuser', function (){

        $post= new User();

        $post->name="Sazzad Bin Ashiqeu";
        $post->email="sazzaad@gmail.com";
        $post->password=123456;
        $post->save();
    });

    Route::get('/insertbyid', function (){

        $post= Post::find(1);

        $post->title="This Second line";
        $post->content="this is Second new body";
        $post->save();
    });


    Route::get('/create', function (){

        Post::create(['title'=>'somthing', 'content'=>'something of body']);
    });

    Route::get('/update', function (){

        Post::where('id', 1)->update(['title'=>'This is update method', 'content'=>'Thie is update content method']);
    });

    Route::get('/delete', function (){

        $post= Post::find(6);
        $post->delete();

//        Post::destroy([4,5]);
//        Post::where('is_admin', 0)->delete();
    });


    // Eloquent RElation Database

/*
 * one to one relationship
 */
    Route::get('/user/{id}/post', function ($id){

        return User::find($id)->post;
    });

    /*
     * inverse relationship
     */

    Route::get('/post/{id}/user', function ($id){

        return Post::find($id)->user;
    });


    /*
     * one to many relationship
     */

    Route::get('/posts', function (){

        $user= Role::find(1);

        foreach ($user->posts as $post){
            echo $post->title . "<br>";
            echo $post->content . "<br>";
        }
    });


    Route::get('/user/{id}/role', function ($id){

        $user= User::find($id)->roles()->orderBy('id', 'desc')->get();

        return $user;
//
//        foreach ($user->roles as $role){
//            return $role->name;
//        }
    });


    Route::get('/user/country', function (){

        $country = Country::find(1);

        foreach ($country->posts as $post){

            return $post->title;
        }
    });



