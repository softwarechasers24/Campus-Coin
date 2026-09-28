<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Student Controllers
use App\Http\Controllers\Student\StudentTransactionController;
use App\Http\Controllers\Student\CategoryController;
use App\Http\Controllers\Student\ReportController;

// Other Controllers
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\AnnouncementController;


/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
})->name('home');



Route::get('/features', function () {
    return view('features');
})->name('features');

Route::get('/how-it-works', function () {
    return view('how-it-works');
})->name('how-it-works');

Route::get('/perks', function () {
    return view('perks');
})->name('perks');

Route::get('/leaderboard', function () {
    return view('leaderboard');
})->name('leaderboard');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', [
    AuthenticatedSessionController::class,
    'destroy'
])->middleware('auth')->name('logout');


/*
|--------------------------------------------------------------------------
| STUDENT ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | STUDENT DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [
        DashboardController::class,
        'index'
    ])->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | CHATBOT
    |--------------------------------------------------------------------------
    */

    Route::post('/chatbot/chat', [
        ChatbotController::class,
        'chat'
    ])->name('chatbot.chat');


    /*
    |--------------------------------------------------------------------------
    | STUDENT TRANSACTIONS
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard/transactions', [
        StudentTransactionController::class,
        'index'
    ])->name('dashboard.transactions');

    Route::post('/dashboard/transactions', [
        StudentTransactionController::class,
        'store'
    ])->name('dashboard.transactions.store');

    Route::get('/dashboard/transactions/{id}/edit', [
        StudentTransactionController::class,
        'edit'
    ])->name('dashboard.transactions.edit');

    Route::put('/dashboard/transactions/{id}', [
        StudentTransactionController::class,
        'update'
    ])->name('dashboard.transactions.update');

    Route::delete('/dashboard/transactions/{id}', [
        StudentTransactionController::class,
        'destroy'
    ])->name('dashboard.transactions.destroy');


    /*
    |--------------------------------------------------------------------------
    | STUDENT CATEGORIES
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard/category', [
        CategoryController::class,
        'index'
    ])->name('dashboard.category');

    Route::post('/dashboard/category', [
        CategoryController::class,
        'store'
    ])->name('dashboard.categories.store');

    Route::put('/dashboard/category/{id}', [
        CategoryController::class,
        'update'
    ])->name('dashboard.categories.update');

    Route::delete('/dashboard/category/{id}', [
        CategoryController::class,
        'destroy'
    ])->name('dashboard.categories.destroy');


    /*
    |--------------------------------------------------------------------------
    | STUDENT REPORTS
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard/reports', [
        ReportController::class,
        'index'
    ])->name('dashboard.reports');


    /*
    |--------------------------------------------------------------------------
    | STUDENT BUDGETS
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard/budgets', [
        BudgetController::class,
        'index'
    ])->name('dashboard.budgets');

    Route::post('/dashboard/budgets', [
        BudgetController::class,
        'store'
    ])->name('dashboard.budgets.store');

    Route::put('/dashboard/budgets/{id}', [
        BudgetController::class,
        'update'
    ])->name('dashboard.budgets.update');

    Route::delete('/dashboard/budgets/{id}', [
        BudgetController::class,
        'destroy'
    ])->name('dashboard.budgets.destroy');


    /*
    |--------------------------------------------------------------------------
    | STUDENT ANNOUNCEMENTS
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard/announcements', function () {

        $announcements = \App\Models\Announcement::latest()->get();

        return view(
            'StudentDashboard.announcements',
            compact('announcements')
        );

    })->name('dashboard.announcements');


    /*
    |--------------------------------------------------------------------------
    | STUDENT PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard/profile', function () {
        return view('StudentDashboard.profile');
    })->name('dashboard.profile');


    /*
    |--------------------------------------------------------------------------
    | STUDENT INSIGHTS
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard/insights', function () {
        return view('StudentDashboard.insights');
    })->name('dashboard.insights');


    /*
    |--------------------------------------------------------------------------
    | STUDENT CALENDAR
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard/calendar', function () {
        return view('StudentDashboard.calendar');
    })->name('dashboard.calendar');


    /*
    |--------------------------------------------------------------------------
    | STUDENT SAVING TIPS
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard/saving-tips', function () {
        return view('studentdashboard.saving-tips');
    })->name('dashboard.saving-tips');

});


/*
|--------------------------------------------------------------------------
| PROFILE ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [
        ProfileController::class,
        'edit'
    ])->name('profile.edit');

    Route::patch('/profile', [
        ProfileController::class,
        'update'
    ])->name('profile.update');

    Route::delete('/profile', [
        ProfileController::class,
        'destroy'
    ])->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {


        /*
        |--------------------------------------------------------------------------
        | ADMIN DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [
            AdminController::class,
            'dashboard'
        ])->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | ADMIN USERS
        |--------------------------------------------------------------------------
        */

        Route::get('/users', [
            AdminController::class,
            'users'
        ])->name('users');

        Route::delete('/users/{id}', [
            AdminController::class,
            'deleteUser'
        ])->name('users.delete');


        /*
        |--------------------------------------------------------------------------
        | ADMIN CATEGORIES
        |--------------------------------------------------------------------------
        */

        Route::get('/categories', [
            AdminController::class,
            'categories'
        ])->name('categories');

        Route::get('/categories/create', [
            AdminController::class,
            'createCategory'
        ])->name('categories.create');

        Route::post('/categories', [
            AdminController::class,
            'storeCategory'
        ])->name('categories.store');

        Route::get('/categories/{id}/edit', [
            AdminController::class,
            'editCategory'
        ])->name('categories.edit');

        Route::put('/categories/{id}', [
            AdminController::class,
            'updateCategory'
        ])->name('categories.update');

        Route::delete('/categories/{id}', [
            AdminController::class,
            'deleteCategory'
        ])->name('categories.delete');


        /*
        |--------------------------------------------------------------------------
        | ADMIN TRANSACTIONS
        |--------------------------------------------------------------------------
        */

        Route::get('/transactions', [
            AdminController::class,
            'Transactions'
        ])->name('transactions');

        Route::get('/transactions/create', [
            AdminController::class,
            'create'
        ])->name('transactions.create');

     Route::post('/transactions', [
    AdminController::class,
    'StoreTransaction'
])->name('transactions.store.post');

        Route::get('/transactions/{id}/edit', [
            AdminController::class,
            'edit'
        ])->name('transactions.edit');

        Route::put('/transactions/{id}', [
            AdminController::class,
            'UpdateTransaction'
        ])->name('transactions.update');

        Route::delete('/transactions/{id}', [
            AdminController::class,
            'DeleteTransaction'
        ])->name('transactions.delete');

        Route::delete('/transactions/{id}/destroy', [
            AdminController::class,
            'DeleteTransaction'
        ])->name('transactions.destroy');


        /*
        |--------------------------------------------------------------------------
        | ADMIN INSIGHTS
        |--------------------------------------------------------------------------
        */

        Route::view(
            '/insights',
            'admin.insights'
        )->name('insights');


        /*
        |--------------------------------------------------------------------------
        | ADMIN REPORTS
        |--------------------------------------------------------------------------
        */

        Route::view(
            '/reports',
            'admin.reports'
        )->name('reports');


        /*
        |--------------------------------------------------------------------------
        | ADMIN BUDGET
        |--------------------------------------------------------------------------
        */

        Route::get('/budget', [
            AdminController::class,
            'budget'
        ])->name('budget');

        Route::post('/budget', [
            AdminController::class,
            'storeBudget'
        ])->name('budget.store');

        Route::get('/budget/{id}/edit', [
            AdminController::class,
            'editBudget'
        ])->name('budget.edit');

        Route::put('/budget/{id}', [
            AdminController::class,
            'updateBudget'
        ])->name('budget.update');

        Route::delete('/budget/{id}', [
            AdminController::class,
            'deleteBudget'
        ])->name('budget.delete');


        /*
        |--------------------------------------------------------------------------
        | ADMIN ANNOUNCEMENTS
        |--------------------------------------------------------------------------
        */

        Route::get('/announcements', [
            AnnouncementController::class,
            'index'
        ])->name('announcements');

        Route::post('/announcements', [
            AnnouncementController::class,
            'store'
        ])->name('announcements.store');

        Route::get('/announcements/{announcement}/edit', [
            AnnouncementController::class,
            'edit'
        ])->name('announcements.edit');

        Route::put('/announcements/{announcement}', [
            AnnouncementController::class,
            'update'
        ])->name('announcements.update');

        Route::delete('/announcements/{announcement}', [
            AnnouncementController::class,
            'destroy'
        ])->name('announcements.delete');


        /*
        |--------------------------------------------------------------------------
        | ADMIN SETTINGS
        |--------------------------------------------------------------------------
        */

        Route::view(
            '/settings',
            'admin.settings'
        )->name('settings');

    });


/*
|--------------------------------------------------------------------------
| AUTHENTICATION ROUTES
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';