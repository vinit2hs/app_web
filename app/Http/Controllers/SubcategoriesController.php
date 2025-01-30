<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use App\DataTables\SubcategoriesDataTable;
use Illuminate\Database\QueryException;

class SubcategoriesController extends Controller
{
    public function index(SubcategoriesDataTable $dataTable)
    {
        $categories = Category::all()->sortBy('name');
        return $dataTable->render('pages.subcategories.index', ['categories' => $categories]);
    }

    public function create()
    {
        $categories = Category::all()->sortBy('name');
        $html = view('components.subcategories.formAdd', ['categories' => $categories])->render();
        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'active' => 'required|boolean',
            'category_id' => 'required|integer|exists:categories,id'
        ],
        [
            'name.required' => 'Campo "Nome" é obrigatório',
            'active.required' => 'Campo "Ativo" é obrigatório',
            'active.boolean' => 'Campo "Ativo" não é válido',
            'category_id.required' => 'Campo "Categoria" é obrigatório',
            'category_id.integer' => 'Campo "Categoria" não é válido',
            'category_id.exists' => 'Categoria selecionada não existe'
        ]);

        SubCategory::create($data);

        return response()->json(['message' => 'Subcategoria adicionada com sucesso!'],201);
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $subcategory = SubCategory::find($id);
        if(!$subcategory){
            return response()->json(['message' => 'Subcategoria não encontrada'], 404);
        }

        $categories = Category::all()->sortBy('name');
        $html = view('components.subcategories.formEdit', ['subcategory' => $subcategory, 'categories' => $categories])->render();
        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'active' => 'required|boolean',
            'category_id' => 'required|integer|exists:categories,id'
        ],
        [
            'name.required' => 'Campo "Nome" é obrigatório',
            'active.required' => 'Campo "Ativo" é obrigatório',
            'active.boolean' => 'Campo "Ativo" não é válido',
            'category_id.required' => 'Campo "Categoria" é obrigatório',
            'category_id.integer' => 'Campo "Categoria" não é válido',
            'category_id.exists' => 'Categoria selecionada não existe'
        ]);

        $subcategory = SubCategory::find($id);
        if(!$subcategory){
            return response()->json(['message' => 'Subcategoria não encontrada'], 404);
        }

        $subcategory->update($data);
        $subcategory->save();

        return response()->json(['message' => 'Subcategoria atualizada com sucesso!'],201);
    }

    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);
        if(!$subcategory){
            return response()->json(['message' => 'Subcategoria não encontrada'], 404);
        }

        try {
            $subcategory->delete();
            return response()->json(['message' => 'Subcategoria deletada com sucesso!'],200);
        } catch (QueryException $e) {
            if ($e->getCode() == 23000 && str_contains($e->getMessage(), '1451')) {
                return response()->json(['message' => 'Esta Subcategoria não pode ser deletada porque está relacionada a outros registros no sistema.'], 400);
            }
            return response()->json(['message' => 'Erro ao deletar a Subcategoria, tente novamente.'], 500);
        }
    }
}
