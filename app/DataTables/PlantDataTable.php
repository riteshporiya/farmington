<?php

namespace App\DataTables;

use App\Models\Plant;

/**
 * Class PLantDataTable
 */
class PlantDataTable
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function get(): \Illuminate\Database\Eloquent\Builder
    {
        /** @var Plant $query */
        return Plant::with(['plantType', 'plantUse'])->select('plants.*');
    }
}
