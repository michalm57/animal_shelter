<?php

namespace Modules\Animals\Services;

use Modules\Animal\Entities\Animal;
use Modules\Employee\Entities\Employeee;

class EmployeeService
{
    /**
     * Associates an employee with an animal.
     * 
     * @param int $employeeId The ID of the employee.
     * @param int $animalId The ID of the animal.
     * @return void
     */
    public function associateWithAnimal($employeeId, $animalId)
    {
        $employee = Employeee::find($employeeId);
        $animal = Animal::find($animalId);

        return $animal->associate($employee);
    }
}
