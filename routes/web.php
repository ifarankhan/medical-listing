<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BarChartWidgetController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactProviderController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CustomerBarChartController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GetInTouchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Listing\DetailsController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;

use App\Http\Controllers\StateController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\ZipcodeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');
Route::get('/contact', [ContactUsController::class, 'index'])->name('contact');
Route::post('/contact/submit', [ContactUsController::class, 'submit'])->name('contact.submit');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/listing/{slug}', [DetailsController::class, 'index'])->name('listing.details');

Route::get('/check-auth', [AuthController::class, 'checkAuth'])->name('check-auth');

Route::post('/webhook/stripe', [WebhookController::class, 'handleWebhook']);

Route::get('/zipcodes', ZipCodeController::class);
Route::get('/city', CityController::class);
Route::get('/state', StateController::class);

Route::post('/get-in-touch', [GetInTouchController::class, 'sendEmail'])->name('get-in-touch');


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'registerPost'])->name('register');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => ['role:customer,insurance_provider']], function () {
    Route::get('/account', [DashboardController::class, 'index'])->name('account');

    Route::delete('/logout', [LogoutController::class, 'logout'])->name('logout');

    Route::get('/dashboard/message', [MessageController::class, 'index'])->name('message');
    // Route to handle the file upload via AJAX
    Route::post('/profile/upload', [ProfileController::class, 'upload'])->name('profile.upload');
});

Route::group(['middleware' => ['role:insurance_provider']], function () {
    Route::post('/validate-listing', [ListingController::class, 'validateListing'])->name('validate.listing');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/listing', [ListingController::class, 'index'])->name('listing.index');
    Route::get('/dashboard/listing/create', [ListingController::class, 'create'])->name('listing.create');
    Route::post('/dashboard/listing/store', [ListingController::class, 'store'])->name('listing.store');
    Route::get('/dashboard/listing/{listing}/subscription', [ListingController::class, 'subscription'])
         ->middleware('disable.route')
         ->name('listing.step.subscription');
    Route::get('/dashboard/listing/{listing}/edit', [ListingController::class, 'edit'])->name('listing.edit');
    Route::get('/dashboard/listing/{listing}/delete', [ListingController::class, 'delete'])
         ->name('listing.delete');

    Route::get('/subscription', [SubscriptionController::class, 'showSubscriptionForm'])
         ->middleware('disable.route')
         ->name('subscription.form');
    Route::post('/create-subscription', [SubscriptionController::class, 'createSubscription'])
         ->middleware('disable.route')
         ->name('subscription.create');

    Route::get('/callback-subscription', [SubscriptionController::class, 'processCallback'])
         ->middleware('disable.route')
         ->name('subscription.callback');

    //Route::post('/subscription/process', [SubscriptionController::class, 'processPayment'])->name('subscription.process');

    Route::post('/subscription/session-status', [
        SubscriptionController::class,
        'sessionStatus'
    ])->middleware('disable.route')
         ->name('subscription.session.status');

    Route::delete('/delete-product/{id}', [
        ListingController::class,
        'deleteProductService'
    ])->name('product.destroy');

    Route::get('/leads-per-month', [BarChartWidgetController::class, 'index']);

    Route::get('/dashboard/reviews', [
        App\Http\Controllers\Dashboard\Review\IndexController::class,
        'execute'
    ])->name('dashboard.reviews.index');

    Route::post('/request/review', [
        ReviewController::class,
        'requestReview'
    ])->name('request.review');
});

Route::group(['middleware' => ['role:customer']], function () {
    Route::post('/send-message', [MessageController::class, 'send'])->name('send-message');
    Route::post('/contact-multiple-providers', [ContactProviderController::class, 'contactMultiple'])
         ->name('contact.multiple.providers');
    Route::get('/review-request', [ContactProviderController::class, 'reviewRequest'])
         ->name('review.request');

    Route::get('/my-dash', [CustomerDashboardController::class, 'index'])
         ->name('my-dash');

    Route::get('/customer-queries-per-month', [CustomerBarChartController::class, 'index']);

    Route::post('/reviews/store', [
        ReviewController::class,
        'store'
    ])->name('reviews.store');
});

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::view('/privacy-policy', 'static.privacy-policy')->name('privacy.policy');
Route::view('/terms-of-use', 'static.terms-of-use')->name('terms.of.use');
Route::view('/safe-space-policy', 'static.safe-space-policy')->name('safe.space.policy');
/*use Illuminate\Support\Facades\Mail;

Route::get('/test-email', function () {
    try {
        Mail::raw('This is a test email from Mailgun!', function ($message) {
            $message->to('raoraafe@gmail.com')
                    ->subject('Mailgun Test Email');
        });
        return 'Test email sent!';
    } catch (\Exception $e) {
        return 'Failed to send email. Error: ' . $e->getMessage();
    }
});*/

/*Route::get('/email-preview', function () {
    $data = [
        'title' => 'Test Email',
        'header' => 'Welcome to Our Service',
        'name' => 'test',
        'email' => 'test',
        'messageBody' => 'test'
        // Add any other necessary data here
    ];

    return view('emails.contact_to_user', $data);
});*/
