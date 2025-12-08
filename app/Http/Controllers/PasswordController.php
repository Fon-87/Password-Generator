<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    //Función para generar una contraseña aleatoria
    public function generate(Request $request){

    //Validación de los datos del formulario 
    $validated = $request->validate([
        'length' => 'required|integer|min:4|max:64',
        'type' => 'required|in:letters,numbers,alphanumeric',
    ]);

    //Definir conjuntos de caracteres
    $letters='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers='0123456789';

    switch($validated['type']){
        case 'letters':
            $characters=$letters;
            break;
        case 'numbers':
            $characters=$numbers;
            break;
        case 'alphanumeric':
            $characters=$letters.$numbers;
            break;  
    }


    //Genera la contraseña aleatoria 
    $password='';
    for($i=0; $i < $validated['length']; $i++){
        $index=rand(0, strlen($characters)-1);
        $password.=$characters[random_int(0, strlen($characters)-1)];
    }

    //Retorna la vista con la contraseña generada
    return view('formulario', ['password'=>$password]);
  } 

}
