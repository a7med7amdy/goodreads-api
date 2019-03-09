<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
// User section
Route::post('signUp', "UserController@signUp");
Route::post('logIn', "UserController@logIn");
Route::post('changePassword', "UserController@changePassword");
Route::post('changeName', "UserController@changeName");
Route::post('changeImage', "UserController@changeImage");
Route::post('delete', "UserController@delete");
Route::get('showProfile','UserController@showProfile');

Route::get('showSetting', "UserController@showSetting");
Route::get('logOut', "UserController@logOut");
Route::get('changeBirthday', "UserController@changeBirthday");
Route::get('whoCanSeeMyBirthday', "UserController@whoCanSeeMyBirthday");
Route::get('changeCountry', "UserController@changeCountry");
Route::get('whoCanSeeMyCountry', "UserController@whoCanSeeMyCountry");
Route::get('changeCity', "UserController@changeCity");
Route::get('whoCanSeeMyCity', "UserController@whoCanSeeMyCity");


// Book Section
Route::get('books','BookController@index');
Route::get( 'books/show/{book_id}', 'BookController@show');
Route::get( 'books/genre/{genre_name}', 'BookController@showByGenre');
Route::get('Books/book_title','BookController@getBookByTitle');
Route::get('Books/book_ISBN','BookController@getBookByIsbn');
Route::get('Books/book_Authorname','BookController@getBookByAuthorName');

// Review Section
Route::get('reviwes','ReviewController@index');
Route::post('reviwes/create','ReviewController@create');
Route::get( 'reviwes/show/{id}','ReviewController@show');
Route::put('reviwes/edit', 'ReviewController@edit');
Route::delete('reviwes/{id}', 'ReviewController@destroy');
//Route::get('reviwes/recent', 'ReviewController@recentReviews');
Route::get( 'reviwes/users/{user_id}/books/{book_id}', 'ReviewController@userReview');
Route::get( 'reviwes/books/{bood_id}', 'ReviewController@bookReview');

//Rate Section
Route::post('rate','ReviewController@rate');
Route::put('rate','ReviewController@editRate');
Route::delete('rate','ReviewController@deleteRate');

// Shelf Section
Route::get('shlef/list', 'ShelfController@index');
Route::get('shelf/{shelf_name}', 'ShelfController@show');
Route::post('shelf/add_book', 'ShelfController@addBook');
Route::get('shelf/{user_id}','ShelfController@userShelves');
Route::delete('shelf/{shelf_name}/remove_book/{book_id}', 'ShelfController@removeBook');
Route::get('shelf/{get_books}','ShelfController@getBooksOnShelf');

//Owned Books
//Route::get( 'owned_books', 'OwnedBookController@index');
//Route::post( 'owned_books/{book_id}', 'OwnedBookController@create');
//Route::get('owned_books/list/{user_id}', 'OwnedBookController@list');
//Route::delete( 'owned_books/{book_id}', 'OwnedBookController@destroy');

//Auther section
Route::get('authorname','AuthorController@getAuthorByName');
Route::get('authorid','AuthorController@searchAuthor');




//follow section
Route::post('followuser','followcontroller@followUser');
Route::delete('unfollowuser','followcontroller@unfollowUser');
Route::get('followers','followcontroller@userFollowers');
Route::get('following','followcontroller@userFollowing');
//User section
Route::get('UserController', 'UserController@index');
Route::get('UserController/{user}','UserController@getUser');

//activities section
Route::get('updates','ActivitiesController@followingUpdates');
Route::get('notifications','ActivitiesController@notifications');
Route::post('makeComment','ActivitiesController@makeComment');
Route::get('listComments','ActivitiesController@listComments');
Route::post('makeLike','ActivitiesController@makeLike');
Route::get('listLikes','ActivitiesController@listLikes');
Route::delete('unlike','ActivitiesController@unlike');
Route::delete('deleteComment','ActivitiesController@deleteComment');