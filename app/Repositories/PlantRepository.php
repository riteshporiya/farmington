<?php

namespace App\Repositories;

use App\Models\Plant;
use App\Models\PlantType;
use App\Models\PlantUse;
use DB;
use Exception;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class PlantRepository
 */
class PlantRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'plant_type_id',
        'plant_use_id',
        'size',
        'water_requirement',
        'color',
        'plant_specification',
        'name',
        'plant_care',
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
        return Plant::class;
    }
    
    public function createPlant($input)
    {
        try {
            DB::beginTransaction();
            
            /** @var Plant $plant */
            $plant = $this->create($input);

            if ((isset($input['image']))) {
                $plant->addMedia($input['image'])
                    ->toMediaCollection(Plant::PATH, config('app.media_disc'));
            }

            DB::commit();

            return $plant;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
    
    public function updatePlant($input, $plantId)
    {
        try {
            DB::beginTransaction();

            /** @var Plant $plant */
            $plant = $this->update($input, $plantId);
            if ((isset($input['image']))) {
                $plant->clearMediaCollection(Plant::PATH);
                $plant->addMedia($input['image'])
                    ->toMediaCollection(Plant::PATH, config('app.media_disc'));
            }

            DB::commit();

            return $plant;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
    
    public function getPlatType()
    {
        return PlantType::where('is_active', true)->pluck('name', 'id')->toArray();
    }

    public function getPlatUse()
    {
        return PlantUse::where('is_active', true)->pluck('name', 'id')->toArray();
    }
}
