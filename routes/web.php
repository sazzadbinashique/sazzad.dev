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

        return view('welcome');
    });

    Route::group(['middleware'=>'IsAdmin'], function (){

        Route::resource('admin/users', 'AdminUsersController');

        Route::resource('admin/posts', 'AdminPostsController');

//        Route::resource('posts', 'PostController');

    });

    Auth::routes();


    Route::get('/admin', function (){
        return view('admin.index');
    });

    Route::get('/home', 'HomeController@index');





