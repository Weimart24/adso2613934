<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Models\Game;
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
    $sliders = Game::where('slider', 1)->get();
    return view('welcome')->with('sliders', $sliders);
});

Route::get('/catalogue', function () {
    return view('catalogue');
});

Route::get('/games/list', function () {
    $games = App\Models\Game::all();
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



Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

//Capa de segurirdad
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show']);
    //Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resources([
        'users' => UserController::class,
        'categories' => CategoryController::class,
        'games' => GameController::class
    ]);
});
//Search
Route::post('/users/search', [UserController::class,'search']); //Para el search de busqueda de Users
Route::post('/categories/search', [CategoryController::class,'search']); //Para el search de busqueda de Categories
Route::post('/games/search', [GameController::class,'search']); //Para el search de busqueda de Games


//Exports
Route::get('export/users/pdf', [UserController::class, 'pdf']);
Route::get('export/users/excel', [UserController::class, 'excel']);

Route::get('export/games/pdf', [GameController::class, 'pdf']);
Route::get('export/games/excel', [GameController::class, 'excel']);

//Import
Route::post('import/users', [UserController::class, 'import']);

require __DIR__ . '/auth.php';
