<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('pages.user.index', compact('users'));
    }

    public function create()
    {
        $employees = Employee::get();

        return view('pages.user.create', compact('employees'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'employee_id' => 'required',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $employee_id = $request->employee_id;

            $users = User::where('employee_id', $employee_id)->first();

            if($users == true) {
                return redirect('users')->with('warning', 'Akun sudah ada!');
            }

            User::create([
                'employee_id' => $request->employee_id,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect('users')->with('success', 'Berhasil menambah data!');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit($id)
    {
        $users = User::findorfail($id);
        $employees = Employee::get();

        return view('pages.user.edit', compact('users', 'employees'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'employee_id' => 'required',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);

            $post = User::findorfail($id);

            $post_data = [
                'employee_id' => $request->employee_id,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];

            $post->update($post_data);

            return redirect('users')->with('success', 'Data berhasil diperbarui!');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();

        return redirect('users')->with('success', 'Data berhasil dihapus!');
    }
}
