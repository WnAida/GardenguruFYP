<?php

namespace App\Http\Controllers\v1;

use App\Actions\Fortify\PasswordValidationRules;
use App\Enums\RegistrationStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\ProfileUpdateRequest;
use App\Http\Resources\v1\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Profiler\Profile;

class AuthController extends Controller
{
    use PasswordValidationRules;

    public function login(Request $request): JsonResponse
    {
        // Validate email and password
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Return errors if validation failed
        if ($validator->fails()) {
            return $this->return_api(false, Response::HTTP_UNPROCESSABLE_ENTITY, null, null, $validator->errors());
        }

        // If login successfull
        if (Auth::attempt($validator->validated(), true)) {
            // Get user using auth
            $user = Auth::user();
            $userTemp = new User();
            $userTemp->email = $user->email;

            // //check if user is lecturer
            // if ($user->hasRole('lecturer')) {

                // If user email already verified
                if ($user->hasVerifiedEmail()) {
                    // Already approve by admin
                    if ($user->registration_status  == (string) RegistrationStatusEnum::Approved()) {
                        // Create access token
                        $user->accessToken = $user->createToken('auth-token')->plainTextToken;

                        // Return response with user resource model
                        return $this->return_api(true, Response::HTTP_OK, null, new UserResource($user), null);
                    } else if ($user->registration_status == (string) RegistrationStatusEnum::Rejected()) {
                        return $this->return_api(false, Response::HTTP_UNAUTHORIZED, __("Your account registration has been rejected, please contact the admin."), $userTemp, null);
                    } else {
                        return $this->return_api(false, Response::HTTP_UNAUTHORIZED, __("Your account registration has not yet been approved."), $userTemp, null);
                    }
                } else {
                    // Email not verified
                    return $this->return_api(false, Response::HTTP_FORBIDDEN, trans("auth.email_not_verified"), $userTemp, null);
                }
            // } else {

            //     return $this->return_api(false, Response::HTTP_UNAUTHORIZED, "Unauthorized. Please Contact Admin.", null, null);
            // }
        }
        return $this->return_api(false, Response::HTTP_UNAUTHORIZED, trans("auth.failed"), null, null);
    }

    public function logout()
    {
        // Revoke current user token
        $user = Auth::user()->currentAccessToken()->delete();

        return $this->return_api(true, Response::HTTP_OK, null, null, null);
    }

    public function me()
    {
        $user = Auth::user();
        if ($user != null) {
            return $this->return_api(true, Response::HTTP_OK, null, new UserResource($user), null);
        } else {
            return $this->return_api(false, Response::HTTP_UNAUTHORIZED, null, null, null);
        }
    }

    public function register(Request $request)
    {
        // Validation logic for registration inputs
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'phone_number' => 'nullable|string',
            'address' => 'nullable|string',
            'profile_photo_path' => 'nullable|string',
            'expertise' => 'nullable|string',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'profile_photo_path' => $request->input('profile_photo_path'),
            'expertise' => $request->input('expertise'),
        ]);



        // Generate token for the registered user
        $token = $user->createToken('registration-token')->plainTextToken;

        // Return a response with the user and token information
        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    //UPDATE
    public function update(ProfileUpdateRequest $request,User $user)
    {
        $validated=$request->validated();
        $id=User::find($user->id);
        // dd($id);
        $user=$id->update($validated);
        return $this->return_api(true, Response::HTTP_CREATED, null, null, null);

    }
}
