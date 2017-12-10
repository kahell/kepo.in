<?php

Route::middleware('auth:customers')->get('/customers', function (Request $request) {
    return $request;
});
