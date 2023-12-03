<?php

namespace App\DataTables;

use App\Models\PlantUse;

/**
 * Class PlantUseDataTable
 */
class PlantUseDataTable
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function get(): \Illuminate\Database\Eloquent\Builder
    {
        /** @var PlantUse $query */
        return PlantUse::query()->select('plant_uses.*');
    }
}
