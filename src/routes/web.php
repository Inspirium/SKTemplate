<?php

Route::group(['middleware' => 'web'], function() {
    Route::get('template', function() {
        return view('sktemplate::template_overview');
    });
});
