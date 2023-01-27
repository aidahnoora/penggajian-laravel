<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Position;
use Exception;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('name')->get();

        return view('pages.employee.index', compact('employees'));
    }

    public function create()
    {
        $positions = Position::get();

        return view('pages.employee.create', compact('positions'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'position_id' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'work_start_date' => 'required',
                'bank_type' => 'required',
                'account_number' => 'required',
            ]);

            Employee::create([
                'name' => $request->name,
                'position_id' => $request->position_id,
                'gender' => $request->gender,
                'address' => $request->address,
                'phone' => $request->phone,
                'work_start_date' => $request->work_start_date,
                'bank_type' => $request->bank_type,
                'account_number' => $request->account_number,
            ]);

            return redirect('employees')->with('success', 'Berhasil menambah data!');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $employees = Employee::find($id);
        $positions = Position::get();

        return view('pages.employee.show', compact('employees', 'positions'));
    }

    public function edit($id)
    {
        $employees = Employee::find($id);
        $positions = Position::get();

        return view('pages.employee.edit', compact('employees', 'positions'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'position_id' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'work_start_date' => 'required',
                'bank_type' => 'required',
                'account_number' => 'required',
            ]);

            $post = Employee::findorfail($id);

            $post_data = [
                'name' => $request->name,
                'position_id' => $request->position_id,
                'gender' => $request->gender,
                'address' => $request->address,
                'phone' => $request->phone,
                'work_start_date' => $request->work_start_date,
                'bank_type' => $request->bank_type,
                'account_number' => $request->account_number,
                'loan_id' => $post->id,
            ];

            $post->update($post_data);

            return redirect('employees')->with('success', 'Data berhasil diperbarui!');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $employees = Employee::find($id);
        $employees->delete();

        return redirect('employees')->with('success', 'Data berhasil dihapus!');
    }
}
