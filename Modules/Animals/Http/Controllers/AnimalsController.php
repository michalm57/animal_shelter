<?php

namespace Modules\Animals\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Animals\Resources\AnimalResource;
use Modules\Animals\Services\AnimalService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Modules\Animals\Http\Requests\AnimalRequest;

class AnimalsController extends Controller
{
    private $animalService;

    /**
     * AnimalsController constructor.
     * 
     * @param AnimalService $animalService The animal service instance.
     */
    public function __construct(AnimalService $animalService)
    {
        $this->animalService = $animalService;
    }

    /**
     * Display a listing of animals.
     * 
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json([
            'data' => AnimalResource::collection($this->animalService->getAll()),
        ]);
    }

    /**
     * Store a newly created animal in storage.
     * 
     * @param AnimalRequest $request The HTTP request object.
     * @return JsonResponse
     */
    public function store(AnimalRequest $request)
    {
        try {
            $this->animalService->create($request->validated());

            return new JsonResponse(
                ['status' => 'success', 'message' => 'Animal has been added successfully!'],
                Response::HTTP_OK
            );
        } catch (\Exception $exception) {
            report($exception);

            return new JsonResponse(
                ['status' => 'error', 'message' => 'Unable to add animal!'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }

    /**
     * Update the specified animal in storage.
     *
     * @param AnimalRequest $request The HTTP request object.
     * @param int $id The ID of the animal.
     * @return JsonResponse
     */
    public function update(AnimalRequest $request, $id)
    {
        try {
            $this->animalService->update($id, $request->validated());

            return new JsonResponse(
                ['status' => 'success', 'message' => 'Animal has been updated successfully!'],
                Response::HTTP_OK
            );
        } catch (\Exception $exception) {
            report($exception);

            return new JsonResponse(
                ['status' => 'error', 'message' => 'Unable to update animal!'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }

    /**
     * Remove the specified animal from storage.
     *
     * @param int $id The ID of the animal.
     * @return JsonResponse
     */
    public function destroy($id)
    {
        try {
            $this->animalService->delete($id);

            return new JsonResponse(
                ['status' => 'success', 'message' => 'Animal has been deleted successfully!'],
                Response::HTTP_OK
            );
        } catch (\Exception $exception) {
            report($exception);

            return new JsonResponse(
                ['status' => 'error', 'message' => 'Unable to delete animal!'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
}
