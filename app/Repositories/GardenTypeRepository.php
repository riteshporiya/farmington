<?php

namespace App\Repositories;

use App\Models\GardenTypes;
use DB;
use Exception;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class GardenTypeRepository
 */
class GardenTypeRepository extends BaseRepository
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
        return GardenTypes::class;
    }

    /**
     * @param $input
     *
     *
     * @return \App\Models\GardenTypes
     */
    public function createGardenType($input): GardenTypes
    {
        try {
            DB::beginTransaction();
            /** @var \App\Models\GardenTypes $gardenType */
            $gardenType = $this->create($input);

            if (isset($input['image']) && !empty($input['image'])) {
                $gardenType->addMedia($input['image'])->toMediaCollection(GardenTypes::PATH,
                    config('app.media_disc'));
            }
            DB::commit();

            return $gardenType;

        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $input
     * @param $gardenTypeId
     *
     *
     * @return \App\Models\GardenTypes
     */
    public function updateGardenType($input, $gardenTypeId): GardenTypes
    {
        try {
            DB::beginTransaction();

            /** @var \App\Models\GardenTypes $gardenType */
            $gardenType = $this->update($input, $gardenTypeId);
            if ((isset($input['image']))) {
                $gardenType->clearMediaCollection(GardenTypes::PATH);
                $gardenType->addMedia($input['image'])
                    ->toMediaCollection(GardenTypes::PATH, config('app.media_disc'));
            }

            DB::commit();

            return $gardenType;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
