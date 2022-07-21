<?php

use App\Http\Controllers\AccessRefusedController;
use App\Http\Controllers\LockedOutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserAllController; 
use App\Http\Controllers\AddNewUserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Communication\TimelineController; 
use App\Http\Controllers\Communication\EventController;
use App\Http\Controllers\EditBlaineOfficeController; 
use App\Http\Controllers\AllOfficeController; 
use App\Http\Controllers\DocumentController; 
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
});


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
  Route::group(['middleware' => ['acount_status']], function () {

    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    Route::get('/lockedout', [LockedOutController::class, 'index']);
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/{orderId}', [OrderController::class, 'show'])->name('order.show');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/userAll', [UserAllController::class, 'index'])->name('userAll');
    Route::get('/addNewUser', [AddNewUserController::class, 'index'])->name('addNewUser');
    Route::post('/user/setProfilePhoto', [UserController::class, 'setProfilePhoto'])->name('user.setProfilePhoto');

    Route::get('/communication/timeline', [TimelineController::class, 'index'])->name('communication.timeline.index');
    Route::get('/communication/timeline/create', [TimelineController::class, 'create'])->name('communication.timeline.create');
    Route::post('/communication/timeline', [TimelineController::class, 'store'])->name('communication.timeline.store');
    Route::get('/communication/timeline/{timeline}/edit', [TimelineController::class, 'edit'])->name('communication.timeline.edit');
    Route::put('/communication/timeline/{timeline}', [TimelineController::class, 'update'])->name('communication.timeline.update');
    Route::post('/communication/timeline/{timeline}/publish/{timeline_version}', [TimelineController::class, 'publish'])->name('communication.timeline.publish');
    Route::get('/communication/event', [EventController::class, 'index'])->name('communication.event.index');
    Route::get('/communication/event/{event}', [EventController::class, 'show'])->name('communication.event.show');
    Route::get('/communication/event/create', [EventController::class, 'create'])->name('communication.event.create');
    Route::post('/communication/event', [EventController::class, 'store'])->name('communication.event.store');
    Route::get('/communication/event/{event}/edit', [EventController::class, 'edit'])->name('communication.event.edit');
    Route::put('/communication/event/{event_version}', [EventController::class, 'update'])->name('communication.event.update');
    Route::post('/communication/event/{event_version}/setBlockBg', [EventController::class, 'setBlockBg'])->name('communication.event.setBlockBg');
    Route::post('/communication/event/{event_version}/setBlockLogo', [EventController::class, 'setBlockLogo'])->name('communication.event.setBlockLogo');
    Route::post('/communication/event/{event_version}/createBlock', [EventController::class, 'createBlock'])->name('communication.event.createBlock');
    Route::put('/communication/event/{event_version}/editBlock', [EventController::class, 'editBlock'])->name('communication.event.editBlock');
    Route::post('/communication/event/{event_version}/setBlockSign', [EventController::class, 'setBlockSign'])->name('communication.event.setBlockSign');
    Route::get('/communication/event/{event}/select-version/', [EventController::class, 'selectVersion'])->name('communication.event.selectVersion');

    Route::get('/editBlaineOffice', [EditBlaineOfficeController::class, 'index'])->name('editBlaineOffice');
    Route::get('/allOffice', [AllOfficeController::class, 'index'])->name('allOffice');

    Route::get('/document', [DocumentController::class, 'index'])->name('document');

    //users controller
    Route::resource('user', AdminUserController::class)->names('user');
  });

  Route::get('accessRefused', [AccessRefusedController::class, 'accessRefused'])->name('accessRefused');
});
