<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Position;
use App\Salary;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $employees = Employee::count();
        $users = User::count();
        $positions = Position::count();
        $loans = Employee::where('loan', '!=', 0)->count();

        if (Auth::user()->role == 'pegawai') {
            return view('home-employee');
        } else {
            return view('home', compact('employees', 'users', 'positions', 'loans'));
        }
    }

    public function showSalary()
    {
        if(request()->month || request()->year) {
            $month = request()->month;
            $year = request()->year;

            $salaries = Salary::with('employee')->where('month', $month)->where('year', $year)
                ->where('employee_id', Auth::user()->employee_id)
                ->get();
        } else {
            $salaries = Salary::with('employee')->where('employee_id', Auth::user()->employee_id)->get();
        }

        return view('employee.index', compact('salaries'));
    }

    public function slipDownload ($id)
    {
        $salary = Salary::find($id);

        return view('pages.slip.slip', compact('salary'));
    }
}
