<?php namespace App\Http\Controllers;

use App\Filmes;
use Illuminate\Http\Request;

Class FilmesController extends Controller {
  /**
  *
  */
  public function index(){
    $filmes = Filmes::all();

    return response()->json($filmes);
  }

  public function get($id){
    $filme = Filmes::find($id);
    return response()->json($filme);
  }

  public function store(Request $request){

    $input = [
      'titulo' => $request->input('titulo'),
      'descricao' => $request->input('descricao')
    ];

    $filme = new Filmes();
    $filme->fill($input);
    $filme->save();

    return response()->json($filme);
  }

  public function update(Request $request, $id){

    $input = [
      'titulo' => $request->input('titulo'),
      'descricao' => $request->input('descricao')
    ];

    $filme = Filmes::whereId($id);
    $filme->update($input);

    return response()->json($filme);
  }

  public function delete($id){
    $filme = Filmes::whereId($id);
    $filme->delete();

    return response()->json($filme);
  }
}
