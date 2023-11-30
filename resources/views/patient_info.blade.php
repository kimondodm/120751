
{{-- {{ "Patient Info" }} --}}

@php
    
@endphp

@extends('layouts.app')

@section('content')

<div class="container">
    <h1>User Registration</h1>
    <form action="{{ route('patient.add') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required value="{{ isset($patient) ? $patient->first_name : '' }}">
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required value="{{ isset($patient) ? $patient->last_name : '' }}">
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" required value="{{ isset($patient) ? $patient->dob : '' }}">
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="tel" class="form-control" id="phone" name="phone" required value="{{ isset($patient) ? $patient->phone_no : '' }}">
        </div>

        <div class="form-group">
            <label for="next_of_kin_phone">Next of Kin Phone No.</label>
            <input type="tel" class="form-control" id="next_of_kin_phone" name="next_of_kin_phone" required value="{{ isset($patient) ? $patient->next_of_kin_phone_no : '' }}">
        </div><br>

        <div>
            <h1>User Info</h1>

            <div class="form-group">
                <label for="last_name">Allergies</label>
                <textarea rows="10" class="form-control" id="allergies" name="allergies" >{{ isset($patient) ? $patient->allergies : '' }}</textarea>
            </div>

            <div class="form-group">
                <label for="last_name">Current Medication</label>
                <textarea rows="10" class="form-control" id="current_medication" name="current_medication" >{{ isset($patient) ? $patient->current_medication : '' }}</textarea>
            </div>

            <div class="form-group">
                <label for="last_name">Pre-existing Conditions</label>
                <textarea rows="10" class="form-control" id="conditions" name="conditions" >{{ isset($patient) ? $patient->conditions : '' }}</textarea>
            </div>

            <div class="form-group">
                <label for="last_name">Insurance Providers</label>
                <textarea rows="10" class="form-control" id="insurances" name="insurances" >{{ isset($patient) ? $patient->insurances : '' }}</textarea>
            </div><br>
        </div>

        @foreach(request()->query() as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection