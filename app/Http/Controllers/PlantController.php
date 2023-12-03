<?php

namespace App\Http\Controllers;

use App\DataTables\PlantDataTable;
use App\Http\Requests\CreatePlantRequest;
use App\Http\Requests\UpdatePlantRequest;
use App\Models\Plant;
use App\Models\PlantType;
use App\Models\PlantUse;
use App\Repositories\PlantRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response as ResponseAlias;
use Laracasts\Flash\Flash;
use Yajra\DataTables\DataTables;

/**
 * Class PlantController
 */
class PlantController extends AppBaseController
{
    /** @var  PlantRepository */
    private $plantRepository;

    /**
     * PlantController constructor.
     * @param  \App\Repositories\PlantRepository  $plantRepository
     */
    public function __construct(PlantRepository $plantRepository)
    {
        $this->plantRepository = $plantRepository;
    }

    /**
     * Display a listing of the Plant.
     *
     * @param  Request  $request
     * @throws \Exception
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|ResponseAlias
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new PlantDataTable())->get())->make(true);
        }

        return view('plants.index');
    }

    /**
     * Show the form for creating a new Post.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $isEdit = false;
        $plantType = $this->plantRepository->getPlatType();
        $plantUse = $this->plantRepository->getPlatUse();
        
        return view('plants.create', compact('isEdit', 'plantType', 'plantUse'));
    }

    /**
     * Store a newly created Plant in storage.
     *
     * @param CreatePlantRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreatePlantRequest $request)
    {
        $input = $request->all();

        $this->plantRepository->createPlant($input);

        Flash::success('Plant saved successfully.');

        return redirect(route('plants.index'));
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
        $plant = $this->plantRepository->find($id);

        if (empty($plant)) {
            Flash::error('Plant not found');

            return redirect(route('plants.index'));
        }
        $isEdit = true;
        $plantType = $this->plantRepository->getPlatType();
        $plantUse = $this->plantRepository->getPlatUse();

        return view('plants.edit', compact('isEdit', 'plantUse', 'plantType'))->with('plant', $plant);
    }

    /**
     * Update the specified Post in storage.
     *
     * @param  int  $id
     * @param UpdatePlantRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(int $id, UpdatePlantRequest $request)
    {
        $plant = $this->plantRepository->find($id);

        if (empty($plant)) {
            Flash::error('Plant not found');

            return redirect(route('plants.index'));
        }

        $this->plantRepository->updatePlant($request->all(), $id);

        Flash::success('Plant updated successfully.');

        return redirect(route('plants.index'));
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
        $plant = $this->plantRepository->find($id);

        $plant->delete();

        return $this->sendSuccess('Plant deleted successfully.');
    }

    /**
     * @param $id
     *
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function status($id): \Illuminate\Http\JsonResponse
    {
        /** @var Plant $plant */
        $plant = $this->plantRepository->find($id);

        if (empty($plant)) {
            return $this->sendSuccess('Plant not found.');
        }
        $plant->update(['is_active' => ! $plant->is_active]);

        return $this->sendSuccess('Status updated successfully.');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function plantTypeShow()
    {
        $plantTypes = PlantType::where('is_active', true)->get();
        
        return view('front.plant.plant_type', compact('plantTypes'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function plantUseShow()
    {
        $plantUses = PlantUse::where('is_active', true)->get();

        return view('front.plant.plant_use', compact('plantUses'));
    }

    /**
     * @param $plantUseId
     *
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function plantUseDetails($plantUseId)
    {
        $plants = Plant::where('plant_use_id', $plantUseId)->where('is_active', true)->get();

        return view('front.plant.plant_detail', compact('plants'));
    }

    /**
     * @param $plantUseId
     *
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function plantTypeDetails($plantUseId)
    {
        $plants = Plant::where('plant_type_id', $plantUseId)->where('is_active', true)->get();

        return view('front.plant.plant_detail', compact('plants'));
    }

    /**
     * @param $plantId
     *
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function plantUseShopDetails($plantId)
    {
        $plant = Plant::where('id', $plantId)->where('is_active', true)->first();

        return view('front.plant.plant_shop_detail', compact('plant'));
    }
}
