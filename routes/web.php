<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\HeroSlideController;
use App\Http\Controllers\Admin\HeroFeatureController;
use App\Http\Controllers\Admin\CompanyStatController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceFeatureController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\NewsletterSubscriberController;
use App\Http\Controllers\Admin\WebsiteSettingController;
use App\Http\Controllers\Admin\QuotationController;




Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', function () {return view('auth.login');})->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.submit');
Route::get('/register', [RegisterController::class, 'show'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/dashboard', function () {return view('dashboard');})->middleware('auth')->name('dashboard');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');





Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('menus', MenuController::class);
    Route::resource('hero-slides', HeroSlideController::class);
    Route::resource('hero-features', HeroFeatureController::class);
    Route::resource('company-stats', CompanyStatController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('team-members', TeamMemberController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('product-categories', ProductCategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('service-features', ServiceFeatureController::class);
    Route::resource('careers', CareerController::class);

    Route::resource('contact-messages', ContactMessageController::class)->only(['index', 'show', 'destroy']);
    Route::patch('contact-messages/{contactMessage}/read', [ContactMessageController::class, 'markAsRead'])->name('contact-messages.read');
    Route::patch('contact-messages/{contactMessage}/unread', [ContactMessageController::class, 'markAsUnread'])->name('contact-messages.unread');

    Route::resource('newsletter-subscribers', NewsletterSubscriberController::class)->only(['index','show','destroy']);
    Route::patch('newsletter-subscribers/{newsletterSubscriber}/activate', [NewsletterSubscriberController::class,'activate'])->name('newsletter-subscribers.activate');
    Route::patch('newsletter-subscribers/{newsletterSubscriber}/deactivate', [NewsletterSubscriberController::class,'deactivate'])->name('newsletter-subscribers.deactivate');

    Route::get('website-settings', [WebsiteSettingController::class, 'edit'])->name('website-settings.edit');
    Route::put('website-settings', [WebsiteSettingController::class, 'update'])->name('website-settings.update');

    Route::get('/quotations', [QuotationController::class, 'index'])->name('quotations.index');
    Route::get('/quotations/{id}', [QuotationController::class, 'show'])->name('quotations.show');
    Route::delete('/quotations/{id}', [QuotationController::class, 'destroy'])->name('quotations.destroy');

    Route::get('/quotations/{id}/send-mail', [QuotationController::class, 'sendMailForm'])->name('quotations.send-mail.form');
    Route::post('/quotations/{id}/send-mail', [QuotationController::class, 'sendMail'])->name('quotations.send-mail');
    Route::get('/quotation-estimates/{id}/pdf', [QuotationController::class, 'estimatePdf'])->name('quotations.estimate.pdf');


});
