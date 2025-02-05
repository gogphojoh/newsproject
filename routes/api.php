<?php 
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthorController;
    use App\Http\Controllers\CategoryController;
    use App\Http\Controllers\NewsController;
    use App\Http\Controllers\FeaturedNewController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\SuscriptionController;
    use App\Http\Controllers\NewsViewController;
    use App\Http\Controllers\CommentController;

    Route::prefix('authors')->group(function () {
        Route::get('/', [AuthorController::class, 'index']);
        Route::post('/store', [AuthorController::class, 'store']);
        Route::get('/show/{id}', [AuthorController::class, 'show']);
        Route::put('/update/{id}', [AuthorController::class, 'update']);
        Route::delete('/destroy/{id}', [AuthorController::class, 'destroy']);
    });

    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::post('/store', [CategoryController::class, 'store']);
        Route::get('/show/{id}', [CategoryController::class, 'show']);
        Route::put('/update/{id}', [CategoryController::class, 'update']);
        Route::delete('/destroy/{id}', [CategoryController::class, 'destroy']);
    });

    Route::prefix('news')->group(function () {
        Route::get('/', [NewsController::class, 'index']);
        Route::post('/store', [NewsController::class, 'store']);
        Route::get('/show/{id}', [NewsController::class, 'show']);
        Route::put('/update/{id}', [NewsController::class, 'update']);
        Route::delete('/destroy/{id}', [NewsController::class, 'destroy']);
    });

    Route::prefix('featured_news')->group(function () {
        Route::get('/', [FeaturedNewController::class, 'index']);
        Route::post('/store', [FeaturedNewController::class, 'store']);
        Route::get('/show/{id}', [FeaturedNewController::class, 'show']);
        Route::put('/update/{id}', [FeaturedNewController::class, 'update']);
        Route::delete('/destroy/{id}', [FeaturedNewController::class, 'destroy']);
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/store', [UserController::class, 'store']);
        Route::get('/show/{id}', [UserController::class, 'show']);
        Route::put('/update/{id}', [UserController::class, 'update']);
        Route::delete('/destroy/{id}', [UserController::class, 'destroy']);
    });


    Route::prefix('suscriptions')->group(function () {
        Route::get('/', [SuscriptionController::class, 'index']);
        Route::post('/store', [SuscriptionController::class, 'store']);
        Route::get('/show/{id}', [SuscriptionController::class, 'show']);
        Route::put('/update/{id}', [SuscriptionController::class, 'update']);
        Route::delete('/destroy/{id}', [SuscriptionController::class, 'destroy']);
    });

    Route::prefix('news_views')->group(function () {
        Route::get('/', [NewsViewController::class, 'index']);
        Route::post('/store', [NewsViewController::class, 'store']);
        Route::get('/show/{id}', [NewsViewController::class, 'show']);
        Route::put('/update/{id}', [NewsViewController::class, 'update']);
        Route::delete('/destroy/{id}', [NewsViewController::class, 'destroy']);
    });

    Route::prefix('comments')->group(function () {
        Route::get('/', [CommentController::class, 'index']);
        Route::post('/store', [CommentController::class, 'store']);
        Route::get('/show/{id}', [CommentController::class, 'show']);
        Route::put('/update/{id}', [CommentController::class, 'update']);
        Route::delete('/destroy/{id}', [CommentController::class, 'destroy']);
    });

?>