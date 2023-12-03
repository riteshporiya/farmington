<?php

namespace App\Http\Controllers;

use App\DataTables\InquiryDataTable;
use App\Models\Inquiry;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class InquiryController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     *
     * @throws \Exception
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new InquiryDataTable())->get())->make(true);
        }

        return view('inquires.index');
    }

    /**
     * Remove the specified Inquiry from storage.
     *
     * @param Inquiry $inquiry
     *
     * @return JsonResponse
     * @throws Exception
     *
     */
    public function destroy(Inquiry $inquiry): JsonResponse
    {
        $inquiry->delete();

        return $this->sendSuccess('Inquiry deleted successfully.');
    }

    /**
     * @param $id
     *
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $inquiries = Inquiry::find($id);

        if (empty($inquiries)) {
            return $this->sendSuccess('Inquiries not found.');
        }

        return $this->sendResponse($inquiries, 'Inquiries retrieved successfully.');
    }
}
