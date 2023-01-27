<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = "positions";
    protected $primaryKey = "id";
    protected $fillable = [
    	'name',
        'salary',
        'transport_allowance',
        'meal_allowance',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
