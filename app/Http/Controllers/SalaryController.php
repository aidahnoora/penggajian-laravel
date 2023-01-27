<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Loan;
use App\Salary;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SalaryController extends Controller
{
    public function index()
    {
        // if(request()->start_date || request()->end_date) {
        //     $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
        //     $end_date = Carbon::parse(request()->end_date)->toDateTimeString();

        //     $salaries = Salary::with('employee')
        //         ->whereBetween('payroll_date', [$start_date, $end_date])->get();
        // } else {
        //     $salaries = Salary::with('employee')->get();
        // }

        if(request()->month || request()->year) {
            $month = request()->month;
            $year = request()->year;

            $salaries = Salary::with('employee')->where('month', $month)->where('year', $year)->get();
        } else {
            $salaries = Salary::with('employee')->get();
        }

        return view('pages.salary.index', compact('salaries'));
    }

    public function create()
    {
        $employees = Employee::get();

        return view('pages.salary.create', compact('employees'));
    }

    public function store(Request $request)
    {
        try {
            $month = $request->month;
            $year = $request->year;

            $employee_id = $request->employee_id;

            $salary_cut = $request->salary_cut;
            $remaining_loan = $request->remaining_loan;
            $nominal = $request->nominal;
            $loan = $request->loan;

            $salaries = Salary::where('month', $month)->where('year', $year)->first();

            if($salaries == true) {
                return redirect('salaries')->with('warning', 'Gaji bulan tahun ini sudah diinput!');
            }

            foreach ($employee_id as $key => $value) {
                Salary::insert([
                    'employee_id' => $value,
                    'month' => $month,
                    'year' => $year,
                    'salary_cut' => $salary_cut[$key],
                    'remaining_loan' => $remaining_loan[$key],
                    'nominal' => $nominal[$key],
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now(),
                ]);

                $post = [
                    'loan' => $loan[$key],
                    'updated_at'=> Carbon::now(),
                ];

                DB::table('employees')->where('id', $value)->update($post);
            }

            return redirect('salaries')->with('success', 'Gaji berhasil dibayarkan!');

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
