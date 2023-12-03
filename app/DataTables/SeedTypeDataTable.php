<?php

namespace App\DataTables;

use App\Models\SeedType;

/**
 * Class SeedTypeDataTable
 */
class SeedTypeDataTable
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function get(): \Illuminate\Database\Eloquent\Builder
    {
        /** @var SeedType $query */
        return SeedType::query()->select('seed_types.*');
    }
}
