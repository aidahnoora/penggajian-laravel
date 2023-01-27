<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Loan;
use Exception;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $employees = Employee::get();

        return view('pages.loan.index', compact('employees'));
    }

    public function edit($id)
    {
        $employees = Employee::findorfail($id);

        return view('pages.loan.edit', compact('employees'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'loan' => 'required',
            ]);

            $post = Employee::find($id);

            $post_data = [
                'loan' => $request->loan,
            ];

            $post->update($post_data);

            return redirect('loans')->with('success', 'Berhasil mengajukan pinjaman!');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
