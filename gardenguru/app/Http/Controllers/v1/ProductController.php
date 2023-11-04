<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ProductResource;
use App\Models\Product;
use App\Traits\ApiPaginatorTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    use ApiPaginatorTrait;
    public function index()
    {
        $take = request()->get('take', 1000);

        $data = Product::paginate($take);

        // $user = auth()->user();
        // $data = $user->vegetables->paginate($take);
        // dd($data);

        return $this->return_paginated_api(true, Response::HTTP_OK, null, ProductResource::collection($data), null, $this->apiPaginator($data));
    }
}
