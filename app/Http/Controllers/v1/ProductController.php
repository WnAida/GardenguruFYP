<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\ProductStoreRequest;
use App\Http\Requests\v1\ProductUpdateRequest;
use App\Http\Resources\v1\ProductResource;
use App\Models\Product;
use App\Traits\ApiPaginatorTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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

    public function show(Product $product)
    {
        $data = Product::find($product->id);
        return $this->return_api(true, Response::HTTP_OK, null, new ProductResource($data), null, null);
    }

    //STORE
    public function store(ProductStoreRequest $request)
    {
        $validated = $request->validated();


            // if ($request->hasFile('photo_path')){
            //     $photoPath = $request->file('photo_path')->store('', 'schedule');
            //     $validated['photo_path'] = $photoPath;
            // }

            // $validated['user_id'] = $validated['users']['id'];

            $product = Auth::user()->products()->create($validated);

            return $this->return_api(true, Response::HTTP_CREATED, null, null, null);
    }

    //UPDATE
    public function update(ProductUpdateRequest $request,Product $product)
    {
        $validated=$request->validated();
        $id=Product::find($product->id);
        // dd($id);
        $product=$id->update($validated);
        return $this->return_api(true, Response::HTTP_CREATED, null, null, null);

    }
}

