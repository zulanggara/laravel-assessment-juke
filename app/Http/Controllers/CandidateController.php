<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\DataTables\CandidateDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CandidateDataTable $dataTable)
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
    public function store(StoreCandidateRequest $request, Candidate $candidate)
    {
        $request->validated();
        $candidate->create($request->all());

        return redirect()->route('candidate.index')
            ->with('success', 'Candidate created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        return $candidate->all();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate, $id)
    {
        return view('dashboard.edit', [
            'data_candidate' => $candidate->where('candidate_id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        $request->validated();
        $candidate->where('candidate_id', $request->candidate_id)->update([
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'full_name' => $request->full_name,
            'pob' => $request->pob,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'year_exp' => $request->year_exp,
            'last_salary' => $request->last_salary,
        ]);

        return redirect()->route('candidate.index')
            ->with('success', 'Candidate updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Candidate $candidate)
    {
        DB::beginTransaction();
        try {
            $candidate->where('candidate_id', $request->id)->delete();
            DB::commit();
            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
        // return redirect()->route('candidate.index')
        //     ->with('success', 'Candidate deleted!');
        // $candidate->where('candidate_id', $id)->delete();

    }
}
