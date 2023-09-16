<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PostController;

use App\Http\Controllers\AccessoriesController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Models\Booked_Package;
use App\Models\Room;
use App\Models\Category;
use App\Models\Post;
use App\Models\Accessories;
use App\Http\Controllers\RoomController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();
  

  
Route::group(['middleware' => ['auth']], function() {
    Route::get('/camping-pack', function () {
        return view('admin.index');
    });
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('booking', BookingController::class);
    Route::resource('create',BookingController::class);
    Route::resource('accessories', AccessoriesController::class);
    // Route::resource('room/create', RoomController::class);
});

// Route::get('/admin', function () {
//     return view('admin.index');
// });

// login and register

// Route::get('/login', [AuthController::class, 'index'])->name('login');
// Route::post('/post-login', [AuthController::class, 'postLogin'])->name('login.post');
// Route::get('/registration', [AuthController::class, 'registration'])->name('register');
// Route::post('/post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
// // Route::get('/dashboard', [AuthController::class, 'dashboard']);
// Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Category

// Route::resource('/category', CategoryController::class);

//posts
Route::get('/',function(){
    return view('admin/index');
});
// Route::get('/all_booking',function(){
//     return view('booking/all_booking');
// });

//====Rooms====\\
Route::get('rooms',[RoomController::class,'index'])->name('rooms.index');
Route::get('rooms/list', [RoomController::class,'getRoom'])->name('rooms.list');
Route::get('/room_create', [RoomController::class,'create']);
Route::post('/room_store', [RoomController::class,'store'])->name('room.store');
Route::get('/rooms-edit/{rooms}',[RoomController::class,'edit'])->name('rooms.edit');
Route::put('/rooms/{rooms}',[RoomController::class,'update'])->name('rooms.update');

Route::get('all_booking',[BookingController::class,'index']);
Route::get('/create_booking', [BookingController::class,'create']);
Route::post('/booking_store', [BookingController::class,'store']);

// Route::resource('create', RoomController::class);
// Route::get('/all_room',' RoomController@index ')->name('rooms.index');
// Route::get('room/create', ' RoomController@create ')->name('rooms.create');
// Route::post('rooms/add_room',[RoomController::class,'store'])->name('rooms.store');

// Route::get('/post',[PostController::class,'index'])->name('post.index');
// Route::get('/post',[PostController::class,'index'])->name('post.index2');
// Route::get('/post/create',[PostController::class,'create'])->name('post.create');
// Route::post('/post',[PostController::class,'store'])->name('post.store');

Route::get('students', [StudentController::class, 'index']);
Route::get('students/list', [StudentController::class, 'getStudents'])->name('students.list');

// Route::get('rooms', [RoomController::class, 'index']);
// Route::get('rooms/list', [RoomController::class, 'getRooms'])->name('rooms.list');
// Route::get('rooms/create',[RoomController::class,'create'])->name('rooms.create');
// Route::post('rooms/create',[RoomController::class,'store'])->name('rooms.store');

// Route::get('/accessories',[AccessoriesController::class,'index'])->name('accessories.index');
// Route::get('accessories/list', [AccessoriesController::class, 'getAccessories'])->name('accessories.list');
// Route::get('accessories/create',[AccessoriesController::class,'create'])->name('accessories.create');
// Route::post('accessories/create',[AccessoriesController::class,'store'])->name('accessories.store');
// Route::get('/accessories/{accessories}/edit',[AccessoriesController::class,'edit'])->name('accessories.edit');
// Route::put('/accessories/{accessories}',[AccessoriesController::class,'update'])->name('accessories.update');

// Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');  
// Route::get('/booking/create',[BookingController::class,'create'])->name('booking.create');


// Auth::routes();

