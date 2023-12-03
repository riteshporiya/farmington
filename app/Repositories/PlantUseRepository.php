<?php

namespace App\Repositories;

use App\Models\PlantUse;
use DB;
use Exception;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class PlantUseRepository
 */
class PlantUseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
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
        return PlantUse::class;
    }

    /**
     * @param $input
     *
     * @return \App\Models\PlantUse
     */
    public function createPlantUse($input): PlantUse
    {
        try {
            DB::beginTransaction();
            /** @var \App\Models\PlantUse $plantUse */
            $plantUse = $this->create($input);

            if (isset($input['image']) && !empty($input['image'])) {
                $plantUse->addMedia($input['image'])->toMediaCollection(PlantUse::PATH,
                    config('app.media_disc'));
            }
            DB::commit();

            return $plantUse;

        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $input
     * @param $plantUseId
     *
     * @return \App\Models\PlantUse
     */
    public function updatePlantUse($input, $plantUseId): PlantUse
    {
        try {
            DB::beginTransaction();

            /** @var PlantUse $plantUse */
            $plantUse = $this->update($input, $plantUseId);
            if ((isset($input['image']))) {
                $plantUse->clearMediaCollection(PlantUse::PATH);
                $plantUse->addMedia($input['image'])
                    ->toMediaCollection(PlantUse::PATH, config('app.media_disc'));
            }

            DB::commit();

            return $plantUse;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
