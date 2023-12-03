<?php

namespace App\Http\Controllers;

use App\DataTables\GardenDataTable;
use App\Http\Requests\CreateGardenRequest;
use App\Http\Requests\UpdateGardenRequest;
use App\Models\Garden;
use App\Repositories\GardenRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response as ResponseAlias;
use Laracasts\Flash\Flash;
use Yajra\DataTables\DataTables;

class GardenController extends AppBaseController
{
    /** @var  GardenRepository */
    private $gardenRepository;

    /**
     * SeedController constructor.
     * @param  \App\Repositories\GardenRepository  $gardenRepository
     */
    public function __construct(GardenRepository $gardenRepository)
    {
        $this->gardenRepository = $gardenRepository;
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
            return Datatables::of((new GardenDataTable())->get())->make(true);
        }

        return view('gardens.index');
    }
    
    public function create()
    {
        $isEdit = false;
        $gardenType = $this->gardenRepository->getGardenType();

        return view('gardens.create', compact('isEdit', 'gardenType'));
    }

    /**
     * Store a newly created Plant in storage.
     *
     * @param CreateGardenRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateGardenRequest $request)
    {
        $input = $request->all();

        $this->gardenRepository->createGarden($input);

        Flash::success('Garden saved successfully.');

        return redirect(route('gardens.index'));
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
        $garden = $this->gardenRepository->find($id);

        if (empty($garden)) {
            Flash::error('Garden not found');

            return redirect(route('gardens.index'));
        }
        $isEdit = true;
        $gardenType = $this->gardenRepository->getGardenType();

        return view('gardens.edit', compact('isEdit', 'gardenType'))->with('garden', $garden);
    }

    /**
     * Update the specified Post in storage.
     *
     * @param  int  $id
     * @param UpdateGardenRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(int $id, UpdateGardenRequest $request)
    {
        $garden = $this->gardenRepository->find($id);

        if (empty($garden)) {
            Flash::error('Garden not found');

            return redirect(route('gardens.index'));
        }

        $this->gardenRepository->updateGarden($request->all(), $id);

        Flash::success('Garden updated successfully.');

        return redirect(route('gardens.index'));
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
        $garden = $this->gardenRepository->find($id);

        $garden->delete();

        return $this->sendSuccess('Garden deleted successfully.');
    }

    /**
     * @param $id
     *
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function status($id): \Illuminate\Http\JsonResponse
    {
        /** @var \App\Models\Garden $garden */
        $garden = $this->gardenRepository->find($id);

        if (empty($garden)) {
            return $this->sendSuccess('Garden not found.');
        }
        $garden->update(['is_active' => ! $garden->is_active]);

        return $this->sendSuccess('Status updated successfully.');
    }
    
    public function gardenTypeDetails($gardenTypeId)
    {
        $gardens = Garden::where('garden_type_id', $gardenTypeId)->where('is_active', true)->get();

        return view('front.garden.garden_detail', compact('gardens'));
    }
    
    public function gardenShopDetails($gardenId)
    {
        $garden = Garden::where('id', $gardenId)->where('is_active', true)->first();

        return view('front.garden.garden_shop_detail', compact('garden'));
    }
}
