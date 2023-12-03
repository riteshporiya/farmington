<?php

namespace App\Repositories;

use App\Models\Testimonial;
use DB;
use Exception;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class TestimonialRepository
 */
class TestimonialRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'company',
        'designation',
        'description',
        'is_active',
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return Testimonial::class;
    }

    /**
     * @param $input
     *
     * @return \App\Models\Testimonial
     */
    public function storeTestimonial($input): Testimonial
    {
        try {
            DB::beginTransaction();
            /** @var Testimonial $testimonial */
            $testimonial = $this->create($input);

            if (isset($input['image']) && !empty($input['image'])) {
                $testimonial->addMedia($input['image'])->toMediaCollection(Testimonial::PATH,
                    config('app.media_disc'));
            }
            DB::commit();
            
            return $testimonial;

        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $input
     * @param $seedId
     *
     * @return \App\Models\Testimonial
     */
    public function updateTestimonial($input, $testimonialId): Testimonial
    {
        try {
            DB::beginTransaction();

            /** @var Testimonial $testimonial */
            $testimonial = $this->update($input, $testimonialId);
            if ((isset($input['image']))) {
                $testimonial->clearMediaCollection(Testimonial::PATH);
                $testimonial->addMedia($input['image'])
                    ->toMediaCollection(Testimonial::PATH, config('app.media_disc'));
            }

            DB::commit();

            return $testimonial;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
