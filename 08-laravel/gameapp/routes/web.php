<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('catalogue', function () {
    return view('catalogue');
});

Route::get('/games/list', function () {
    $games = App\Models\Game::all();
    //echo var_dump($games);
    dd($games);
});

Route::get('/game/{id}', function () {
    $game = App\Models\Game::find(request()->id);
    //echo var_dump($game);
    dd($game->toArray());
});

Route::get('/user', function () {
    $user = App\Models\User::take(20)->get();
    foreach ($user as $i) {
        $id = $i->id;
        $nombre = $i->fullname;
        $edad = Carbon\Carbon::parse($i->birthdate)->age . " Años";
        $creado = $i->created_at->diffForHumans();

        //echo $i->fullname . " " . $date . " " . $fCreado . "<br>";
        echo $id . " " . $nombre . " " . $edad . " " . $creado . "<br>";
    }
    //dd($user->toArray());
});

Route::get('/games/', function () {
    $games = App\Models\Game::all();
    return view('listgames')->with('juegos', $games);
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
