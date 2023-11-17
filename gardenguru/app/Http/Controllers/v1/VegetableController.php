<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\VegetableResource;
use App\Models\Vegetable;
use App\Traits\ApiPaginatorTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VegetableController extends Controller
{
    use ApiPaginatorTrait;

    
    public function index()
    {
        $take = request()->get('take', 1000);

        $data = Vegetable::paginate($take);

        // $user = auth()->user();
        // $data = $user->vegetables->paginate($take);
        // dd($data);

        return $this->return_paginated_api(true, Response::HTTP_OK, null, VegetableResource::collection($data), null, $this->apiPaginator($data));
    }

    public function show(Vegetable $vegetable)
    {
        $data = Vegetable::find($vegetable->id);
        return $this->return_api(true, Response::HTTP_OK, null, new VegetableResource($data), null, null);
    }
}
