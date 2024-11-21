<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{


    protected $employee;
    public function __construct()
    {

        $this->employee = new Employee();
    }


    public function index()
    {
        $response['employees'] = $this->employee->all();
        return view('pages.index')->with($response);
    }

    

    public function store(Request $request)
    {
        try {
            $this->employee->create($request->all());
            return redirect()->back()->with('success', 'Employee created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create employee!');
        }
    }


    public function show(string $id)
    {

    }


    public function edit(string $id)
    {
        $response['employee'] = $this->employee->find($id);
        return view('pages.edit')->with($response);
    }


    public function update(Request $request, string $id)
    {
        try {
            $employee = $this->employee->find($id);
            $employee->update($request->all());
            return redirect('employee')->with('success', 'Employee updated successfully!');
        } catch (\Exception $e) {
            return redirect('employee')->with('error', 'Failed to update employee.');
        }
    }


    public function destroy(string $id)
    {
        try {
            $employee = $this->employee->find($id);
            $employee->delete();
            return redirect('employee')->with('success', 'Employee deleted successfully!');
        } catch (\Exception $e) {
            return redirect('employee')->with('error', 'Failed to delete employee.');
        }
    }
}
