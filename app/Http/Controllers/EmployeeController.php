<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'dob' => 'nullable|date',
            'salary' => 'nullable|numeric',
            'joining_date' => 'nullable|date',
            'relieving_date' => 'nullable|date',
            'contact_number' => 'nullable',
            'status' => 'nullable|in:active,inactive',
        ]);

        Employee::create($validatedData);

        return redirect('/employees')->with('success', 'Employee created successfully!');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'dob' => 'nullable|date',
            'salary' => 'nullable|numeric',
            'joining_date' => 'nullable|date',
            'relieving_date' => 'nullable|date',
            'contact_number' => 'nullable',
            'status' => 'nullable|in:active,inactive',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($validatedData);

        return redirect('/employees')->with('success', 'Employee updated successfully!');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect('/employees')->with('success', 'Employee deleted successfully!');
    }
}
