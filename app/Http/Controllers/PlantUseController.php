<?php

namespace App\Http\Controllers;

use App\DataTables\PlantUseDataTable;
use App\Http\Requests\CreatePlantUseRequest;
use App\Http\Requests\UpdatePlantUseRequest;
use App\Models\PlantUse;
use App\Repositories\PlantUseRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PlantUseController extends AppBaseController
{
    /** @var  PlantUseRepository */
    private $plantUseRepository;

    public function __construct(PlantUseRepository $plantUseRepository)
    {
        $this->plantUseRepository = $plantUseRepository;
    }

    /**
     * Display a listing of the Plant Use.
     *
     * @param  Request  $request
     *
     * @throws \Exception
     * @return ApplicationAlias|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new PlantUseDataTable())->get())->make(true);
        }
        $filterStatus = PlantUse::STATUS;

        return view('plant_uses.index', compact('filterStatus'));
    }

    /**
     * Store a newly created Plant Use in storage.
     *
     * @param  CreatePlantUseRequest  $request
     *
     * @return JsonResponse
     */
    public function store(CreatePlantUseRequest $request): JsonResponse
    {
        $input = $request->all();
        $this->plantUseRepository->createPlantUse($input);

        return $this->sendSuccess('Plant Use saved successfully.');
    }

    /**
     * Show the form for editing the specified Plant Use.
     *
     * @param  int  $id
     *
     * @return JsonResponse
     */
    public function edit(int $id): JsonResponse
    {
        $plantUse = $this->plantUseRepository->find($id);

        if (empty($plantUse)) {
            return $this->sendError('Plant Use not found.');
        }

        return $this->sendResponse($plantUse, 'Plant Use retrieved successfully.');
    }

    /**
     * Update the specified Plant Type in storage.
     *
     * @param  int  $id
     * @param  UpdatePlantUseRequest  $request
     *
     * @return JsonResponse
     */
    public function update(int $id, UpdatePlantUseRequest $request): JsonResponse
    {
        $plantType = $this->plantUseRepository->find($id);

        if (empty($plantType)) {
            return $this->sendError('Plant Use not found.');
        }

        $this->plantUseRepository->updatePlantUse($request->all(), $id);

        return $this->sendSuccess('Plant Use updated successfully.');
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
        $plantUse = $this->plantUseRepository->find($id);

        if (empty($plantUse)) {
            return $this->sendSuccess('Plant Use not found.');
        }

        $this->plantUseRepository->delete($id);

        return $this->sendSuccess('Plant Use deleted successfully.');
    }

    /**
     * @param $id
     *
     * @return JsonResponse
     */
    public function status($id): JsonResponse
    {
        /** @var PlantUse $plantUse */
        $plantUse = $this->plantUseRepository->find($id);

        if (empty($plantUse)) {
            return $this->sendSuccess('Plant Use not found.');
        }
        $plantUse->update(['is_active' => ! $plantUse->is_active]);

        return $this->sendSuccess('Status updated successfully.');
    }
}
