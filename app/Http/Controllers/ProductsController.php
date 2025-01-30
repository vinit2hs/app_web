<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\DataTables\ProductsDataTable;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Volume;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductsDataTable $dataTable, Request $request)
    {
        $brands = Brand::all()->sortBy('name');
        $categories = Category::all()->sortBy('name');
        $subCategories = SubCategory::all()->sortBy('name');
        $data = [
            'brands' => $brands,
            'categories' => $categories,
            'subCategories' => $subCategories
        ];
        return $dataTable->render('pages.produtos.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all()->sortBy('name');
        $categories = Category::all()->sortBy('name');
        $subCategories = SubCategory::all()->sortBy('name');
        $volumes = Volume::all()->sortBy('name');
        $data = [
            'brands' => $brands,
            'categories' => $categories,
            'subCategories' => $subCategories,
            'volumes' => $volumes
        ];
        $html = view('components.produtos.formAdd', $data)->render();
        return response()->json(['html' => $html]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:5|max:100',
            'description' => 'required|string|min:10',
            'brand_id' => 'required|integer|exists:brands,id',
            'category_id' => 'required|integer|exists:categories,id',
            'sub_category_id' =>
            'required|integer|exists:sub_categories,id',
            'volume_id' =>
            'required|integer|exists:volumes,id',
            'sankhya_code' => 'sometimes|integer',
            'intelbras_code' => 'sometimes|integer'
        ], [
            'name.required' => 'Campo "Nome" é obrigatório.',
            'name.min' => 'Campo "Nome" precisa ter ao menos 5 caracteres.',
            'name.max' => 'Campo "Nome" precisa ter menos de 101 caracteres.',
            'brand_id.required' => 'Campo "Marca" é obrigatório.',
            'brand_id.integer' => 'Campo "Marca" não é válido.',
            'brand_id.exists' => 'Marca selecionada não existe',
            'category_id.required' => 'Campo "Categoria" é obrigatório.',
            'category_id.integer' => 'Campo "Categoria" não é válido.',
            'category_id.exists' => 'Categoria selecionada não existe',
            'sub_category_id.required' => 'Campo "Sub Categoria" é obrigatório.',
            'sub_category_id.integer' => 'Campo "Sub Categoria" não é válido.',
            'sub_category_id.exists' => 'Sub Categoria selecionada não existe',
            'volume_id.required' => 'Campo "Tipo de Volume" é obrigatório.',
            'volume_id.integer' => 'Campo "Tipo de Volume" não é válido.',
            'volume_id.exists' => 'Tipo de Volume selecionado não existe',
            'sankhya_code.integer' => 'Campo "Código Sankhya" não é válido.',
            'intelbras_code.integer' => 'Campo "Código Intelbras" não é válido.'
        ]);

        Product::create($data);

        return response()->json(['message' => 'Produto adicionado com sucesso!'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        if (empty($product)) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $brands = Brand::all()->sortBy('name');
        $categories = Category::all()->sortBy('name');
        $subCategories = SubCategory::all()->sortBy('name');
        $volumes = Volume::all()->sortBy('name');
        $data = [
            'product' => $product,
            'brands' => $brands,
            'categories' => $categories,
            'subCategories' => $subCategories,
            'volumes' => $volumes
        ];
        $html = view('components.produtos.formEdit', $data)->render();
        return response()->json(['html' =>
        $html]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|min:5|max:100',
            'description' => 'required|string|min:10',
            'brand_id' => 'required|integer|exists:brands,id',
            'category_id' => 'required|integer|exists:categories,id',
            'sub_category_id' =>
            'required|integer|exists:sub_categories,id',
            'volume_id' =>
            'required|integer|exists:volumes,id',
            'sankhya_code' => 'sometimes|integer',
            'intelbras_code' => 'sometimes|integer'
        ],
            [
                'name.required' => 'Campo "Nome" é obrigatório.',
                'name.min' => 'Campo "Nome" precisa ter ao menos 5 caracteres.',
                'name.max' => 'Campo "Nome" precisa ter menos de 101 caracteres.',
                'brand_id.required' => 'Campo "Marca" é obrigatório.',
                'brand_id.integer' => 'Campo "Marca" não é válido.',
                'brand_id.exists' => 'Marca selecionada não existe',
                'category_id.required' => 'Campo "Categoria" é obrigatório.',
                'category_id.integer' => 'Campo "Categoria" não é válido.',
                'category_id.exists' => 'Categoria selecionada não existe',
                'sub_category_id.required' => 'Campo "Sub Categoria" é obrigatório.',
                'sub_category_id.integer' => 'Campo "Sub Categoria" não é válido.',
                'sub_category_id.exists' => 'Sub Categoria selecionada não existe',
                'volume_id.required' => 'Campo "Tipo de Volume" é obrigatório.',
                'volume_id.integer' => 'Campo "Tipo de Volume" não é válido.',
                'volume_id.exists' => 'Tipo de Volume selecionado não existe',
                'sankhya_code.integer' => 'Campo "Código Sankhya" não é válido.',
                'intelbras_code.integer' => 'Campo "Código Intelbras" não é válido.'
            ]
        );

        $product = Product::find($id);
        if (empty($product)) {
            return response()->json(['message' => 'Produto não encontrado']);
        }

        $product->update($data);
        $product->save();

        return response()->json(['message' => 'Produto atualizado com sucesso!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if (empty($product)) {
            return response()->json(['message' => 'Produto não encontrado']);
        }

        try {
            $product->delete();
            return response()->json(['message' => 'Produto deletado com sucesso!'],200);
        } catch (QueryException $e) {
            if ($e->getCode() == 23000 && str_contains($e->getMessage(), '1451')) {
                return response()->json(['message' => 'Este produto não pode ser deletado porque está relacionado a outros registros no sistema.'], 400);
            }
            return response()->json(['message' => 'Erro ao deletar o produto, tente novamente.'], 500);
        }
    }
}
