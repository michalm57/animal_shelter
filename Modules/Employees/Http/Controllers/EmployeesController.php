<?php

namespace Modules\Employees\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Routing\Controller;

class EmployeesController extends Controller
{

    private $employeeService;

    /**
     * EmployeesController constructor.
     * 
     * @param EmployeeService $employeeService The employee service instance.
     */
    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    /**
     * Associates an employee with an animal.
     * 
     * @param Request $request The HTTP request object.
     * @return JsonResponse The JSON response indicating the status of the association.
     */
    public function associateEmployeWithAnimal(Request $request)
    {
        $animalId = $request->animal_id;
        $employeeId = $request->employee_id;

        try {
            $this->employeeService->associateWithAnimal($employeeId, $animalId);

            return new JsonResponse(
                ['status' => 'success', 'message' => 'Employee has been associated with animal.'],
                Response::HTTP_OK
            );
        } catch (\Exception $exception) {
            report($exception);

            return new JsonResponse(
                ['status' => 'error', 'message' => 'Unable to associate employee with animal.'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
}
