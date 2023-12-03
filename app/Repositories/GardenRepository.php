<?php

namespace App\Repositories;

use App\Models\Garden;
use App\Models\GardenTypes;
use DB;
use Exception;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class GardenRepository
 */
class GardenRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'garden_type_id',
        'name',
        'garden_care',
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
        return Garden::class;
    }
    
    public function createGarden($input): Garden
    {
        try {
            DB::beginTransaction();

            /** @var Garden $garden */
            $garden = $this->create($input);

            if ((isset($input['image']))) {
                $garden->addMedia($input['image'])
                    ->toMediaCollection(Garden::PATH, config('app.media_disc'));
            }

            DB::commit();

            return $garden;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
    
    public function updateGarden($input, $gardenId)
    {
        try {
            DB::beginTransaction();

            /** @var \App\Models\Garden $garden */
            $garden = $this->update($input, $gardenId);
            if ((isset($input['image']))) {
                $garden->clearMediaCollection(Garden::PATH);
                $garden->addMedia($input['image'])
                    ->toMediaCollection(Garden::PATH, config('app.media_disc'));
            }

            DB::commit();

            return $garden;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @return mixed
     */
    public function getGardenType()
    {
        return GardenTypes::where('is_active', true)->pluck('name', 'id')->toArray();
        
    }
}
