<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employees";
    protected $primaryKey = "id";
    protected $fillable = [
    	'name',
        'position_id',
        'gender',
        'address',
        'phone',
        'work_start_date',
        'bank_type',
        'account_number',
        'loan',
    ];

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    // public function loans()
    // {
    //     return $this->belongsToMany(Loan::class);
    // }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }
}
