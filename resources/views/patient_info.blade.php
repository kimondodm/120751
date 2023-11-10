
{{-- {{ "Patient Info" }} --}}

@extends('layouts.app')

<div class="container">
    <h1>User Registration</h1>
    <form action="{{ route('patient.add') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" required>
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
            <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="form-group">
            <label for="next_of_kin_phone">Next of Kin Phone No.</label>
            <input type="tel" class="form-control" id="next_of_kin_phone" name="next_of_kin_phone" required>
        </div><br>

        @foreach(request()->query() as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

