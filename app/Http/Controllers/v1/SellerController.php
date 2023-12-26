<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\SellerStoreRequest;
use App\Http\Requests\v1\UserStoreRequest;
use App\Http\Resources\v1\UserResource;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;

class SellerController extends Controller
{
    public function registerseller(SellerStoreRequest $request)
    {
        $validated = $request->validated();

        $seller = Seller::create([
            'user_id'=>auth()->user()->id,
            'account_no'=>$validated['account_no'],
            'bank_id' => $validated['banks']['id'],
        ]);
        return $this->return_api(true, Response::HTTP_OK, null, null, null, null);
    }
}
