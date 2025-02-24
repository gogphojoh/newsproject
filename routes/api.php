<?php 
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\{AuthorController, CategoryController, NewsController, FeaturedNewController, UserController, SuscriptionController, NewsViewController, CommentController};

    Route::resource('authors', AuthorController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('news', NewsController::class);
    Route::resource('featured_news', FeaturedNewController::class);
    Route::resource('users', UserController::class);
    Route::resource('suscriptions', SuscriptionController::class);
    Route::resource('news_views', NewsViewController::class);
    Route::resource('comments', CommentController::class);

?>