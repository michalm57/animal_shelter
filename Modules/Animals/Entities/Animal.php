<?php

namespace Modules\Animal\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Departments\Entities\Employeee;
use Modules\Tasks\Enums\AnimalTypeEnum;

class Animal extends Model
{
    /**
     * @var string
     */
    protected $table = 'animals';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'animal_type',
        'employee_id',
    ];

    /**
     * Establishes a relationship with the "Employeee" model.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employeee::class, 'employee_id', 'id');
    }

    /**
     * Get the values of the AnimalTypeEnum.
     *
     * @return array
     */
    public static function getEnumValues(): array
    {
        return array_column(AnimalTypeEnum::cases(), 'value');
    }

    /**
     * Get the names of the AnimalTypeEnum.
     *
     * @return array
     */
    public static function getEnumNames(): array
    {
        return array_column(AnimalTypeEnum::cases(), 'name');
    }
}
