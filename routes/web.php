<?php

use App\Histoire;
use App\Chapitre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

Auth::routes();

Route::get('/', 'ControleurVisualisation@index')->name('home');

Route::get('/histoire/{n}', 'ControleurVisualisation@histoire')->name('histoire')->where('n', '[0-9]+');
Route::get('/mesHistoires', 'ControleurVisualisation@mesHistoires')->name('mesHistoires');

Route::get('/chapitre/{n}', 'ControleurVisualisation@chapitre')->name('chapitre')->where('n', '[0-9]+');
Route::get('/mesHistoires/mesChapitres/{id}', 'ControleurVisualisation@mesChapitres')->name('mesChapitres');
Route::get('/mesHistoires/editerChapitre/{idC}', 'ControleurVisualisation@editerChapitre')->name('editerChapitre');

Route::get('/histoire/creer', 'ControleurCreation@creerHistoire')->name('creer_histoire');
Route::post('/histoire/enregistrer', 'ControleurCreation@enregistrerHistoire')->name('enregistrer_histoire');
Route::post('/mesHistoires/MesChapitres/{id}', 'ControleurCreation@activeHistoire')->name('active_histoire');

Route::get('/chapitre/creer', 'ControleurCreation@creerChapitre')->name('creer_chapitre');
Route::post('/chapitre/enregistrer', 'ControleurCreation@enregistrerChapitre')->name('enregistrer_chapitre');
Route::post('mesHistoires/editerChapitre','ControleurCreation@modifierChapitre')->name('modifier_chapitre');

Route::get('/chapitre/lier/{histoire_id}', 'ControleurCreation@lierChapitre')->name('lier_chapitre');
Route::post('/chapitre/lier/enregistrer', 'ControleurCreation@enregistrerLiaison')->name('enregistrer_liaison');

Route::get('/recherche', 'ControleurVisualisation@recherche')->name('recherche');
