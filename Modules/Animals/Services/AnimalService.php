<?php

namespace Modules\Animals\Services;

use Illuminate\Support\Facades\Auth;
use Modules\Animal\Entities\Animal;

class AnimalService
{
    /**
     * Get all animals.
     *
     * @return \Illuminate\Database\Eloquent\Collection The collection of animals.
     */
    public function getAll()
    {
        return Animal::all();
    }

    /**
     * Create a new animal.
     *
     * @param array $data The data for the new animal.
     * @return Animal The created animal instance.
     */
    public function create($data)
    {
        return Animal::create($data);
    }

    /**
     * Update the specified animal.
     *
     * @param int $id The ID of the animal.
     * @param array $data The updated data for the animal.
     * @return bool True if the update was successful, false otherwise.
     */
    public function update($id, $data)
    {
        $animal = Animal::find($id);

        if ($animal) {
            return $animal->update($data);
        }

        return false;
    }

    /**
     * Delete the specified animal.
     *
     * @param int $id The ID of the animal.
     * @return bool True if the deletion was successful, false otherwise.
     */
    public function delete($id)
    {
        $animal = Animal::find($id);

        if ($animal) {
            return $animal->delete();
        }

        return false;
    }
}