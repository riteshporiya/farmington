<?php

namespace App\Repositories;

use App\Models\SeedType;
use DB;
use Exception;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class SeedTypeRepository
 */
class SeedTypeRepository extends BaseRepository
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
        return SeedType::class;
    }

    /**
     * @param $input
     *
     * @return \App\Models\SeedType
     */
    public function createSeedType($input): SeedType
    {
        try {
            DB::beginTransaction();
            /** @var \App\Models\SeedType $seedType */
            $seedType = $this->create($input);

            if (isset($input['image']) && !empty($input['image'])) {
                $seedType->addMedia($input['image'])->toMediaCollection(SeedType::PATH,
                    config('app.media_disc'));
            }
            DB::commit();

            return $seedType;

        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $input
     * @param $seedTypeId
     *
     * @return \App\Models\SeedType
     */
    public function updateSeedType($input, $seedTypeId): SeedType
    {
        try {
            DB::beginTransaction();

            /** @var \App\Models\SeedType $seedType */
            $seedType = $this->update($input, $seedTypeId);
            if ((isset($input['image']))) {
                $seedType->clearMediaCollection(SeedType::PATH);
                $seedType->addMedia($input['image'])
                    ->toMediaCollection(SeedType::PATH, config('app.media_disc'));
            }

            DB::commit();

            return $seedType;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
