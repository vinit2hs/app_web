<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\DataTables\CategoriesDataTable;
use Illuminate\Database\QueryException;

class CategoriesController extends Controller
{
    public function index(CategoriesDataTable $dataTable)
    {
        $brands = Brand::all()->sortBy('name');
        return $dataTable->render('pages.categories.index', ['brands' => $brands]);
    }

    public function create()
    {
        $brands = Brand::all()->sortBy('name');
        $html = view('components.categories.formAdd', ['brands' => $brands])->render();
        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'active' => 'required|boolean',
            'brand_id' => 'required|integer|exists:brands,id'
        ],
        [
            'name.required' => 'Campo "Nome" é obrigatório',
            'active.required' => 'Campo "Ativo" é obrigatório',
            'active.boolean' => 'Campo "Ativo" não é válido',
            'brand_id.required' => 'Campo "Marca" é obrigatório',
            'brand_id.integer' => 'Campo "Marca" não é válido',
            'brand_id.exists' => 'Marca selecionada não existe'
        ]);

        Category::create($data);

        return response()->json(['message' => 'Categoria adicionada com sucesso!'],201);
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $category = Category::find($id);
        if(!$category){
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }

        $brands = Brand::all()->sortBy('name');
        $html = view('components.categories.formEdit', ['category' => $category, 'brands' => $brands])->render();
        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'active' => 'required|boolean',
            'brand_id' => 'required|integer|exists:brands,id'
        ],
        [
            'name.required' => 'Campo "Nome" é obrigatório',
            'active.required' => 'Campo "Ativo" é obrigatório',
            'active.boolean' => 'Campo "Ativo" não é válido',
            'brand_id.required' => 'Campo "Marca" é obrigatório',
            'brand_id.integer' => 'Campo "Marca" não é válido',
            'brand_id.exists' => 'Marca selecionada não existe'
        ]);

        $category = Category::find($id);
        if(!$category){
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }

        $category->update($data);
        $category->save();

        return response()->json(['message' => 'Categoria atualizada com sucesso!'],201);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if(!$category){
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }


        try {
            $category->delete();
            return response()->json(['message' => 'Categoria deletada com sucesso!'],200);
        } catch (QueryException $e) {
            if ($e->getCode() == 23000 && str_contains($e->getMessage(), '1451')) {
                return response()->json(['message' => 'Esta Categoria não pode ser deletada porque está relacionada a outros registros no sistema.'], 400);
            }
            return response()->json(['message' => 'Erro ao deletar a Categoria, tente novamente.'], 500);
        }
    }
}
