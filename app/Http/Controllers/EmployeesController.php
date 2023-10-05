<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeesDataTable;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class EmployeesController extends Controller
{

    public function index(EmployeesDataTable $dataTables)
    {
        return $dataTables->render('Admin.employees.index');
    }


    public function create()
    {
        $company = Company::all();
        return view('Admin.employees.create', compact('company'));
    }


    public function store(Request $request)
    {
        // Data Validate
        $request->validate([
            'first_name' => ['required', 'max:20'],
            'last_name' => ['required', 'max:20'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'company' => ['required', 'max:255'],
        ]);

        Employee::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'company_id' => $request->input('company'),
        ]);

        Alert::success('success', 'Employee Added Successfully');
        return redirect()->route('Employee.index');
    }


    public function show(Employee $employees)
    {
        //
    }


    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('Admin.employees.edit', compact('employee'));
    }


    public function update(Request $request, $id)
    {
        // Data Validate
        $request->validate([
            'first_name' => ['max:20'],
            'last_name' => ['max:20'],
            'email' => ['email'],
        ]);

        $data = $request->except(['_token', '_method']);

        Employee::where('id', $id)->update($data);

        Alert::success(
            'success',
            'Employee Updated Successfully'
        );
        return redirect(route('Employee.index'));
    }


    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
