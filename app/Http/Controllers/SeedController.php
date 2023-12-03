<?php

namespace App\Http\Controllers;

use App\DataTables\SeedDataTable;
use App\Http\Requests\CreateSeedRequest;
use App\Http\Requests\UpdateSeedRequest;
use App\Models\Seed;
use App\Repositories\SeedRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response as ResponseAlias;
use Laracasts\Flash\Flash;
use Yajra\DataTables\DataTables;

/**
 * Class SeedController
 */
class SeedController extends AppBaseController
{
    /** @var  SeedRepository */
    private $seedRepository;

    /**
     * SeedController constructor.
     * @param  \App\Repositories\SeedRepository  $seedRepository
     */
    public function __construct(SeedRepository $seedRepository)
    {
        $this->seedRepository = $seedRepository;
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
            return Datatables::of((new SeedDataTable())->get())->make(true);
        }

        return view('seeds.index');
    }

    /**
     * Show the form for creating a new Post.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $isEdit = false;
        $seedType = $this->seedRepository->getSeedType();

        return view('seeds.create', compact('isEdit', 'seedType'));
    }

    /**
     * Store a newly created Plant in storage.
     *
     * @param CreateSeedRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateSeedRequest $request)
    {
        $input = $request->all();

        $this->seedRepository->createSeed($input);

        Flash::success('Seed saved successfully.');

        return redirect(route('seeds.index'));
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
        $seed = $this->seedRepository->find($id);

        if (empty($seed)) {
            Flash::error('Seed not found');

            return redirect(route('seeds.index'));
        }
        $isEdit = true;
        $seedType = $this->seedRepository->getSeedType();

        return view('seeds.edit', compact('isEdit', 'seedType'))->with('seed', $seed);
    }

    /**
     * Update the specified Post in storage.
     *
     * @param  int  $id
     * @param UpdateSeedRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(int $id, UpdateSeedRequest $request)
    {
        $seed = $this->seedRepository->find($id);

        if (empty($seed)) {
            Flash::error('Seed not found');

            return redirect(route('seeds.index'));
        }

        $this->seedRepository->updateSeed($request->all(), $id);

        Flash::success('Seed updated successfully.');

        return redirect(route('seeds.index'));
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
        $seed = $this->seedRepository->find($id);

        $seed->delete();

        return $this->sendSuccess('Seed deleted successfully.');
    }

    /**
     * @param $id
     *
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function status($id): \Illuminate\Http\JsonResponse
    {
        /** @var Seed $seed */
        $seed = $this->seedRepository->find($id);

        if (empty($seed)) {
            return $this->sendSuccess('Seed not found.');
        }
        $seed->update(['is_active' => ! $seed->is_active]);

        return $this->sendSuccess('Status updated successfully.');
    }

    /**
     * @param $seedTypeId
     *
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function seedTypeDetails($seedTypeId)
    {
        $seeds = Seed::where('seed_type_id', $seedTypeId)->where('is_active', true)->get();

        return view('front.seed.seed_detail', compact('seeds'));
    }

    /**
     * @param $seedId
     *
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function seedShopDetails($seedId)
    {
        $seed = Seed::where('id', $seedId)->where('is_active', true)->first();

        return view('front.seed.seed_shop_detail', compact('seed'));
    }
}
