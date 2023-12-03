<?php

namespace App\DataTables;

use App\Models\PlantType;

/**
 * Class PlantTypeDataTable
 */
class PlantTypeDataTable
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function get(): \Illuminate\Database\Eloquent\Builder
    {
        /** @var PlantType $query */
        return PlantType::query()->select('plant_types.*');
    }
}
