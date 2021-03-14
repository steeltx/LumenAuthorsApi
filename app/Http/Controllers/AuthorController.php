<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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
        $authors = Author::all();
        return $this->successResponse($authors);
    }

    /**
     * Ingresar autores
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'gender' => 'required|max:255|in:male,female',
            'country' => 'required|max:255'
        ];
        $this->validate($request, $rules);
        $author = Author::create($request->all());

        return $this->successResponse($author,Response::HTTP_CREATED);
    }

    /**
     * Retornar un autor
     */
    public function show($author)
    {
        $author = Author::findOrFail($author);

        return $this->successResponse($author);
    }

    /**
     * Actualizar autor
     */
    public function update(Request $request, $author)
    {
        $rules = [
            'name' => 'max:255',
            'gender' => 'max:255|in:male,female',
            'country' => 'max:255'
        ];
        $this->validate($request, $rules);
        $author = Author::findOrFail($author);
        $author->fill($request->all());
        if($author->isClean()){
            return $this->errorResponse('Al menos un valor debe cambiar',Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->successResponse($author);
    }

    /**
     * Eliminar un autor
     */
    public function destroy($author){
        $author = Author::findOrFail($author);
        $author->delete();

        return $this->successResponse($author);
    }
}
