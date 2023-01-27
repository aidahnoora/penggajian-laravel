<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Salary;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{
    public function index ()
    {
        return view('pages.report.index');
    }

    public function salaryReport($month, $year)
    {
        if(request()->month || request()->year) {
            $month = request()->month;
            $year = request()->year;

            $salaries = Salary::with('employee')->where('month', $month)->where('year', $year)->get();
        } else {
            $salaries = Salary::with('employee')->get();
        }

        // dd($salaries);

        $now = Carbon::now()->format('m-d-Y');

        return view('pages.report.report', compact('salaries', 'now'));
    }

    public function slipIndex(Request $request)
    {
        $employees = Employee::all();
        $salaries = Salary::query();

        if($request->employee_id) {
            $employee_id = $request->employee_id;
            $salaries->whereHas('employee', function ($query) use ($employee_id) {
                $query->where('employee_id', $employee_id);
                }
            );
        }

        if(request()->month || request()->year) {
            $month = request()->month;
            $year = request()->year;

            $salaries = Salary::with('employee')->where('month', $month)->where('year', $year);
        }

        $salaries = $salaries->orderBy('month', 'DESC')->get();

        return view('pages.slip.index', compact('employees', 'salaries'));
    }

    public function slipDownload ($id)
    {
        $salary = Salary::find($id);

        return view('pages.slip.slip', compact('salary'));
    }

}
