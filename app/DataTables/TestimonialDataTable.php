<?php

namespace App\DataTables;

use App\Models\Testimonial;

/**
 * Class TestimonialDataTable
 */
class TestimonialDataTable
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function get(): \Illuminate\Database\Eloquent\Builder
    {
        /** @var \App\Models\Testimonial $query */
        return Testimonial::query()->select('testimonials.*');
    }
}
