<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\ScheduleStoreRequest;
use App\Http\Requests\v1\ScheduleUpdateRequest;
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

    //STORE
    public function store(ScheduleStoreRequest $request)
    {
        $validated = $request->validated();


            // if ($request->hasFile('photo_path')){
            //     $photoPath = $request->file('photo_path')->store('', 'schedule');
            //     $validated['photo_path'] = $photoPath;
            // }

            // $validated['user_id'] = $validated['users']['id'];

            $schedule = Auth::user()->schedules()->create($validated);

            return $this->return_api(true, Response::HTTP_CREATED, null, null, null);
    }

    //UPDATE
    public function update(ScheduleUpdateRequest $request,Schedule $schedule)
    {
        $validated=$request->validated();
        $id=Schedule::find($schedule->id);
        // dd($id);
        $schedule=$id->update($validated);

        return $this->return_api(true, Response::HTTP_CREATED, null, null, null);

    }

    //show
    public function show(Schedule $schedule)
    {
        $data = Schedule::find($schedule->id);
        return $this->return_api(true, Response::HTTP_OK, null, new ScheduleResource($data), null, null);
    }
}
