<?php

namespace App\DataTables;

use App\Models\GardenTypes;

/**
 * Class GardenTypeDataTable
 */
class GardenTypeDataTable
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function get(): \Illuminate\Database\Eloquent\Builder
    {
        /** @var GardenTypes $query */
        return GardenTypes::query()->select('garden_types.*');
    }
}
