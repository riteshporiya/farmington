<?php

namespace App\DataTables;

use App\Models\Scheme;

/**
 * Class SchemeDataTable
 */
class SchemeDataTable
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function get(): \Illuminate\Database\Eloquent\Builder
    {
        /** @var \App\Models\Scheme $query */
        return Scheme::query()->select('schemes.*');
    }
}
