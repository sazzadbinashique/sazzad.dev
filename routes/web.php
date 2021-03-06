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

    Auth::routes();

    Route::get('/home', 'HomeController@index');

    Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostsController@post']);
    Route::get('/blog', ['as'=>'blog.post', 'uses'=>'AdminPostsController@blog']);


    Route::group(['middleware'=>'IsAdmin'], function (){


        Route::get('/admin', function (){
            return view('admin.index');
        });

        Route::resource('admin/users', 'AdminUsersController');

        Route::resource('admin/posts', 'AdminPostsController');

        Route::resource('admin/categories', 'AdminCategoriesController');

        Route::resource('admin/media', 'AdminMediaController');

        Route::resource('admin/comments', 'PostCommentsController');

        Route::resource('admin/comment/replies', 'CommentRepliesController');


//        Route::resource('posts', 'PostController');

    });






