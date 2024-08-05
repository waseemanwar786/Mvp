<?php
use Illuminate\Support\Facades\Artisan;

Route::get('/clear-all', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
});

Route::get('/run-migrations', function () {
    try {
        Artisan::call('migrate');
        return 'Migrations successfully executed';
    } catch (\Exception $e) {
        return 'Error occurred while running migrations: ' . $e->getMessage();
    }
});

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.events.create')->with('status', session('status'));
    }

    return redirect()->route('admin.events.create');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    //event
    Route::get('/events', 'EventController@index')->name('events.index');
    Route::get('/events/create', 'EventController@create')->name('events.create');
    Route::post('/events/add', 'EventController@store')->name('events.store');
    Route::get('/events/show/{id}', 'EventController@show')->name('events.show');
    Route::get('/events/edit/{id}', 'EventController@edit')->name('events.edit');
    Route::put('/events/update/{id}', 'EventController@update')->name('events.update');
    Route::delete('events/delete/{id}', 'EventController@delete')->name('events.delete');
    

});


Route::group(['namespace' => 'Admin'], function () {
    
    Route::get('/events/{slug}', 'EventController@view_frontend')->name('events.frontend');
    
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});


Route::get('/registeruser', function () {
    return view('registeruser');
})->name('registeruser');

Route::get('/userdetails', function () {
    return view('userdetails');
});

Route::post('/registeruser', 'UserController@registeruser')->name('registeruser');
Route::post('/userdetails', 'UserController@userdetails')->name('userdetails');

