<?php


use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// use App\Livewire\Product; // Import class Livewire

// Route::get('/admin/product', ProductIndex::class)
//     ->name('admin.product')
//     ->middleware('auth');

Route::middleware(['auth'])->group(function () {
    // After the existing Breeze routes add the following routes:
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
});

// Outside the middleware group, add a route to display posts publicly:
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');


Route::view('/', 'welcome');

Route::get('dashboard', function () {
    // Mengambil semua post atau post yang diinginkan
    $posts = Post::where('is_published', true)->latest('published_at')->get();
    $date = '2024-09-02 08:29:10';
    $formattedDate = date('d F Y', strtotime($date));
    // return $posts;

    // Mengirimkan data posts ke view
    return view('dashboard', ['posts' => $posts]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

// use Illuminate\Support\Facades\Route;

// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider and all of them will
// | be assigned to the "web" middleware group. Make something great!
// |
// */
// Route::livewire('/admin/product', 'product.index')
//     ->name('admin.product')
//     ->middleware('auth');

// Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');

// require __DIR__.'/auth.php';
