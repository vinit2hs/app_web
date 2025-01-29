<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ProductsDataTable;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Volume;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductsDataTable $dataTable, Request $request)
    {
        $brands = Brand::all()->toArray();
        $categories = Category::all()->toArray();
        $subCategories = SubCategory::all()->toArray();
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
        $brands = Brand::all()->toArray();
        $categories = Category::all()->toArray();
        $subCategories = SubCategory::all()->toArray();
        $volumes = Volume::all()->toArray();
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

        $brands = Brand::all()->toArray();
        $categories = Category::all()->toArray();
        $subCategories = SubCategory::all()->toArray();
        $volumes = Volume::all()->toArray();
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
        ]);

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
        } catch (\Exception $e) {
            return response()->json(['message' => 'Este produto não pode ser deletado porque está relacionado a outros registros no sistema.'], 409);
        }


        return response()->json(['message' => 'Produto deletar com sucesso!']);
    }
}
