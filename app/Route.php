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
	Route::get('/galery', 					'AboutsController@gallery');
	Route::get('/videos-list', 				'AboutsController@videos');
	Route::get('/marchandise', 				'AboutsController@marchandise');

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

	// List Team
	Route::get('/team', 					'TeamController@list');
	Route::post('/create-team', 			'TeamController@createteam');
	Route::post('/join-team/{id_team}', 	'TeamController@join');
	Route::post('/accept-join/{id_req}',	'TeamController@accept');
	Route::post('/declined-join/{id_req}',	'TeamController@declined');
	Route::post('/list-users/{id}',			'TeamController@list_users');
	Route::post('/invite-join/{id_team}',	'TeamController@invite');

	// LOGIN
	Route::get('/login', 					'AuthController@IndexLogin');
	Route::get('/registrasi', 				'AuthController@IndexRegistrasi');
	Route::get('/logout', 					'AuthController@Logout');

	// Provinsi 
	Route::post('/provinsi', 				'AccountController@Provinsi');
	// Provinsi 
	Route::post('/kabupaten/{id}', 			'AccountController@Kabupaten');

	// register
	Route::post('/register', 				'AuthController@Register');
	Route::post('/login', 					'AuthController@Login');

	// account
	Route::post('/update-account/{id}', 	'AccountController@Update');
	// Komentar
	Route::post('/ambil-komen/{id}', 		'NewsController@GetKomen');
	Route::post('/tambah-komen/{id}', 		'NewsController@AddKomen'); 

	// 
	Route::post('/komen/{id}',				'NewsController@LoadMore');


	// Leaderboard
	Route::get('/leaderboard', 				'LeaderboardController@Leaderboard');
