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
use App\Http\Controllers\PostPropertyController;
use Illuminate\Support\Facades\Auth;

// Main Page Route
Route::get('/', [indexController::class, 'landing_index'])->name('landing_index');
Route::get('dashboard', [Analytics::class, 'index'])->name('dashboard-analytics');

// layout
Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');
Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');

// pages
Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');

// authentication
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');

// cards
Route::get('/cards/basic', [CardBasic::class, 'index'])->name('cards-basic');

// User Interface
Route::get('/ui/accordion', [Accordion::class, 'index'])->name('ui-accordion');
Route::get('/ui/alerts', [Alerts::class, 'index'])->name('ui-alerts');
Route::get('/ui/badges', [Badges::class, 'index'])->name('ui-badges');
Route::get('/ui/buttons', [Buttons::class, 'index'])->name('ui-buttons');
Route::get('/ui/carousel', [Carousel::class, 'index'])->name('ui-carousel');
Route::get('/ui/collapse', [Collapse::class, 'index'])->name('ui-collapse');
Route::get('/ui/dropdowns', [Dropdowns::class, 'index'])->name('ui-dropdowns');
Route::get('/ui/footer', [Footer::class, 'index'])->name('ui-footer');
Route::get('/ui/list-groups', [ListGroups::class, 'index'])->name('ui-list-groups');
Route::get('/ui/modals', [Modals::class, 'index'])->name('ui-modals');
Route::get('/ui/navbar', [Navbar::class, 'index'])->name('ui-navbar');
Route::get('/ui/offcanvas', [Offcanvas::class, 'index'])->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', [PaginationBreadcrumbs::class, 'index'])->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', [Progress::class, 'index'])->name('ui-progress');
Route::get('/ui/spinners', [Spinners::class, 'index'])->name('ui-spinners');
Route::get('/ui/tabs-pills', [TabsPills::class, 'index'])->name('ui-tabs-pills');
Route::get('/ui/toasts', [Toasts::class, 'index'])->name('ui-toasts');
Route::get('/ui/tooltips-popovers', [TooltipsPopovers::class, 'index'])->name('ui-tooltips-popovers');
Route::get('/ui/typography', [Typography::class, 'index'])->name('ui-typography');

// extended ui
Route::get('/extended/ui-perfect-scrollbar', [PerfectScrollbar::class, 'index'])->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', [TextDivider::class, 'index'])->name('extended-ui-text-divider');

// icons
Route::get('/icons/boxicons', [Boxicons::class, 'index'])->name('icons-boxicons');

// form elements
Route::get('/forms/basic-inputs', [BasicInput::class, 'index'])->name('forms-basic-inputs');
Route::get('/forms/input-groups', [InputGroups::class, 'index'])->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', [VerticalForm::class, 'index'])->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', [HorizontalForm::class, 'index'])->name('form-layouts-horizontal');

// tables
Route::get('/tables/basic', [TablesBasic::class, 'index'])->name('tables-basic');

// auth routes start
Route::get('/register', [registerController::class, 'register'])->name('register');
Route::get('/login', [registerController::class, 'login'])->name('login');

//users
Route::get('/users', [UserController::class, 'index'])->name('users');

// properties
Route::get('/properties', [PropertiesController::class, 'property_index'])->name('properties');
Route::get('/property-create', [PropertiesController::class, 'property_create'])->name('property-create');

// add properties
Route::get('/addProperties', [AddPropertiesController::class, 'addProperties'])->name('add-properties');


// RolesPermissions
Route::get('/roles', [RolesPermissionsController::class, 'roles_index'])->name('roles');
Route::post('/roles/store', [RolesPermissionsController::class, 'roles_store'])->name('roles_store');
Route::post('/roles/update', [RolesPermissionsController::class, 'rolesEditUpdate'])->name('roles_update');
Route::delete('/roles/delete/{id}', [RolesPermissionsController::class, 'delete_roles'])->name('roles_delete');



Route::get('/permissions', [RolesPermissionsController::class, 'permissions_index'])->name('permissions');
Route::post('/permissions/store', [RolesPermissionsController::class, 'permission_store'])->name('permissions_store');

Route::post('/permissions/update', [RolesPermissionsController::class, 'permissionEditUpdate'])->name('permissionEditUpdate');
Route::delete('/permissions/delete/{id}', [RolesPermissionsController::class, 'permissionDelete'])->name('permission_Delete');

Route::post('/users/update', [UserController::class, 'UsersEditUpdate'])->name('users_update');
Route::delete('/users/delete/{id}', [UserController::class, 'delete_users'])->name('delete_users');


// landing_page routes start

Route::get('landing/about', [aboutController::class, 'landing_about'])->name('landing_about');
Route::get('landing/contact', [aboutController::class, 'landing_contact'])->name('landing_contact');
Route::get('landing/agents', [aboutController::class, 'landing_agents'])->name('landing_agents');
Route::get('landing/termsconditions', [aboutController::class, 'landing_termsconditions'])->name('landing_termsconditions');
Route::get('landing/privacypolicy', [aboutController::class, 'landing_privacypolicy'])->name('landing_privacypolicy');
Route::get('landing/postproperty', [PostPropertyController::class, 'postproperty'])->name('landing_postproperty');


Route::post('landing/register', [registerController::class, 'landing_register'])->name('landing_register');
Route::post('landing/login', [registerController::class, 'landing_login'])->name('landing_login');
Route::get('landing/logout', [registerController::class, 'landing_logout'])->name('landing_logout');



Route::any('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
