<?php

namespace App\Http\Controllers\Admin\Contestant;

use App\Contestant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Contestant\AdminStoreContestantRequest;
use App\Payment;
use App\Services\Contestant\ContestantService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminContestantController extends Controller
{
    private $contestant;
    public function __construct(ContestantService $contestant){
        $this->middleware('auth:web');
        $this->contestant = $contestant;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        try {
            $contestants = $this->contestant->contestantWithRelations()
                ->latest()->paginate(10);
            return response()->json([
                'success' => true,
                'contestants' => $contestants,
                'total' => $contestants->total(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AdminStoreContestantRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $contestant = $this->contestant->storeContestant($request);
            return response()->json([
                'success' => true,
                'contestant' => $contestant
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $contestants = $this->contestant->searchContestant($request);
            return response()->json([
                'success' => true,
                'contestants' => $contestants['contestants'],
                'total' => $contestants['total'],
                'search_values' => $contestants['search_values'],
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function populate(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $contestant = $this->contestant->contestantById($id);
            return response()->json([
                'success' => true,
                'contestant' => $contestant
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $contestant = $this->contestant->updateContestant($request, $id);
            return response()->json([
                'success' => true,
                'contestant' => $contestant,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $this->contestant->deleteContestant($id);
            return response()->json([
                'success' => true,
                'message' => 'deleted'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

}
