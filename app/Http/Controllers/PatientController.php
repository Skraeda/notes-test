<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function getPatientInfo($id)
    {
        $response = Patient::with(['notes', 'notes_history'])->where('id', $id)->get();

        if (!empty($response)) {
            return response()->json(['patient' => $response], 200);
        }else
            return response()->json(['message' => 'Patient with notes not found', 'code' => 'NO_STORIES'], 404);
    }
}
