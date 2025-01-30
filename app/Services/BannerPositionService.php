<?php

namespace App\Services;

use App\Models\Banner;
use Illuminate\Support\Facades\DB;

class BannerPositionService
{

    // Atualiza a posição dos banners
    public function updatePosition(int $bannerId, int $newPosition): void
    {
        DB::transaction(function () use ($bannerId, $newPosition) {
            $banner = Banner::findOrFail($bannerId);
            $currentPosition = $banner->priority;

            // Verifica se a posição realmente mudou
            if ($currentPosition === $newPosition) {
                return;
            }

            // Reordena os itens de acordo com a nova posição
            if ($newPosition < $currentPosition) {
                Banner::whereBetween('priority', [$newPosition, $currentPosition - 1])
                    ->increment('priority');
            } else {
                Banner::whereBetween('priority', [$currentPosition + 1, $newPosition])
                    ->decrement('priority');
            }

            $banner->priority = $newPosition;
            $banner->save();
        });
    }

    // Reordena as posições após exclusão
    public function reorderAfterDeletion(int $deletedPosition): void
    {
        Banner::where('priority', '>', $deletedPosition)
            ->decrement('priority');
    }

    // Define a posição ao criar um novo banner
    public function getNewBannerPosition()
    {
        $maxPosition = Banner::max('priority') ?? 0;
        return $maxPosition + 1;
    }

    public function updatePositionOnStore (Banner $banner, $position): void
    {
        Banner::where('priority', '>=', $position)
            ->increment('priority');
        $banner->save();
    }
}
