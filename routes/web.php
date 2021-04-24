<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('send-mail', function () {
    $details = [
        'title' => 'Mail from me',
        'body' => 'This is for testing email using smtp'
    ];

    \Mail::to('nawarmk98@gmail.com')->send(new \App\Mail\testMail($details));

    dd("Email is Sent.");

});

Route::get('send_gmail', function(){
    $to_name = 'me';
    $to_email = 'nawarmk98@gmail.com';
    $data = array('name'=>"user name", "body" => "Test mail");
    \Mail::send('emails', $data, function($message) use ($to_name, $to_email) 
    {
        $message->to($to_email, $to_name)->subject('Testing Mail');
        $message->from('nawarmk98@gmail.com','SWAN');
    });
    dd("Email is Sent.");
});