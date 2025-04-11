<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

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

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users',
        'password' => 'required|string|confirmed|min:6',
    ]);

    $role = Role::where('name', 'Usuario')->first();

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'role_id' => $role->id,
    ]);

    Auth::login($user);

    return redirect('/dashboard');
})->name('register.web');


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    $user = User::where('email', $credentials['email'])->first();

    if (!$user || !Hash::check($credentials['password'], $user->password)) {
        return back()->with('error', 'Correo o contraseña incorrectos');
    }

    Auth::login($user); // usa sesión tradicional

    return redirect('/dashboard');
})->name('login.web');

Route::middleware(['auth'])->get('/dashboard', function (Request $request) {
    $user = $request->user()->load('role');
    return view('dashboard', compact('user'));
});


Route::middleware(['web', 'auth:sanctum'])->get('/dashboard', function (Request $request) {
    $user = $request->user()->load('role');
    return view('dashboard', compact('user'));
});


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'admin'])->get('/admin-panel', function () {
    return "<h1>Bienvenido, administrador</h1>";
});


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
