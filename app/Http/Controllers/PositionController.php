<?php

namespace App\Http\Controllers;

use App\Position;
use Exception;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(Request $request)
    {
        $positions = Position::orderBy('created_at', 'DESC')->get();

        return view('pages.position.index', compact('positions'));
    }

    public function create ()
    {
        return view('pages.position.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'salary' => 'required',
                'transport_allowance' => 'required',
                'meal_allowance' => 'required',
            ]);

            Position::create([
                'name' => $request->name,
                'salary' => $request->salary,
                'transport_allowance' => $request->transport_allowance,
                'meal_allowance' => $request->meal_allowance,
            ]);

            return redirect('positions')->with(['success' => 'Berhasil menambah data!']);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit($id)
    {
        $positions = Position::find($id);

        return view('pages.position.edit', compact('positions'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'salary' => 'required',
                'transport_allowance' => 'required',
                'meal_allowance' => 'required',
            ]);

            $post = Position::findorfail($id);

            $post_data = [
                'name' => $request->name,
                'salary' => $request->salary,
                'transport_allowance' => $request->transport_allowance,
                'meal_allowance' => $request->meal_allowance,
            ];

            $post->update($post_data);

            return redirect('positions')->with(['success' => 'Data berhasil diperbarui!']);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $positions = Position::find($id);
        $positions->delete();

        return redirect('positions')->with(['success' => 'Data berhasil dihapus!']);
    }
}
