<?php

namespace App\DataTables;

use App\Models\Inquiry;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class InquiryDataTable
 */
class InquiryDataTable
{
    /**
     * @return Builder
     */
    public function get(): Builder
    {
        /** @var Inquiry $query */
        return Inquiry::query()->select('inquiries.*');
    }
}
