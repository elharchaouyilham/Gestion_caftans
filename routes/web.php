<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages.home');
});
Route::get('/admin/catalog', function () {
    return view('admin.catalog.index');
});
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.index');
});
Route::get('/admin', function () {
    return view('admin.dashboard.index');
});
Route::get('/admin/cliente', function () {
    return view('admin.cliente.index');
});
Route::get('/admin/reservations', function () {
    return view('admin.reservations.index');
});
Route::get('/caftans', function () {
    return view('pages.caftans');
});
Route::get('/accessoires', function () {
    return view('pages.accessoires');
});
Route::get('/forfaits', function () {
    return view('pages.forfaits');
});
Route::get('/reservation', function () {
    return view('pages.reservation');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/admin/catalog', function () {
    return view('admin.catalog.index');
});
