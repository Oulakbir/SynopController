<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StationInformationController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\TypeFormController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\BotManController;
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
use App\Http\Controllers\SynopticMessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ChatBotController;
Route::get('/form', [StationInformationController::class, 'showForm'])->name('form.show');
Route::post('/form', [StationInformationController::class, 'submitForm'])->name('form.submit');

                                /*      Message control         */

Route::get('/synoptic-messages', [SynopticMessageController::class, 'index']);
Route::post('/synoptic-messages', [SynopticMessageController::class, 'store']);
Route::post('message/update', [SynopticMessageController::class,'updateRecord'])->name('message/update');
Route::post('Message/delete', [SynopticMessageController::class, 'destroy'])->name('Message/delete');
Route::get('Message/table',[SynopticMessageController::class, 'index'])->middleware(['auth','admin'])->name('Message/table');
Route::post('/submit-form', [SynopticMessageController::class, 'submitForm'])->name('submit.form');
Route::get('/UserMessages/table', [ManageController::class, 'index'])->middleware('auth')->name('/UserMessages/table');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

route::get('post',[HomeController::class, 'post'])->middleware(['auth','admin']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/Manage', [App\Http\Controllers\ManageController::class, 'index'])->middleware('auth')->name('Manage');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/contact', function () {
    return view('contact');
});
Route::get('Comment/table',[ContactFormController::class, 'index'])->middleware(['auth','admin'])->name('Comment/table');
Route::post('Comment/delete', [ContactFormController::class, 'destroy'])->name('Comment/delete');

// -------------------------- user management ----------------------//
Route::controller(UserManagementController::class)->group(function () {
    Route::get('user/table', 'index')->middleware(['auth','admin'])->name('user/table');
    Route::post('user/update', 'updateRecord')->name('user/update');
    Route::post('user/delete', 'deleteRecord')->middleware(['auth','admin'])->name('user/delete');
    Route::get('user/profile', 'profileUser')->middleware('auth')->name('user/profile');

});
Route::get('/create-user', [UserManagementController::class, 'create'])->name('create-user');
Route::post('/store-user', [UserManagementController::class, 'store'])->name('store-user');

// -------------------------- type form ----------------------//
Route::controller(TypeFormController::class)->group(function () {
    Route::get('form/input/new', 'index')->middleware('auth')->name('form/input/new');

});


Route::get('/test-connexion', function () {
    $ip = '172.16.0.38';
    $port = 80; // Utiliser le port approprié en fonction du service que vous voulez tester (ici, port 80 pour HTTP)
    $timeout = 2; // Fixer un délai d'attente de 2 secondes

    // Tenter de se connecter au serveur distant
    $fp = @fsockopen($ip, $port, $errno, $errstr, $timeout);

    if ($fp) {
        // La connexion a réussi
        fclose($fp);
        $message = "Connected successfully!";
    } else {
        // La connexion a échoué
        $message = "Connexion faild!";
    }

    // Retourner la réponse en JSON
    return response()->json(['message' => $message]);
});
Route::post('/submit-contact', [ContactFormController::class, 'submitForm'])->name('submit.contact');

//Documentation

Route::get('/Documentation', function () {
    return file_get_contents(public_path('../vendor/soandso/synop/docs/index.html'));
});
Route::get('/namespaces',function(){
    return file_get_contents(public_path('../vendor/soandso/synop/docs/namespaces/soandso.html'));
});
Route::get('/synops',function(){
    return file_get_contents(public_path('../vendor/soandso/synop/docs/namespaces/soandso-synop.html'));
});
//chatbot
Route::get('/chatbot', function () {
    return view('chatbot');
});
Route::get('send',[ChatBotController::class,'sendChat']);
require __DIR__ . '/auth.php';

Route::match(['get', 'post'], 'botman', [BotManController::class, 'handle']);

Auth::routes();

