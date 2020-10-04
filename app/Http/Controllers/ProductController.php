<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\Products\StoreProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;


class ProductController extends Controller
{

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->all();

        foreach ($products as $product) {
            $product->categorie = $product->categorie;
        }

        return response()->json($products, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = $this->product->create($request->all());

        if($product)
        {
            return response()->json(['success' => 'Produto cadastrado com sucesso!'], 201);
        }else{
            return response()->json(['error' => 'Falha ao cadastrar o produto!'], 401);
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
        if(!$product = $this->product->find($id))
            return response()->json(['error' => 'Produto não encontrado!'], 404);

        $product->categorie = $product->categorie;
        return response()->json($product, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        if(!$product = $this->product->find($id))
            return response()->json(['error' => 'Produto não encontrado!'], 404);

        if($product->update($request->all())){
            return response()->json(['success' => 'Produto atualizado!', 'product' => $product ], 201);
        }else{
            return response()->json(['error' => 'Falha ao atualizar o produto!'], 401);
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
        if(!$product = $this->product->find($id))
            return response()->json(['error' => 'Produto não encontrado!'], 404);

        if($product->delete()){
            return response()->json(['success' => 'Produto excluído com sucesso!'], 201);
        }else{
            return response()->json(['error' => 'Falha ao excluir o produto!'], 401);
        }
    }
}
