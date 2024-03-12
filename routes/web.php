

<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EvaluationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\VehiculeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Routes for regular users
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Routes for administrators
Route::middleware(['auth', 'user-access:admin'])->group(function () {
Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

// Routes for managers
Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});

Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Routes clients
Route::middleware(['auth', 'user-access:admin'])->group(function () {

Route::get('/client',[ClientController::class,'listeClient'])->name('listeClient');
Route::get('/Ajouterclient',[ClientController::class,'ajouterClient'])->name('ajouterClient');
Route::get('/AjouterclientTraitement',[ClientController::class,'ajoutTraitementClient'])->name('ajoutTraitementClient');
Route::get('/supprimerClient/{id}', [ClientController::class,'supprimerClient'])->name('supprimerClient');

});


// Routes chauffeurs
Route::middleware(['auth', 'user-access:admin'])->group(function () {

Route::get('/chauffeur',[ChauffeurController::class,'listeChauffeur'])->name('listeChauffeur');
Route::get('/Ajouterchauffeur',[ChauffeurController::class,'ajouterChauffeur'])->name('ajouterChauffeur');
Route::get('/AjouterchauffeurTraitement',[ChauffeurController::class,'ajoutTraitementChauffeur'])->name('ajoutTraitementChauffeur');
Route::get('/supprimerChauffeur/{id}', [ChauffeurController::class,'supprimerChauffeur'])->name('supprimerChauffeur');

});


// Routes Vehicules

Route::middleware(['auth', 'user-access:admin'])->group(function () {
   
Route::get('/vehicule',[VehiculeController::class,'listeVehicule'])->name('listeVehicule');
Route::get('/Ajoutervehicule',[VehiculeController::class,'ajouterVehicule'])->name('ajouterVehicule');
Route::post('/AjoutervehiculeTraitement',[VehiculeController::class,'ajoutTraitementVehicule'])->name('ajoutTraitementVehicule');
Route::get('/Modifiervehicule/{id}', [VehiculeController::class,'modifierVehicule'])->name('modifierVehicule');
Route::post('/ModifiervehiculeTraitement', [VehiculeController::class,'modifierTraitementVehicule'])->name('modifierTraitementVehicule');
Route::get('/supprimerVehicule/{id}', [VehiculeController::class,'supprimerVehicule'])->name('supprimerVehicule');
});


// Routes Locations
Route::get('/location',[LocationController::class,'listeLocation'])->name('listeLocation');
Route::get('/ajouterLocation',[LocationController::class,'ajouterLocation'])->name('ajouterLocation');
Route::get('/ajoutTraitementLocation',[LocationController::class,'ajoutTraitementLocation'])->name('ajoutTraitementLocation');
Route::get('/modifierLocation/{id}', [LocationController::class,'modifierLocation'])->name('modifierLocation');
Route::post('modifierTraitementLocation/', [LocationController::class,'modifierTraitementLocation'])->name('modifierTraitementLocation');
Route::get('/supprimerLocation/{id}', [LocationController::class,'supprimerLocation'])->name('supprimerLocation');



// Routes Tarifs
Route::middleware(['auth', 'user-access:admin'])->group(function () {

Route::get('/tarif',[TarifController::class,'listeTarif'])->name('listeTarif');
Route::get('/ajoutertarif',[TarifController::class,'ajouterTarif'])->name('ajouterTarif');
Route::post('/ajoutTraitementTarif',[TarifController::class,'ajoutTraitementTarif'])->name('ajoutTraitementTarif');

});
// Route Evaluation 


Route::get('/evaluation',[EvaluationController::class,'listeEvaluation'])->name('listeEvaluation');
Route::get('/ajouterEvaluation',[EvaluationController::class,'ajouterEvaluation'])->name('ajouterEvaluation');
Route::post('/ajoutTraitementevaluation',[EvaluationController::class,'ajoutTraitementevaluation'])->name('ajoutTraitementevaluation');

Route::get('/CountVehicule',[VehiculeController::class,'CountVehicule'])->name('CountVehicule');












