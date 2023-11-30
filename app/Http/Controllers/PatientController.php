<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    //

    public function getUID($email) {

        $results = DB::connection('mysql2')->select("SELECT id FROM chatapp.users WHERE uemail = '$email'");
        return (!empty($results)) ? $results[0]->id : null;

    }

    public function hasDetails($id) {

        return Patient::where('user_id', $id)->exists();

    }

    public static function landing(Request $request) {

        $email = $request->input('user');
        $user_id = self::getUID($email);
        $exists = self::hasDetails($user_id);
        $patient = Patient::where('id', $user_id)->first();

        return view("patient_info")->with('exists', $exists)->with('patient', $patient);
    }

    public function addPatientDetails(Request $request) {

        $email = $request->input('user');
        $user_id = User::where('email', $email)->first()->value('id');
        $exists = self::hasDetails($user_id);
        if (!$user_id) return back()->with('error', "User doesn't exist");

        if (!$exists) {
            $patient = new Patient();
            $patient->first_name = $request->input('first_name');
            $patient->last_name = $request->input('last_name');
            $patient->dob = $request->input('dob');
            $patient->gender = $request->input('gender');
            $patient->phone_no = $request->input('phone');
            $patient->next_of_kin_phone_no = $request->input('next_of_kin_phone');
            $patient->user_id = $user_id;
            $patient->allergies = $request->input('allergies');
            $patient->current_medication = $request->input('current_medication');
            $patient->conditions = $request->input('conditions');
            $patient->insurances = $request->input('insurances');
            $patient->save();
        } else {
            $patient = Patient::where('user_id', $user_id)->first();
            $patient->first_name = $request->input('first_name');
            $patient->last_name = $request->input('last_name');
            $patient->dob = $request->input('dob');
            $patient->gender = $request->input('gender');
            $patient->phone_no = $request->input('phone');
            $patient->next_of_kin_phone_no = $request->input('next_of_kin_phone');
            $patient->user_id = $user_id;
            $patient->allergies = $request->input('allergies');
            $patient->current_medication = $request->input('current_medication');
            $patient->conditions = $request->input('conditions');
            $patient->insurances = $request->input('insurances');
            $patient->save();
        }
        return back()->with('patient', $patient);


    }
}
