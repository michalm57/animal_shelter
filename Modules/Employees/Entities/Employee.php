<?php

namespace Modules\Employee\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Departments\Entities\Department;

class Employeee extends Model
{
    /**
     * @var string
     */
    protected $table = 'employees';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'department_id',
    ];

    /**
     * Establishes a relationship with the "Department" model.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    /**
     * Get all id's.
     *
     * @return array
     */
    public static function getIds(): array
    {
        return array_column(self::all()->toArray(), 'id');
    }
}
