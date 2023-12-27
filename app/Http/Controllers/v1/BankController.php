<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\BankResource;
use App\Models\Bank;
use App\Traits\ApiPaginatorTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BankController extends Controller
{
    use ApiPaginatorTrait;
    public function index()
    {
        $take = request()->get('take', 1000);

        $data = Bank::paginate($take);
        return $this->return_paginated_api(true, Response::HTTP_OK, null, BankResource::collection($data), null, $this->apiPaginator($data));
    }
}
