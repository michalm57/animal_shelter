<?php

namespace Modules\Departments\Entities;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * @var string
     */
    protected $table = 'departments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];
}
