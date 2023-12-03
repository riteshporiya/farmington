<?php

namespace App\Repositories;

use App\Models\PlantType;
use DB;
use Exception;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class PlantTypeRepository
 */
class PlantTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
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
        return PlantType::class;
    }

    /**
     * @param $input
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createPlantType($input): \Illuminate\Database\Eloquent\Model
    {
        try {
            DB::beginTransaction();
            /** @var \App\Models\PlantType $plantType */
            $plantType = $this->create($input);

            if (isset($input['image']) && !empty($input['image'])) {
                $plantType->addMedia($input['image'])->toMediaCollection(PlantType::PATH,
                    config('app.media_disc'));
            }
            DB::commit();

            return $plantType;

        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
    
    public function updatePlantType($input, $plantTypeId): PlantType
    {
        try {
            DB::beginTransaction();

            /** @var PlantType $plantType */
            $plantType = $this->update($input, $plantTypeId);
            if ((isset($input['image']))) {
                $plantType->clearMediaCollection(PlantType::PATH);
                $plantType->addMedia($input['image'])
                    ->toMediaCollection(PlantType::PATH, config('app.media_disc'));
            }

            DB::commit();

            return $plantType;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
