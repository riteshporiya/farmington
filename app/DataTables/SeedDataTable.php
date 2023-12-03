<?php

namespace App\DataTables;

use App\Models\Seed;

/**
 * Class SeedDataTable
 */
class SeedDataTable
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function get(): \Illuminate\Database\Eloquent\Builder
    {
        /** @var Seed $query */
        return Seed::with(['seedType'])->select('seeds.*');
    }
}
