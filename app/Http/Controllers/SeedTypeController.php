<?php

namespace App\Http\Controllers;

use App\DataTables\SeedTypeDataTable;
use App\Http\Requests\CreateSeedTypeRequest;
use App\Http\Requests\UpdateSeedTypeRequest;
use App\Models\SeedType;
use App\Repositories\SeedTypeRepository;
use Illuminate\Contracts\Foundation\Application as ApplicationAlias;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SeedTypeController extends AppBaseController
{
    /** @var  SeedTypeRepository */
    private $seedTypeRepository;

    public function __construct(SeedTypeRepository $seedTypeRepository)
    {
        $this->seedTypeRepository = $seedTypeRepository;
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
            return Datatables::of((new SeedTypeDataTable())->get())->make(true);
        }
        $filterStatus = SeedType::STATUS;

        return view('seed_types.index', compact('filterStatus'));
    }

    /**
     * Store a newly created Plant Type in storage.
     *
     * @param  CreateSeedTypeRequest  $request
     *
     * @return JsonResponse
     */
    public function store(CreateSeedTypeRequest $request): JsonResponse
    {
        $input = $request->all();
        $this->seedTypeRepository->createSeedType($input);

        return $this->sendSuccess('Seed Type saved successfully.');
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
        $seedType = $this->seedTypeRepository->find($id);

        if (empty($seedType)) {
            return $this->sendError('Seed Type not found.');
        }

        return $this->sendResponse($seedType, 'Seed Type retrieved successfully.');
    }

    /**
     * Update the specified Plant Type in storage.
     *
     * @param  int  $id
     * @param  UpdateSeedTypeRequest  $request
     *
     * @return JsonResponse
     */
    public function update($id, UpdateSeedTypeRequest $request): JsonResponse
    {
        $seedType = $this->seedTypeRepository->find($id);

        if (empty($seedType)) {
            return $this->sendError('Seed Type not found.');
        }

        $this->seedTypeRepository->updateSeedType($request->all(), $id);

        return $this->sendSuccess('Seed Type updated successfully.');
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
        $seedType = $this->seedTypeRepository->find($id);

        if (empty($seedType)) {
            return $this->sendSuccess('Seed Type not found.');
        }

        $this->seedTypeRepository->delete($id);

        return $this->sendSuccess('Seed Type deleted successfully.');
    }

    /**
     * @param $id
     *
     * @return JsonResponse
     */
    public function status($id): JsonResponse
    {
        /** @var seedType $seedType */
        $seedType = $this->seedTypeRepository->find($id);

        if (empty($seedType)) {
            return $this->sendSuccess('Seed Type not found.');
        }
        $seedType->update(['is_active' => ! $seedType->is_active]);

        return $this->sendSuccess('Status updated successfully.');
    }
}
