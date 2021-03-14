<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Request as HttpRequest;

class AuthorController extends Controller
{

    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Retornar la lista de autores
     */
    public function index()
    {

    }

    /**
     * Ingresar autores
     */
    public function store(HttpRequest $request)
    {

    }

    /**
     * Retornar un autor
     */
    public function show($author)
    {

    }

    /**
     * Actualizar autor
     */
    public function update(Request $request, $author)
    {

    }

    /**
     * Eliminar un autor
     */
    public function destroy($author){

    }
}
