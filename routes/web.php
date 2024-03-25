<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PhoneBookController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthCheckMiddleware;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register',[UserController::class,'showRegister'])->name("showRegister");
Route::post('register',[UserController ::class,'register'])->name("register.save");

Route::get('verify-email/{email}/{code}',[UserController::class,'verifyUser'])->name("verifyEmail");

Route::get('login',[UserAuthController::class,'showLogin'])->name("loginShow");
Route::post('login',[UserAuthController::class,'login'])->name("login");
Route::get('logout',[UserAuthController::class,'logout'])->name("logout");

Route::get('admin/dashboard',function(){
    return "Dashboard";
})->middleware('AdminAuth');

Route::get('admin/login',[AdminController::class,'showLogin'])->name("admin.loginShow");
Route::post('admin/login',[AdminController::class,'login'])->name("admin.login");
Route::get('admin/logout',[AdminController::class,'logout'])->name("admin.logout");



Route::middleware([AuthCheckMiddleware::class])->group(function () {
    Route::group(['prefix' => 'list'],function(){

        Route::get('/',[PhoneBookController::class,'index'])->name('contactList');
        Route::post('/create',[PhoneBookController::class,'create'])->name('creatContact');
    
        Route::get('/{id}/edit',[PhoneBookController::class,'showEdit'])->name('showEdit');
        Route::post('/{id}/edit',[PhoneBookController::class,'edit'])->name('contactEdit');
    
        Route::get('/{id}/delete',[PhoneBookController::class,'delete'])->name('ContactDelete');  
    });
});

// OAUTH :
Route::get('google/redirect',function(){
    return Socialite::driver('google')->redirect();
});
  
Route::get('google/callback', function () {
    $user = Socialite::driver('google')->user();

    $userEmail = $user->getEmail();
    $userName = strtolower(implode('_',explode(' ',$user->getName())));
 
    $getUser = User::where('email',$userEmail)->first();

    if($getUser){
        Auth::login($getUser);
        return redirect('list');

    }else{
       $user = User::create([
            'name' => $userName,
            'email' => $userEmail,
            'password' => bcrypt('123456'),
        ]);
        
        Auth::login($user);
        return redirect('list');
    }
    // $user->token
});


/// Email :  vekf dnsp rfes usux

