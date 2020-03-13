<?php

	
	Route::get('/', 						'HomeController@index');

	// News Game
	Route::get('/news', 					'NewsController@Index');
	Route::get('/news/{id}', 				'NewsController@SingleNews');
	Route::get('/news-page/{id}', 			'NewsController@Pagination');
	Route::get('/getnews/{id}', 			'NewsController@GetNews');

	// GAMES
	Route::get('/game/{url}', 				'GamesController@select'); 
	Route::post('/add-game/{id_game}',		'GamesController@addGame');

	// Games // Tournament
	Route::get('/tournament', 				'TournamentController@tournament');
	Route::get('/tournament/{id}', 			'TournamentController@matchs');

	// Bracket
	Route::get('/bracket/{id}', 			'BracketController@Bracket');


	// Matchs
	Route::get('/next-matchs', 				'MatchsController@matchs');

	// About - Me
	Route::get('/contact', 					'AboutsController@contact');
	Route::get('/faqs', 					'AboutsController@faqs');
	Route::get('/sponsors', 				'AboutsController@sponsors');
	Route::get('/gallery', 					'AboutsController@gallery');
	Route::get('/videos', 					'AboutsController@videos');
	Route::get('/marchandise', 				'AboutsController@marchandise');

	Route::get('/watch/{url}',				'VideosController@watch');
	Route::post('/like-video/{id}',			'VideosController@like');
	Route::post('/dislike-video/{id}',		'VideosController@dislike');
	Route::post('/get-comment-video/{id}',	'VideosController@GetComment');
	Route::post('/add-comment-video/{id}',	'VideosController@AddComment');
	Route::post('/LoadMore/{id}',			'VideosController@LoadMore');

	Route::post('/like-gallery/{id}', 		'AboutsController@likeGallery');

	// Shopping
	Route::get('/shop', 					'ShopController@Shopping');
	
	// wishlist
	Route::get('/wishlist', 				'WishlistController@Wishlist');

	// Cart
	Route::get('/cart', 					'CartController@cart');

	// checkout
	Route::get('/checkout', 				'CheckoutController@Checkout');
	
	// Account
	Route::get('/account', 					'AccountController@account');
	Route::get('/my-game', 					'AccountController@my_game');
	Route::get('/my-team', 					'AccountController@my_team');
	Route::post('/update-identity/{id_game}',	'GamesController@update_identity');
	Route::post('/change-password', 		'AccountController@change_password');

	// List Team
	Route::get('/team', 					'TeamController@list');
	Route::get('/team/{page}/{page_no}',	'TeamController@page');
	Route::post('/create-team', 			'TeamController@createteam');
	Route::post('/join-team/{id_team}', 	'TeamController@join');
	Route::post('/accept-join/{id_req}',	'TeamController@accept');
	Route::post('/declined-join/{id_req}',	'TeamController@declined');
	Route::post('/list-users/{id}',			'TeamController@list_users');
	Route::post('/invite-join/{id_team}',	'TeamController@invite');
	Route::post('/accept-invited/{id}',		'TeamController@acceptInvited');
	Route::post('/declined-invited/{id}',	'TeamController@declinedInvited');

	// LOGIN
	Route::get('/login', 					'AuthController@IndexLogin');
	Route::get('/register', 				'AuthController@IndexRegistrasi');
	Route::get('/logout', 					'AuthController@Logout');
	Route::get('/verify/{email}/{hash}',	'AuthController@Verify');

	// Provinsi 
	Route::post('/provinsi', 				'AccountController@Provinsi');
	// Provinsi 
	Route::post('/kabupaten/{id}', 			'AccountController@Kabupaten');

	// register
	Route::post('/register', 				'AuthController@Register');
	Route::post('/login', 					'AuthController@Login');

	// account
	Route::post('/update-account', 	'AccountController@Update');
	// Komentar
	Route::post('/ambil-komen/{url}', 		'NewsController@GetKomen');
	Route::post('/tambah-komen/{id}', 		'NewsController@AddKomen'); 
	Route::post('/add-like/{id_news}', 		'NewsController@like');

	Route::post('/LoadComment/{id}', 		'NewsController@LoadComment');

	// 
	Route::post('/komen/{id}',				'NewsController@LoadMore');


	// Leaderboard
	Route::get('/leaderboard', 				'LeaderboardController@Leaderboard');
