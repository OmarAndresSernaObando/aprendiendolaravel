<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('about', function () {
    return view('about');
});

Route::get('service', function () {
    return view('service');
});

Route::get('contact', function () {
    return view('contact');
});

Route::post('/', function(){
	//Enviar un correo 
	$data=request()->all();
	Mail::send("emails/message", $data, function($message) use($data){
		$message->from($data['email'],$data['name'])
		        ->to('andres.serna.proyectos@gmail.com','Andres Serna')
		        ->subject($data['subject']);
	});
	//Responder al usuario, que ha sido enviado correctamente
	return back()->with('flash',$data['name'].', Tu mensaje ha sido recibido');
})->name('messages');

