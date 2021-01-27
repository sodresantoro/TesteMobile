<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;
use App\Traits\ApiResponser;
use Illuminate\Support\Str;

class VehicleController extends Controller
{
    use ApiResponser;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            return $this->successResponse(VehicleResource::collection(Vehicle::all()), 'Vehicle list', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(VehicleRequest $request)
    {
        try {
            $vehicle = Vehicle::create($this->formatData($request));
            return $this->successResponse(new VehicleResource($vehicle), 'Vehicle created', 201);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            return $this->successResponse(new VehicleResource(Vehicle::findOrFail($id)), 'Vehicle get', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(VehicleRequest $request, $id)
    {
        try {
            $update = (Vehicle::where('id', $id)->update($this->formatData($request))) ? true : false;
            return $this->successResponse($update, 'Vehicle updated', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $data = Vehicle::destroy($id);
            return $data ? $this->successResponse(true, 'Vehicle deleted', 200) : $this->errorResponse('Vehicle not deleted', 404);
        } catch (\Exception $exception) {
            return $this->exceptionResponse($exception->getMessage());
        }
    }

    /**
     * @param VehicleRequest $request
     * @return array
     */
    private function formatData(VehicleRequest $request)
    {
        return [
            'car_manufacturer' => Str::of($request->get('car_manufacturer'))->ucfirst(),
            'car_model' => Str::of($request->get('car_model'))->ucfirst(),
            'car_board' => Str::of($request->get('car_board'))->upper(),
        ];
    }
}
