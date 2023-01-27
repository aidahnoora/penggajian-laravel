<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = "salaries";
    protected $primaryKey = "id";
    protected $fillable = [
        'employee_id',
        'month',
        'year',
        'salary_cut',
        'remaining_loan',
        'nominal'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
