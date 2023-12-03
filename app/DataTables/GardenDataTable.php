<?php

namespace App\DataTables;

use App\Models\Garden;

/**
 * Class GardenDataTable
 */
class GardenDataTable
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function get(): \Illuminate\Database\Eloquent\Builder
    {
        /** @var Garden $query */
        return Garden::with(['gardenType'])->select('gardens.*');
    }
}
