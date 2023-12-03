<?php

namespace App\Repositories;

use App\Models\Scheme;
use DB;
use Exception;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class SchemeRepository
 */
class SchemeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
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
        return Scheme::class;
    }
    
    public function storeScheme($input): Scheme
    {
        try {
            DB::beginTransaction();
            /** @var Scheme $scheme */
            $scheme = $this->create($input);

            if (isset($input['image']) && !empty($input['image'])) {
                $scheme->addMedia($input['image'])->toMediaCollection(Scheme::PATH,
                    config('app.media_disc'));
            }
            DB::commit();

            return $scheme;

        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
    
    public function updateScheme($input, $schemeId): Scheme
    {
        try {
            DB::beginTransaction();

            /** @var Scheme $scheme */
            $scheme = $this->update($input, $schemeId);
            if ((isset($input['image']))) {
                $scheme->clearMediaCollection(Scheme::PATH);
                $scheme->addMedia($input['image'])
                    ->toMediaCollection(Scheme::PATH, config('app.media_disc'));
            }

            DB::commit();

            return $scheme;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
