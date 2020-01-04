<?php

	
	Route::get('/', 						'HomeController@index');
	

	// News Game
	Route::get('/news', 					'NewsController@Index');
	Route::get('/news/{id}', 				'NewsController@SingleNews');
	Route::get('/getnews/{id}', 			'NewsController@GetNews');

	// GAMES
	Route::get('/dota', 					'GamesController@dota');
	Route::get('/mobile-legend', 			'GamesController@mobile_legend');
	Route::get('/pubg-mobile', 				'GamesController@pubg');

	// Matchs
	Route::get('/next-matchs', 				'MatchsController@matchs');

	// Komentar
	Route::post('/ambil-komen/{id}', 		'NewsController@GetKomen');
	Route::post('/tambah-komen/{id}', 		'NewsController@AddKomen'); 


	