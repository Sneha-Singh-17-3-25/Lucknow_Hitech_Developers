<?php

use App\Http\Controllers\auth\registerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\icons\Boxicons;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\landing_page\aboutController;
use App\Http\Controllers\landing_page\indexController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\RolesPermissionsController;
use App\Http\Controllers\tables\Basic as TablesBasic;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgentPanel\AddPropertiesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\User\MyPropertyController;
use App\Http\Controllers\user\PostPropertyController;
use App\Http\Controllers\user\PostPropertyDetailsController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Public Landing Page Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['web']], function () {
    // Main landing page
    Route::get('/', [indexController::class, 'landing_index'])->name('landing_index');
    ROute::get('login', function () {
        if (Auth::check()) {
            return redirect()->route('dashboard-analytics');
        }
        return redirect()->route('landing_index');
    })->name('login');
    // Landing page sections
    Route::get('landing/about', [aboutController::class, 'landing_about'])->name('landing_about');
    Route::get('landing/contact', [aboutController::class, 'landing_contact'])->name('landing_contact');
    Route::get('landing/agents', [aboutController::class, 'landing_agents'])->name('landing_agents');
    Route::get('landing/termsconditions', [aboutController::class, 'landing_termsconditions'])->name('landing_termsconditions');
    Route::get('landing/privacypolicy', [aboutController::class, 'landing_privacypolicy'])->name('landing_privacypolicy');
    Route::get('landing/postproperty', [PostPropertyController::class, 'postproperty'])->name('landing_postproperty');
});

/*
|--------------------------------------------------------------------------
| Guest Authentication Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['web', 'guest']], function () {
    // Authentication pages
    Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
    Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
    Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');

    // Auth routes
    // Route::get('/register', [registerController::class, 'register'])->name('register');
    // Route::get('/login', [registerController::class, 'login'])->name('login');

    // Landing auth routes
    // Route::get('landing/login', [registerController::class, 'landing_login'])->name('landing_login');
    Route::post('landing/login', [registerController::class, 'landing_login'])->name('landing_login');
    Route::post('landing/register', [registerController::class, 'landing_register'])->name('landing_register');
});

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['web', 'auth']], function () {
    // Dashboard
    Route::get('dashboard', [Analytics::class, 'index'])->name('dashboard-analytics');



    Route::get('landing/logout', [registerController::class, 'landing_logout'])->name('landing_logout');

    /*
    |--------------------------------------------------------------------------
    | Layout Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('layouts')->group(function () {
        Route::get('/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
        Route::get('/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
        Route::get('/fluid', [Fluid::class, 'index'])->name('layouts-fluid');
        Route::get('/container', [Container::class, 'index'])->name('layouts-container');
        Route::get('/blank', [Blank::class, 'index'])->name('layouts-blank');
    });

    /*
    |--------------------------------------------------------------------------
    | Page Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('pages')->group(function () {
        Route::get('/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
        Route::get('/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
        Route::get('/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
        Route::get('/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
        Route::get('/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');
    });

    /*
    |--------------------------------------------------------------------------
    | Property Management Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['middleware' => ['role:super-admin']], function () {
        Route::get('/properties', [PropertiesController::class, 'property_index'])->name('properties');
        Route::post('/properties', [PropertiesController::class, 'show_property'])->name('show_property');
        Route::get('/property-create', [PropertiesController::class, 'property_create'])->name('property-create');
        Route::get('/addProperties', [AddPropertiesController::class, 'addProperties'])->name('add-properties');
        // Route::post('/submit-residential-property', [PostPropertyController::class, 'storeResidentialProperty']);
        Route::post('/update-property-status/{id}', [PropertiesController::class, 'updatePropertyStatus']);
    });

    Route::post('/submit-residential-property', [PostPropertyController::class, 'storeResidentialProperty'])
        ->middleware('role:super-admin|seller|buyer');

    Route::get('/postpropertydetails', [PostPropertyDetailsController::class, 'postpropertydetails'])->name('post-propertydetails');
    
    Route::post('/submit-buyer-contact',[PostPropertyDetailsController::class, 'buyercontactinsert'])->name('buyercontactinsert');

    Route::get('buyer-contact',[ContactsController::class, 'buyercontact'])->name('buyercontact');

    Route::delete('/buyer-contacts/delete/{id}', [ContactsController::class, 'deleteBuyerContact'])->name('buyercontact.delete');
    Route::get('/my-property', [MyPropertyController::class, 'myproperty'])->name('my-property');

    Route::delete('/my-property', [MyPropertyController::class, 'destroy_myproperty'])->name('myproperty-destroy');
    Route::get('/search-properties', [indexController::class, 'searchproperties'])->name('search-properties');




    /*
    |--------------------------------------------------------------------------
    | User Management Routes (Admin Only)
    |--------------------------------------------------------------------------
    */
    Route::group(['middleware' => ['role:super-admin']], function () {
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::post('/users/update', [UserController::class, 'UsersEditUpdate'])->name('users_update');
        Route::delete('/users/delete/{id}', [UserController::class, 'delete_users'])->name('delete_users');
    });

    /*
    |--------------------------------------------------------------------------
    | Roles & Permissions Routes (Super super-admin Only)
    |--------------------------------------------------------------------------
    */
    Route::group(['middleware' => ['role:super-admin']], function () {
        // Roles
        Route::get('/roles', [RolesPermissionsController::class, 'roles_index'])->name('roles');
        Route::post('/roles/store', [RolesPermissionsController::class, 'roles_store'])->name('roles_store');
        Route::post('/roles/update', [RolesPermissionsController::class, 'rolesEditUpdate'])->name('roles_update');
        Route::delete('/roles/delete/{id}', [RolesPermissionsController::class, 'delete_roles'])->name('roles_delete');

        // Permissions
        Route::get('/permissions', [RolesPermissionsController::class, 'permissions_index'])->name('permissions');
        Route::post('/permissions/store', [RolesPermissionsController::class, 'permission_store'])->name('permissions_store');
        Route::post('/permissions/update', [RolesPermissionsController::class, 'permissionEditUpdate'])->name('permissionEditUpdate');
        Route::delete('/permissions/delete/{id}', [RolesPermissionsController::class, 'permissionDelete'])->name('permission_Delete');
    });
});

/*
|--------------------------------------------------------------------------
| API Routes (if needed for AJAX calls)
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'api'], function () {
    // Add any API routes here if needed
});

/*
|--------------------------------------------------------------------------
| Rate Limited Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['web', 'throttle:60,1']], function () {
    // Add routes that need rate limiting
});

/*
|--------------------------------------------------------------------------
| Development/Testing Routes (Remove in production)
|--------------------------------------------------------------------------
*/
if (app()->environment('local', 'testing')) {
    // Add development-only routes here
}

/*
|--------------------------------------------------------------------------
| Fallback Route
|--------------------------------------------------------------------------
*/
Route::fallback(function () {
    return view('errors.404');
});

    // Logout
    Route::any('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
