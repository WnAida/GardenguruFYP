<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ScheduleResource;
use App\Models\Schedule;
use App\Traits\ApiPaginatorTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
}
