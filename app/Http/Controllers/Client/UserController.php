<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Repositories\UserRepository;
use Auth;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Class UserController
 */
class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param  UpdateUserProfileRequest  $request
     *
     * @return JsonResponse
     */
    public function profileUpdate(UpdateUserProfileRequest $request): JsonResponse
    {
        $input = $request->all();

        try {
            $user = $this->userRepository->profileUpdate($input);

            return $this->sendResponse($user, 'Profile updated successfully.');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for editing the specified User.
     *
     * @return JsonResponse
     */
    public function editProfile(): JsonResponse
    {
        $user = Auth::user();

        return $this->sendResponse($user, 'User retrieved successfully.');
    }

    /**
     * @param  ChangePasswordRequest  $request
     *
     * @return JsonResponse
     */
    public function changePassword(ChangePasswordRequest $request): JsonResponse
    {
        $input = $request->all();

        try {
            $user = $this->userRepository->changePassword($input);

            return $this->sendSuccess('Password updated successfully.');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), 422);
        }
    }
}
