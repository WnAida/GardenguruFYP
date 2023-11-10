<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\ScheduleStoreRequest;
use App\Http\Resources\v1\ScheduleResource;
use App\Models\Schedule;
use App\Traits\ApiPaginatorTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    use ApiPaginatorTrait;
    public function index()
    {
        $take = request()->get('take', 1000);
        $user = auth()->user();
        $data = Schedule::where('user_id', $user->id)->paginate();

        return $this->return_paginated_api(true, Response::HTTP_OK, null, ScheduleResource::collection($data), null, $this->apiPaginator($data));
    }

    public function store(ScheduleStoreRequest $request)
    {
        $validated = $request->validated();

        try {
            // if ($request->hasFile('photo_path')){
            //     $photoPath = $request->file('photo_path')->store('', 'schedule');
            //     $validated['photo_path'] = $photoPath;
            // }

            // $validated['user_id'] = $validated['users']['id'];

            $schedule = Auth::user()->schedules()->create($validated);

            return $this->return_api(true, Response::HTTP_CREATED, null, null, null);
        } catch (Exception $e) {
            error_log($e);
            return $this->return_api(false, Response::HTTP_INTERNAL_SERVER_ERROR, null, null, null);
        }
    }

    public function update()
    {
    }
}
