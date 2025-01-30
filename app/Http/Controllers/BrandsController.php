<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\DataTables\BrandsDataTable;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;

class BrandsController extends Controller
{
    public function index(BrandsDataTable $dataTable)
    {
        return $dataTable->render('pages.brands.index');
    }

    public function create()
    {
        $html = view('components.brands.formAdd')->render();
        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'active' => 'required|boolean',
        ],
        [
            'name.required' => 'Campo "Nome" é obrigatório',
            'active.required' => 'Campo "Ativo" é obrigatório',
            'active.boolean' => 'Campo "Ativo" não é válido',
        ]);

        $data['slug'] = Str::slug($data['name']);

        Brand::create($data);

        return response()->json(['message' => 'Marca adicionada com sucesso!'],201);
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        if(!$brand){
            return response()->json(['message' => 'Marca não encontrada'], 404);
        }

        $html = view('components.brands.formEdit', ['brand' => $brand])->render();
        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'active' => 'required|boolean',
        ],
        [
            'name.required' => 'Campo "Nome" é obrigatório',
            'active.required' => 'Campo "Ativo" é obrigatório',
            'active.boolean' => 'Campo "Ativo" não é válido',
        ]);

        $brand = Brand::find($id);
        if(!$brand){
            return response()->json(['message' => 'Marca não encontrada'], 404);
        }

        $data['slug'] = Str::slug($data['name']);

        $brand->update($data);
        $brand->save();

        return response()->json(['message' => 'Marca atualizada com sucesso!'],201);
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        if(!$brand){
            return response()->json(['message' => 'Marca não encontrada'], 404);
        }


        try {
            $brand->delete();
            return response()->json(['message' => 'Marca deletada com sucesso!'],200);
        } catch (QueryException $e) {
            if ($e->getCode() == 23000 && str_contains($e->getMessage(), '1451')) {
                return response()->json(['message' => 'Esta marca não pode ser deletada porque está relacionada a outros registros no sistema.'], 400);
            }
            return response()->json(['message' => 'Erro ao deletar a marca, tente novamente.'], 500);
        }


    }
}
