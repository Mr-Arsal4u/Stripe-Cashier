<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscriptionController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('single-charge', [HomeController::class, 'charge'])->name('single.charge');
Route::get('plans/create',[SubscriptionController::class,'showPlanForm'])->name('plans.create');
Route::post('plans/save', [SubscriptionController::class, 'savePlan'])->name('plans.save');
Route::get('plans',[SubscriptionController::class,'allPlan'])->name('Plans');
Route::get('plans/checkout{id}', [SubscriptionController::class, 'planCheckout'])->name('checkout');
Route::post('process', [SubscriptionController::class, 'process'])->name('process');
Route::get('subscription', [SubscriptionController::class, 'allSubscription'])->name('subscription');
Route::get('subscription/resume',[SubscriptionController::class, 'resume'])->name('subscription.resume');
Route::get('subscription/cancel', [SubscriptionController::class, 'cancel'])->name('subscription.cancel');