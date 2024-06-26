<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/ideas', function () {
    return view('listideas');
});

Route::get('/setup', function () {
    $credentials = [
        'email' => 'admin@admin.com',
        'password' => 'password'
    ];
    if(!Auth::attempt($credentials)) {
        $user = new \App\Models\User();
        $user->name = 'Admin';
        $user->email = $credentials['email'];
        $user->password = bcrypt($credentials['password']);
        $user->save();
        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            $adminToken= $user->createToken('adminToken',['create', 'read', 'update', 'delete']);
            return response()->json([
                'token' => $adminToken->plainTextToken
            ]);
        }
    }
});
