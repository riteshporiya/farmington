<?php

namespace App\Http\Controllers;

use App\DataTables\GardenTypeDataTable;
use App\Http\Requests\CreateGardenTypeRequest;
use App\Http\Requests\UpdateGardenTypeRequest;
use App\Models\GardenTypes;
use App\Repositories\GardenTypeRepository;
use Illuminate\Contracts\Foundation\Application as ApplicationAlias;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GardenTypeController extends AppBaseController
{
    /** @var  GardenTypeRepository */
    private $gardenTypeRepository;

    public function __construct(GardenTypeRepository $gardenTypeRepository)
    {
        $this->gardenTypeRepository = $gardenTypeRepository;
    }

    /**
     * Display a listing of the Plant Type.
     *
     * @param  Request  $request
     *
     * @throws \Exception
     * @return ApplicationAlias|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new GardenTypeDataTable())->get())->make(true);
        }
        $filterStatus = GardenTypes::STATUS;

        return view('garden_types.index', compact('filterStatus'));
    }

    /**
     * Store a newly created Plant Type in storage.
     *
     * @param  CreateGardenTypeRequest  $request
     *
     * @return JsonResponse
     */
    public function store(CreateGardenTypeRequest $request): JsonResponse
    {
        $input = $request->all();
        $this->gardenTypeRepository->createGardenType($input);

        return $this->sendSuccess('Garden Type saved successfully.');
    }

    /**
     * Show the form for editing the specified Plant Type.
     *
     * @param  int  $id
     *
     * @return JsonResponse
     */
    public function edit($id): JsonResponse
    {
        $gardenType = $this->gardenTypeRepository->find($id);

        if (empty($gardenType)) {
            return $this->sendError('Garden Type not found.');
        }

        return $this->sendResponse($gardenType, 'Garden Type retrieved successfully.');
    }

    /**
     * Update the specified Plant Type in storage.
     *
     * @param  int  $id
     * @param  UpdateGardenTypeRequest  $request
     *
     * @return JsonResponse
     */
    public function update($id, UpdateGardenTypeRequest $request): JsonResponse
    {
        $gardenType = $this->gardenTypeRepository->find($id);

        if (empty($gardenType)) {
            return $this->sendError('Garden Type not found.');
        }

        $this->gardenTypeRepository->updateGardenType($request->all(), $id);

        return $this->sendSuccess('Garden Type updated successfully.');
    }

    /**
     * Remove the specified Plant Type from storage.
     *
     * @param  int  $id
     *
     * @throws \Exception
     *
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $gardenType = $this->gardenTypeRepository->find($id);

        if (empty($gardenType)) {
            return $this->sendSuccess('Garden Type not found.');
        }

        $this->gardenTypeRepository->delete($id);

        return $this->sendSuccess('Garden Type deleted successfully.');
    }

    /**
     * @param $id
     *
     * @return JsonResponse
     */
    public function status($id): JsonResponse
    {
        /** @var GardenTypes $gardenType */
        $gardenType = $this->gardenTypeRepository->find($id);

        if (empty($gardenType)) {
            return $this->sendSuccess('Garden Type not found.');
        }
        $gardenType->update(['is_active' => ! $gardenType->is_active]);

        return $this->sendSuccess('Status updated successfully.');
    }
}
