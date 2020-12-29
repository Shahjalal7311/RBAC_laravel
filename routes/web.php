<?php
Route::get('/', 'FrontendController@index');

//admin panel start here
Auth::routes();
Route::prefix('admin')->group(function() {
    Route::middleware('auth:admin')->group(function() {
        Route::group(['middleware' => 'menuPermission'], function() {
            Route::get('/', 'HomeController@index')->name('admin.index');
            //Start Menu Section
            Route::resource('menu', 'Admin\MenuController');
            Route::get('/menu-add', 'Admin\MenuController@addmenu')->name('menuadd.page');
            Route::post('/menu-save', 'Admin\MenuController@savemenu')->name('menu.save');
            Route::get('/menu/status/{id}', 'Admin\MenuController@changeStatus')->name('menu.changeStatus');
            Route::get('/menu-edit/{id}', 'Admin\MenuController@editmenu')->name('menu.edit');
            Route::post('/menu-update', 'Admin\MenuController@updatemenu')->name('menu.update');
            Route::get('/menu-delete/{id}', 'Admin\MenuController@deleteMenu')->name('menu.delete');
            Route::get('/admin-logo', 'Admin\SettingsController@adminLogo')->name('admin.logo');
            Route::post('/adminLogo-update', 'Admin\SettingsController@updatadminLogo')->name('adminLogo.update');

            //User Menu 
            Route::get('/user-menu', 'Admin\UserMenuController@index')->name('usermenu.index');
            Route::get('/user-menu/add', 'Admin\UserMenuController@add')->name('usermenu.add');
            Route::post('/user-menu/save', 'Admin\UserMenuController@save')->name('usermenu.save');
            Route::get('/user-menu/edit/{id}', 'Admin\UserMenuController@edit')->name('usermenu.edit');
            Route::post('/user-menu/update', 'Admin\UserMenuController@update')->name('usermenu.update');
            Route::get('/user-menu/status', 'Admin\UserMenuController@status')->name('usermenu.status');
            Route::post('/usermenu-delete', 'Admin\UserMenuController@destroy')->name('usermenu-delete');

            //End User Menu
            //User Menu link action
            Route::get('/user-menu-link/{id}', 'Admin\UserMenuController@usermenuLink')->name('usermenuLink.index');
            Route::get('/user-menu-link-add/{menuId}', 'Admin\UserMenuController@usermenuLinkAdd')->name('userMenu.ActionLinkAdd');
            Route::post('/user-menu-link-save/{parentMenuId}', 'Admin\UserMenuController@usermenuLinkSave')->name('userMenu.ActionLinkSave');
            Route::get('/user-menu-link-edit/{menuId}/{id}', 'Admin\UserMenuController@usermenuLinkEdit')->name('userMenu.ActionLinkEdit');
            Route::post('/user-menu-link-update/{parentMenuId}', 'Admin\UserMenuController@usermenuLinkUpdate')->name('userMenu.ActionLinkUpdate');
            Route::get('/user-menu-action/status', 'Admin\UserMenuController@actionStatus')->name('usermenuAction.status');
            Route::post('/user-menu-action/delete', 'Admin\UserMenuController@actionDestroy')->name('usermenuAction.delete');

            //User Manage

            Route::resource('users', 'Admin\AdminController');
            Route::get('/user-add', 'Admin\AdminController@adduser')->name('useradd.page');
            Route::post('/user-save', 'Admin\AdminController@saveuser')->name('user.save');
            Route::get('/user/status/{id}', 'Admin\AdminController@changeuserStatus')->name('user.changeuserStatus');
            Route::get('/user-edit/{id}', 'Admin\AdminController@edituser')->name('user.edit');
            Route::post('/user-upate', 'Admin\AdminController@updateuser')->name('user.update');
            Route::get('/user-password/{id}', 'Admin\AdminController@password')->name('user.password');
            Route::get('/user-profile/{id}', 'Admin\AdminController@userProfile')->name('user.profile');
            Route::post('/user-changePassword', 'Admin\AdminController@passwordChange')->name('user.changePassword');
            //User Roll Manage
            Route::resource('user-roles', 'Admin\UserRoleController');
            Route::get('/user-role-add', 'Admin\UserRoleController@adduserRole')->name('userRoleAdd.page');
            Route::post('/user-role-save', 'Admin\UserRoleController@saveuserRole')->name('userRole.save');
            Route::get('/userRole/status/{id}', 'Admin\UserRoleController@changeuserRoleStatus')->name('userRole.changeuserRoleStatus');
            Route::get('/user-role-edit/{id}', 'Admin\UserRoleController@edituserRole')->name('userRole.edit');
            Route::post('/user-role-upate', 'Admin\UserRoleController@updateuserRole')->name('userRole.update');
            Route::get('/user-role-permission/{id}', 'Admin\UserRoleController@permission')->name('userRole.permission');
            Route::post('/user-role-permission-update', 'Admin\UserRoleController@permissionUpdate')->name('userRole.permissionUpdate');
        });
        Route::resource('slider', 'Admin\SliderController');
    });

    //Admin Login Url
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login');
    Route::post('/logout', 'Auth\AdminLoginController@adminLogout')->name('admin.logout');

    // Password Reset Routes...
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@passwordForget')->name('admin.password.forget');
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@passwordEmail')->name('admin.password.email');
    Route::get('/new-password/{email}', 'Auth\AdminForgotPasswordController@newPassword')->name('admin.password.newPassword');
    Route::post('/password/save', 'Auth\AdminForgotPasswordController@changePasswordSave')->name('admin.password.save');
});

//Admin part end
Route::get('/clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('clear-compiled');

    return "Cleared!";
});
