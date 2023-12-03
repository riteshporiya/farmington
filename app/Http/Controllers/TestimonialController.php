<?php

namespace App\Http\Controllers;

use App\DataTables\TestimonialDataTable;
use App\Http\Requests\CreateTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
use App\Repositories\TestimonialRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laracasts\Flash\Flash;
use Yajra\DataTables\DataTables;

class TestimonialController extends AppBaseController
{
    /** @var  TestimonialRepository */
    private $testimonialRepository;

    public function __construct(TestimonialRepository $testimonialRepository)
    {
        $this->testimonialRepository = $testimonialRepository;
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
            return Datatables::of((new TestimonialDataTable())->get())->make(true);
        }
        $filterStatus = Testimonial::STATUS;

        return view('testimonials.index', compact('filterStatus'));
    }

    /**
     * Show the form for creating a new Post.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $isEdit = false;

        return view('testimonials.create', compact('isEdit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateTestimonialRequest  $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateTestimonialRequest $request)
    {
        $input = $request->all();
        $this->testimonialRepository->storeTestimonial($input);

        Flash::success('Testimonial saved successfully.');

        return redirect(route('testimonial.index'));
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
        $testimonial = $this->testimonialRepository->find($id);

        if (empty($testimonial)) {
            Flash::error('Testimonial not found');

            return redirect(route('testimonial.index'));
        }
        $isEdit = true;

        return view('testimonials.edit', compact('isEdit'))->with('testimonial', $testimonial);
    }

    /**
     * Update the specified Plant Type in storage.
     *
     * @param  int  $id
     * @param  UpdateTestimonialRequest  $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, UpdateTestimonialRequest $request)
    {
        $testimonial = $this->testimonialRepository->find($id);

        if (empty($testimonial)) {
            Flash::error('Testimonial not found');

            return redirect(route('testimonial.index'));
        }

        $this->testimonialRepository->updateTestimonial($request->all(), $id);

        Flash::success('Testimonial updated successfully.');

        return redirect(route('testimonial.index'));
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
        $testimonial = $this->testimonialRepository->find($id);

        if (empty($testimonial)) {
            return $this->sendSuccess('Testimonial not found.');
        }

        $this->testimonialRepository->delete($id);

        return $this->sendSuccess('Testimonial deleted successfully.');
    }

    /**
     * @param $id
     *
     * @return JsonResponse
     */
    public function status($id): JsonResponse
    {
        /** @var \App\Models\Testimonial $testimonial */
        $testimonial = $this->testimonialRepository->find($id);

        if (empty($testimonial)) {
            return $this->sendSuccess('Testimonial not found.');
        }
        $testimonial->update(['is_active' => ! $testimonial->is_active]);

        return $this->sendSuccess('Status updated successfully.');
    }
}
