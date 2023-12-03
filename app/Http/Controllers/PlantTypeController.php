<?php

namespace App\Http\Controllers;

use App\DataTables\PlantTypeDataTable;
use App\Http\Requests\CreatePlantTypeRequest;
use App\Http\Requests\UpdatePlantTypeRequest;
use App\Models\PlantType;
use App\Repositories\PlantTypeRepository;
use Illuminate\Contracts\Foundation\Application as ApplicationAlias;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PlantTypeController extends AppBaseController
{
    /** @var  PlantTypeRepository */
    private $plantTypeRepository;

    public function __construct(PlantTypeRepository $plantTypeRepository)
    {
        $this->plantTypeRepository = $plantTypeRepository;
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
            return Datatables::of((new PlantTypeDataTable())->get())->make(true);
        }
        $filterStatus = PlantType::STATUS;

        return view('plant_types.index', compact('filterStatus'));
    }

    /**
     * Store a newly created Plant Type in storage.
     *
     * @param  CreatePlantTypeRequest  $request
     *
     * @return JsonResponse
     */
    public function store(CreatePlantTypeRequest $request): JsonResponse
    {
        $input = $request->all();
        $this->plantTypeRepository->createPlantType($input);

        return $this->sendSuccess('Plant Type saved successfully.');
    }

    /**
     * Show the form for editing the specified Plant Type.
     *
     * @param  int  $id
     *
     * @return JsonResponse
     */
    public function edit(int $id): JsonResponse
    {
        $plantType = $this->plantTypeRepository->find($id);

        if (empty($plantType)) {
            return $this->sendError('Plant Type not found.');
        }

        return $this->sendResponse($plantType, 'Plant Type retrieved successfully.');
    }

    /**
     * Update the specified Plant Type in storage.
     *
     * @param  int  $id
     * @param  UpdatePlantTypeRequest  $request
     *
     * @return JsonResponse
     */
    public function update($id, UpdatePlantTypeRequest $request): JsonResponse
    {
        $plantType = $this->plantTypeRepository->find($id);

        if (empty($plantType)) {
            return $this->sendError('Plant Type not found.');
        }

        $this->plantTypeRepository->updatePlantType($request->all(), $id);

        return $this->sendSuccess('Plant Type updated successfully.');
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
        $plantType = $this->plantTypeRepository->find($id);

        if (empty($plantType)) {
            return $this->sendSuccess('Plant Type not found.');
        }

        $this->plantTypeRepository->delete($id);

        return $this->sendSuccess('Plant Type deleted successfully.');
    }

    /**
     * @param $id
     *
     * @return JsonResponse
     */
    public function status($id): JsonResponse
    {
        /** @var PlantType $plantType */
        $plantType = $this->plantTypeRepository->find($id);

        if (empty($plantType)) {
            return $this->sendSuccess('Plant Type not found.');
        }
        $plantType->update(['is_active' => ! $plantType->is_active]);

        return $this->sendSuccess('Status updated successfully.');
    }

    /**
     * @param $id
     *
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $plantType = $this->plantTypeRepository->find($id);

        if (empty($plantType)) {
            return $this->sendSuccess('Plant Type Link not found.');
        }

        return $this->sendResponse($plantType, 'Plant Type retrieved successfully.');
    }
}
