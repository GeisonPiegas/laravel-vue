<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Http\Requests\Categories\StoreCategorieRequest;
use App\Http\Requests\Categories\UpdateCategorieRequest;


class CategorieController extends Controller
{

    private $categorie;

    public function __construct(Categorie $categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categorie->all();

        return response()->json($categories, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategorieRequest $request)
    {

        $categorie = $this->categorie->create($request->all());

        if($categorie)
        {
            return response()->json(['success' => 'Categoria cadastrada com sucesso!'], 201);
        }else{
            return response()->json(['error' => 'Falha ao cadastrar a categoria!'], 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$categorie = $this->categorie->find($id))
            return response()->json(['error' => 'Categoria não encontrada!'], 404);

        return response()->json($categorie, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateCategorieRequest $request, $id)
    {
        if(!$categorie = $this->categorie->find($id))
            return response()->json(['error' => 'Categoria não encontrada!'], 404);

        if($categorie->update($request->all())){
            return response()->json(['success' => 'Categoria atualizada!', 'categorie' => $categorie ], 201);
        }else{
            return response()->json(['error' => 'Falha ao atualizar a categoria!'], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$categorie = $this->categorie->find($id))
            return response()->json(['error' => 'Categoria não encontrada!'], 404);

        if($categorie->delete()){
            return response()->json(['success' => 'Categoria excluída com sucesso!'], 201);
        }else{
            return response()->json(['error' => 'Falha ao excluir a categoria!'], 401);
        }
    }
}
