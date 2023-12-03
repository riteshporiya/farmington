<?php

namespace App\Repositories;

use App\Models\User;
use Auth;
use Carbon\Carbon;
use DB;
use Exception;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class UserRepository
 */
class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'mobile',
        'is_active',
        'email_verified_at',
        'user_type',
        'email',
        'password',
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
        return User::class;
    }
    
    public function createUser($input): User
    {
        try {
            DB::beginTransaction();
            
            $input['user_type'] = User::USER;
            $input['password'] = Hash::make($input['password']);
            $input['email_verified_at'] = Carbon::now();
            /** @var User $user */
            $user = $this->create($input);

            if ((isset($input['image']))) {
                $user->addMedia($input['image'])
                    ->toMediaCollection(User::PATH, config('app.media_disc'));
            }
            
            DB::commit();

            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
    
    public function updateUser($input, $userId)
    {
        try {
            DB::beginTransaction();

            /** @var User $user */
            $user = $this->update($input, $userId);
            if ((isset($input['image']))) {
                $user->clearMediaCollection(User::PATH);
                $user->addMedia($input['image'])
                    ->toMediaCollection(User::PATH, config('app.media_disc'));
            }

            DB::commit();

            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param array $input
     *
     * @return bool
     */
    public function profileUpdate($input): bool
    {
        /** @var User $user */
        $user = Auth::user();

        try {
            $user->update($input);

            if ((isset($input['image']))) {
                $user->clearMediaCollection(User::PROFILE);
                $user->addMedia($input['image'])
                    ->toMediaCollection(User::PROFILE, config('app.media_disc'));
            }

            return true;
        } catch (Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param  array  $input
     *
     * @return bool
     */
    public function changePassword($input): bool
    {
        try {
            /** @var User $user */
            $user = Auth::user();
            if (! Hash::check($input['password_current'], $user->password)) {
                throw new UnprocessableEntityHttpException("Current password is invalid.");
            }
            $input['password'] = Hash::make($input['password']);
            $user->update($input);

            return true;
        } catch (Exception $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
