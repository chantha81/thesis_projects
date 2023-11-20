<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AccessoriesController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\TentController;
use App\Http\Controllers\DashboardController;
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
    // Route::get('/', function () {
    //     return view('admin.index');
    // });
    // Route::get('/', [DashboardController::class, 'index']);
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('/delete/{user}',[UserController::class,'destroy']);
    Route::resource('create',BookingController::class);
    Route::resource('accessories', AccessoriesController::class);
    //====Rooms====\\
    Route::get('rooms',[RoomController::class,'index'])->name('rooms.index');
    Route::get('/room_create', [RoomController::class,'create']);
    Route::post('/room_store', [RoomController::class,'store'])->name('room.store');
    Route::get('/rooms-edit/{rooms}',[RoomController::class,'edit'])->name('rooms.edit');
    Route::put('/rooms/{rooms}',[RoomController::class,'update'])->name('rooms.update');
    Route::get('rooms/room-delete/{rooms}',[RoomController::class,'delete']);

    //======booking======\\
    Route::get('getAllbooking',[BookingController::class,'getAllbooking']);
    Route::get('invice',[BookingController::class,'getInvice']);
    Route::get('all_booking',[BookingController::class,'index']);
    Route::get('/create_booking', [BookingController::class,'create']);
    Route::post('/booking_store', [BookingController::class,'store']);
    Route::post('/booking_update/{id}', [BookingController::class,'update']);
    Route::get('/select-room', [BookingController::class,'getRoomByID']);
    Route::get('/room', [BookingController::class,'getRoom']);
    Route::get('/get-room_id', [BookingController::class,'getRoomIDByBookingDetail']);
    Route::get('/package-edit/{id}',[BookingController::class,'edit']);
    Route::get('/delete/{id}',[BookingController::class,'destroy']);
    Route::get('/detail_booking/{id}',[BookingController::class,'getBookingDetail']);
    Route::get('/paid_booking',[BookingController::class,'addPaidBooking']);
    Route::get('/not_paid_booking',[BookingController::class,'notPaidBooking']);
    Route::get('/payment_booking',[BookingController::class,'paymentBooking']);
    Route::get('/getstatus', [BookingController::class,'getStatus']);
    Route::get('/cancel_booking',[BookingController::class,'cancelBooking']);

    //=====Tent====\\
    Route::get('/select-tent', [BookingController::class,'getTentByID']);
    Route::get('/get-tent_id', [BookingController::class,'getTentIDByTentDetail']);
    Route::get('/get-tent', [BookingController::class,'getTent']);
    //===place_camping==\\
    Route::get('/get-place_camping', [BookingController::class,'getPlaceCamping']);

    Route::resource('tents', TentController::class);
    Route::get('tents/delete/{id}',[TentController::class,'delete']);
    Route::get('/booking_invice',[BookingController::class,'invice']);
    
    // === Report ===\\
    Route::get('report',[BookingController::class,'getReport']);
    // Route::get('export-report', [BookingController::class, 'exportReport']);
});

Route::get('{any?}', function () {
    return view('welcome');
})->where('any', '.*');
Route::get('/room', [BookingController::class,'getRoom']);
Route::get('/get-tent', [BookingController::class,'getTent']);
Route::post('/booking_store', [BookingController::class,'store']);
