<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtifactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeadController;
use App\Http\Controllers\BoneController;
use App\Http\Controllers\BuckleController;
use App\Http\Controllers\ButtonController;
use App\Http\Controllers\CeramicController;
use App\Http\Controllers\GlassController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\TobaccoPipeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtensilController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\OwnerMiddleware;
use App\Models\Artifact;
use Database\Seeders\AdminSeeder;
use Illuminate\Support\Facades\Route;

//HOMEPAGE & PUBLIC ROUTES
Route::get('/', function () {
    return view('dashboard');
})->name('home');
Route::get('view/{id}', [ArtifactController::class, 'singleItem']);
Route::get('/testhome', function () {
    return view('layouts.newapp');
});
Route::get('/revamp', function () {
    return view('layouts.dashboard2');
});
//PUBLIC QUERY ROUTES
Route::get('/query/bycollection', [QueryController::class, 'getQueryCollection']);
Route::get('/searchCollection', [QueryController::class, 'queryCollection'])->name('query.collection');
Route::get('/query/byartifacttype', [QueryController::class, 'getQueryArtifact']);
Route::get('users/export/', [QueryController::class, 'export']);
Route::get('users/exportQuery/{collection_id}/{start}/{end}', [QueryController::class, 'exportQuery']);
Route::get('/viewartifact/{art_type}/{artifact_id}', [ArtifactController::class, 'singleItem']);

//REQUIRE LOGGED IN ROUTES
Route::middleware("auth")->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'userDashboard'])->name('users.dashboard');
    Route::get('/enteredby/{user}', [ArtifactController::class, 'savedList'])->name('entered.by');
Route::get('/previewData/{artifact_type}/{token}/{user}', [ArtifactController::class, 'previewForm'])->name('form.preview');

    //START NEW ARTIFACT ROUTES
    Route::get('/selectType', [ArtifactController::class, 'typeSelect'])->name('typeselect');
    Route::get('/getForm/{collection}/{art_type}', [ArtifactController::class, 'getForm']);

    //LOGGEDIN CERAMIC ROUTES
    Route::post('/saveCeramic', [CeramicController::class, 'saveCeramic'])->name('save.ceramic');
    Route::post('/submitCeramic/{token}', [CeramicController::class, 'submitCeramic']);


    //LOGGEDIN BEAD ROUTES
    Route::post('/saveBead', [BeadController::class, 'saveBead'])->name('save.bead');
    Route::post('/submitBead/{token}', [BeadController::class, 'submitBead']);

    //LOGGEDIN BUCKLE ROUTES
    Route::post('/saveBuckle', [BuckleController::class, 'saveBuckle'])->name('save.buckle');
    Route::post('/submitBuckle/{token}', [BuckleController::class, 'submitBuckle']);

    //LOGGED IN BUTTON ROUTES
    Route::post('/saveButton', [ButtonController::class, 'saveButton'])->name('save.button');
    Route::post('/submitButton/{token}', [ButtonController::class, 'submitButton']);

    //LOGGED IN GLASS ROUTES
    Route::post('/saveGlass', [GlassController::class, 'saveGlass'])->name('save.glass');
    Route::post('/submitGlass/{token}', [GlassController::class, 'submitGlass']);

    //LOGGED IN UTENSIL ROUTES
    Route::post('/saveUtensil', [UtensilController::class, 'saveUtensil'])->name('save.utensil');
    Route::post('/submitUtensil/{token}', [UtensilController::class, 'submitUtensil']);

    //LOGGED IN TOBACCO ROUTES
    Route::post('/saveTobaccoPipe', [TobaccoPipeController::class, 'saveTobaccoPipe'])->name('save.tobacco');
    Route::post('/submitTobaccoPipe/{token}', [TobaccoPipeController::class, 'submitTobaccoPipe']);
});


//ADMIN RESTRICTED VIEWS
Route::middleware([AdminMiddleware::class])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/collections', [AdminController::class, 'collections'])->name('collections');
    Route::post('/admin/collections', [AdminController::class, 'collectionsPost'])->name('collections.post');
    Route::post('/admin/updatecollections', [AdminController::class, 'collectionsUpdate'])->name('update.collections');
    Route::get('/admin/update/{id}', [AdminController::class, 'reUpdate'])->name('return.update');
    Route::post('/admin/updatecollectionpush', [AdminController::class, 'pushUpdate'])->name('push.collections');
    Route::get('/verifyData', [AdminController::class, 'verifyData'])->name('verify.data');
    Route::post('/verifyData', [AdminController::class, 'checkoutData'])->name('checkout.data');
    Route::post('/releaseData', [AdminController::class, 'releaseData'])->name('release.data');
    Route::get('/reviewData/{user}/{artifact_type}/{id}', [AdminController::class, 'reviewData']);
    

    //ADMIN CERAMIC ROUTES
    Route::post('/validateCeramic/{id}', [CeramicController::class, 'validateCeramic']);
    //ADMIN BEAD ROUTES
    Route::post('/validateBead/{id}', [BeadController::class, 'validateBead']);
    //ADMIN BUCKLE ROUTES
    Route::post('/validateBuckle/{id}', [BuckleController::class, 'validateBuckle']);
    //ADMIN BUTTON ROUTES
    Route::post('/validateButton/{id}', [ButtonController::class, 'validateButton']);
    //ADMIN GLASS ROUTES
    Route::post('/validateGlass/{id}', [GlassController::class, 'validateGlass']);
    //ADMIN UTENSIL ROUTES
    Route::post('/validateUtensil/{id}', [UtensilController::class, 'validateUtensil']);
    //ADMIN TOBACCO ROUTES
    Route::post('/validatePipe/{id}', [TobaccoPipeController::class, 'validateTobaccoPipe']);
});

//OWNER RESTRICTED VIEWS
Route::middleware([OwnerMiddleware::class])->group(function () {
    Route::get('/owner/manageusers/', [OwnerController::class, 'manageUsers'])->name('manage.users');
    Route::post('/newUser', [OwnerController::class, 'newUser']);
    Route::get('/userSettings/{id}', [OwnerController::class, 'userSettings']);
    Route::get('/owner/manageusers/quickaction/{id}/{type}', [OwnerController::class, 'quickAction']);
    Route::post('updateUser/{id}', [OwnerController::class, 'updateSettings']);
});


//ALL USER ACCESS TO LOGIN
Route::get('/login', [AuthController::class, "login"])->name('login');
Route::post('/login', [AuthController::class, "loginPost"])->name('login.post');
Route::get('/register', [AuthController::class, "register"])->name('register');
Route::post('/register', [AuthController::class, "registerPost"])->name('register.post');
Route::post('/logout', [AuthController::class, "logout"])->name('logout');
