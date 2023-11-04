<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\PestResource;
use App\Models\Pest;
use App\Traits\ApiPaginatorTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PestController extends Controller
{
    use ApiPaginatorTrait;

    public function index()
    {
        $take = request()->get('take', 1000);

        $pest = Pest::paginate($take);

        //$user = auth()->user();
        //$data = $user->patient->medications()->paginate($take);

        // dd($insight);
        return $this->return_paginated_api(true, Response::HTTP_OK, null, PestResource::collection($pest), null, $this->apiPaginator($pest));
    }
}
