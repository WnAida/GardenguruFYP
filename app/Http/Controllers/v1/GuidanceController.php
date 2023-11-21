<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\GuidanceResource;
use App\Http\Resources\v1\GuidanceResources;
use App\Models\Guidance;
use App\Traits\ApiPaginatorTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GuidanceController extends Controller
{
    use ApiPaginatorTrait;

    public function index()
    {

        $take = request()->get('take', 1000);

        $guidance = Guidance::paginate($take);

        //$user = auth()->user();
        //$data = $user->patient->medications()->paginate($take);

        // dd($insight);
        return $this->return_paginated_api(true, Response::HTTP_OK, null, GuidanceResource::collection($guidance), null, $this->apiPaginator($guidance));
    }
}
