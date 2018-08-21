<?php

Route::group(['prefix' => config('adminamazing.path').'/representatives', 'middleware' => ['web','CheckAccess']], function() {
	Route::get('/', 'Selfreliance\Representatives\RepresentativesAdminController@index')->name('RepresentativesAdmin');
	Route::get('/{id}', 'Selfreliance\Representatives\RepresentativesAdminController@confirm')->name('RepresentativesAdminConfirm');
});
