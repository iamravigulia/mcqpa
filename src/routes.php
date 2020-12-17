<?php
use Illuminate\Support\Facades\Route;

// Route::get('greeting', function () {
//     return 'Hi, this is your awesome package! Mcqp';
// });

// Route::get('picmatch/test', 'EdgeWizz\Picmatch\Controllers\PicmatchController@test')->name('test');

Route::post('fmt/mcqpa/store', 'EdgeWizz\Mcqpa\Controllers\McqpaController@store')->name('fmt.mcqpa.store');

Route::post('fmt/mcqpa/update/{id}', 'EdgeWizz\Mcqpa\Controllers\McqpaController@update')->name('fmt.mcqpa.update');

Route::post('fmt/mcqpa/csv', 'EdgeWizz\Mcqpa\Controllers\McqpaController@csv')->name('fmt.mcqpa.csv');

Route::any('fmt/mcqpa/delete/{id}', 'EdgeWizz\Mcqpa\Controllers\McqpaController@delete')->name('fmt.mcqpa.delete');