<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    //

    public function getUID($email) {

        $user = User::where('email', $email)->first();
        return $user ? $user->id : null;

    }

    public function hasDetails($id) {

        return Patient::where('user_id', $id)->exists();

    }

    public static function landing($email) {

        $user_id = self::getUID($email);
        $exists = self::hasDetails($user_id);

        if ($exists) {
            return view("patient_landing");
        } else {
            return view("landing");
        }

    }

    public function addPatientDetails(Request $request) {

        $user_id = User::where('email', $request->input('user'))->first()->value('id');
        if (!$user_id) return back()->with('error', "User doesn't exist");

        $patient = new Patient();
        $patient->first_name = $request->input('first_name');
        $patient->last_name = $request->input('last_name');
        $patient->dob = $request->input('dob');
        $patient->gender = $request->input('gender');
        $patient->phone_no = $request->input('phone');
        $patient->next_of_kin_phone_no = $request->input('next_of_kin_phone');
        $patient->user_id = $user_id;
        $patient->save();

    }
}
