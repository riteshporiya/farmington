<?php

namespace App\Repositories;

use App\Models\Seed;
use App\Models\SeedType;
use DB;
use Exception;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class SeedRepository
 */
class SeedRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'seed_type_id',
        'water_requirement',
        'seed_specification',
        'name',
        'seed_care',
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
        return Seed::class;
    }

    /**
     * @param $input
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createSeed($input): \Illuminate\Database\Eloquent\Model
    {
        try {
            DB::beginTransaction();

            /** @var Seed $seed */
            $seed = $this->create($input);

            if ((isset($input['image']))) {
                $seed->addMedia($input['image'])
                    ->toMediaCollection(Seed::PATH, config('app.media_disc'));
            }

            DB::commit();

            return $seed;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $input
     * @param $seedId
     *
     * @return \App\Models\Seed
     */
    public function updateSeed($input, $seedId): Seed
    {
        try {
            DB::beginTransaction();

            /** @var Seed $seed */
            $seed = $this->update($input, $seedId);
            if ((isset($input['image']))) {
                $seed->clearMediaCollection(Seed::PATH);
                $seed->addMedia($input['image'])
                    ->toMediaCollection(Seed::PATH, config('app.media_disc'));
            }

            DB::commit();

            return $seed;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @return mixed
     */
    public function getSeedType()
    {
        return SeedType::where('is_active', true)->pluck('name', 'id')->toArray();
    }
}
