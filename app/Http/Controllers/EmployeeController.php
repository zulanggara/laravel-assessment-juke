<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\DataTables\EmployeeDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(EmployeeDataTable $dataTable)
    {
        return $dataTable->render('dashboard.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request, Employee $employee)
    {
        $request->validated();
        $employee->create($request->all());

        return redirect()->route('employee.index')
            ->with('success', 'Employee created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return $employee->all();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee, $id)
    {
        return view('dashboard.edit', [
            'data_employee' => $employee->where('employee_id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $request->validated();
        $employee->where('employee_id', $request->employee_id)->update([
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'full_name' => $request->full_name,
            'pob' => $request->pob,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'year_exp' => $request->year_exp,
            'last_salary' => $request->last_salary,
        ]);

        return redirect()->route('employee.index')
            ->with('success', 'Employee updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Employee $employee)
    {
        DB::beginTransaction();
        try {
            $employee->where('employee_id', $request->id)->delete();
            DB::commit();
            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
        // return redirect()->route('employee.index')
        //     ->with('success', 'Employee deleted!');
        // $employee->where('employee_id', $id)->delete();

    }
}
