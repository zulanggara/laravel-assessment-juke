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
            'data_employee' => $employee->where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $request->validated();
        $employee->where('id', $request->id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'email_address' => $request->email_address,
            'province_address' => $request->province_address,
            'city_address' => $request->city_address,
            'street_address' => $request->street_address,
            'zip_code' => $request->zip_code,
            'ktp_number' => $request->ktp_number,
            'bank_account' => $request->bank_account,
            'bank_account_number' => $request->bank_account_number,

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
            $employee->where('id', $request->id)->delete();
            DB::commit();
            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
        // return redirect()->route('employee.index')
        //     ->with('success', 'Employee deleted!');
        // $employee->where('id', $id)->delete();

    }
}
