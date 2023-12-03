<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Auth;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Response as ResponseAlias;
use Laracasts\Flash\Flash;
use Yajra\DataTables\DataTables;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the Post.
     *
     * @param  Request  $request
     * @throws \Exception
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|ResponseAlias
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new UserDataTable())->get())->make(true);
        }

        return view('users.index');
    }

    /**
     * Show the form for creating a new Post.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $isEdit = false;
        return view('users.create', compact('isEdit'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        
        $user = $this->userRepository->createUser($input);

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Show the form for editing the specified Post.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $user = $this->userRepository->find($id);
        $user->password = null;

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }
        $isEdit = true;

        return view('users.edit', compact('isEdit'))->with('user', $user);
    }

    /**
     * Update the specified Post in storage.
     *
     * @param  int  $id
     * @param UpdateUserRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(int $id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $user = $this->userRepository->updateUser($request->all(), $id);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified Post from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $user = $this->userRepository->find($id);

        $user->delete();

        return $this->sendSuccess('User deleted successfully.');
    }
    
    public function status($id): \Illuminate\Http\JsonResponse
    {
        /** @var User $user */
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return $this->sendSuccess('User not found.');
        }
        $user->update(['is_active' => ! $user->is_active]);

        return $this->sendSuccess('Status updated successfully.');
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
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function updateLanguage(Request $request): JsonResponse
    {
        $language = $request->get('language');

        $user = getLoggedInUser();
        $user->update(['language' => $language]);

        return $this->sendSuccess('Language updated successfully.');
    }

    /**
     * @param  ChangePasswordRequest  $request
     *
     * @return JsonResponse
     */
    public function changePassword(ChangePasswordRequest $request)
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
