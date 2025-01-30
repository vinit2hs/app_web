<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Services\BannerPositionService;
use Illuminate\Http\Request;
use App\DataTables\BannersDataTable;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Storage;

class BannersController extends Controller
{

    private $bannerPositionService;

    public function __construct(BannerPositionService $bannerPositionService)
    {
        $this->bannerPositionService = $bannerPositionService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(BannersDataTable $dataTable, Request $request)
    {
        $brands = Brand::all()->toArray();
        $categories = Category::all()->toArray();
        $subCategories = SubCategory::all()->toArray();
        $data = [
            'brands' => $brands,
            'categories' => $categories,
            'subCategories' => $subCategories
        ];
        return $dataTable->render('pages.banners.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $newPosition = $this->bannerPositionService->getNewBannerPosition();
        $html = view('components.banners.formAdd', ['newPosition' => $newPosition])->render();
        return response()->json(['html' => $html]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'link' => 'required',
            'imagem' => 'required|file|image|mimes:jpeg,png,jpg',
            'title' => 'required',
            'active' => 'required|boolean',
            'priority' => 'required|integer|min:1',
        ],
            [
                'link.required' => 'Campo "Link" é obrigatório',
                'imagem.image' => 'Campo "Imagem" não é válido',
                'imagem.mimes' => 'Campo "Imagem" não é válido',
                'name.required' => 'Campo "Nome" é obrigatório',
                'active.required' => 'Campo "Visível" é obrigatório',
                'active.boolean' => 'Campo "Visível" não é válido',
                'priority.required' => 'Campo "Ordem" é obrigatório',
                'priority.integer' => 'Campo "Ordem" deve ser um numero inteiro',
                'priority.min' => 'Campo "Ordem" deve ser maior que 0',
            ]);

        $data['image'] = $request->file('imagem')->store('banners', 'public');

        unset($data['imagem']);

        $banner = new Banner($data);

        $this->bannerPositionService->updatePositionOnStore($banner, $data['priority']);

        return response()->json(['message' => 'Banner criado com sucesso!'], 201);
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
        $banner = Banner::find($id);
        if (!$banner) {
            return response()->json(['message' => 'Banner não encontrado'], 404);
        }

        $html = view('components.banners.formEdit', compact('banner'))->render();

        return response()->json(['html' => $html]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'link' => 'required',
            'imagem' => 'sometimes|file|image|mimes:jpeg,png,jpg',
            'title' => 'required',
            'priority' => 'required|integer|min:1',
            'active' => 'required|boolean',
        ], [
            'link.required' => 'Campo "Link" é obrigatório',
            'imagem.image' => 'Campo "Imagem" não é válido',
            'imagem.mimes' => 'Campo "Imagem" não é válido',
            'name.required' => 'Campo "Nome" é obrigatório',
            'active.required' => 'Campo "Visível" é obrigatório',
            'active.boolean' => 'Campo "Visível" não é válido',
            'priority.required' => 'Campo "Ordem" é obrigatório',
            'priority.integer' => 'Campo "Ordem" deve ser um numero inteiro',
            'priority.min' => 'Campo "Ordem" deve ser maior que 0',
        ]);

        $banner = Banner::find($id);
        if (!$banner) {
            return response()->json(['message' => 'Banner não encontrado'], 404);
        }

        if ($request->hasFile('imagem')) {
            $this->deleteImageBanner($banner);
            $data['image'] = $request->file('imagem')->store('banners', 'public');
        }

        $this->bannerPositionService->updatePosition($id, $data['priority']);

        unset($data['imagem']);
        $banner->update($data);
        $banner->save();

        return response()->json(['message' => 'Banner atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::find($id);
        if (!$banner) {
            return response()->json(['message' => 'Banner não encontrado'], 404);
        }

        $deletedPosition = $banner->priority;

        $this->deleteImageBanner($banner);

        $banner->delete();

        $this->bannerPositionService->reorderAfterDeletion($deletedPosition);

        return response()->json(['message' => 'Banner deletar com sucesso!']);
    }

    protected function deleteImageBanner(Banner $banner)
    {
        if ($banner->image && Storage::exists('public/' . $banner->image)) {
            Storage::delete('public/' . $banner->image);
        }
    }
}
