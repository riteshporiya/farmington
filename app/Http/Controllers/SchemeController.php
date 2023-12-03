<?php

namespace App\Http\Controllers;

use App\DataTables\SchemeDataTable;
use App\Http\Requests\CreateSchemeRequest;
use App\Http\Requests\UpdateSchemeRequest;
use App\Models\Scheme;
use App\Repositories\SchemeRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Yajra\DataTables\DataTables;

class SchemeController extends AppBaseController
{
    /** @var  SchemeRepository */
    private $schemeRepository;

    public function __construct(SchemeRepository $schemeRepository)
    {
        $this->schemeRepository = $schemeRepository;
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
            return Datatables::of((new SchemeDataTable())->get())->make(true);
        }
        $filterStatus = Scheme::STATUS;

        return view('schemes.index', compact('filterStatus'));
    }

    /**
     * Show the form for creating a new Post.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $isEdit = false;

        return view('schemes.create', compact('isEdit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateSchemeRequest  $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateSchemeRequest $request)
    {
        $input = $request->all();
        $this->schemeRepository->storeScheme($input);

        Flash::success('Scheme saved successfully.');

        return redirect(route('scheme.index'));
    }

    /**
     * Show the form for editing the specified Plant Type.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $scheme = $this->schemeRepository->find($id);

        if (empty($scheme)) {
            Flash::error('Scheme not found');

            return redirect(route('scheme.index'));
        }
        $isEdit = true;

        return view('schemes.edit', compact('isEdit'))->with('scheme', $scheme);
    }

    /**
     * Update the specified Plant Type in storage.
     *
     * @param  int  $id
     * @param  UpdateSchemeRequest  $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, UpdateSchemeRequest $request)
    {
        $scheme = $this->schemeRepository->find($id);

        if (empty($scheme)) {
            Flash::error('Scheme not found');

            return redirect(route('scheme.index'));
        }

        $this->schemeRepository->updateScheme($request->all(), $id);

        Flash::success('Scheme updated successfully.');

        return redirect(route('scheme.index'));
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
        $scheme = $this->schemeRepository->find($id);

        if (empty($scheme)) {
            return $this->sendSuccess('Scheme not found.');
        }

        $this->schemeRepository->delete($id);

        return $this->sendSuccess('Scheme deleted successfully.');
    }

    /**
     * @param $id
     *
     * @return JsonResponse
     */
    public function status($id): JsonResponse
    {
        /** @var \App\Models\Scheme $scheme */
        $scheme = $this->schemeRepository->find($id);

        if (empty($scheme)) {
            return $this->sendSuccess('Scheme not found.');
        }
        $scheme->update(['is_active' => ! $scheme->is_active]);

        return $this->sendSuccess('Status updated successfully.');
    }
}
