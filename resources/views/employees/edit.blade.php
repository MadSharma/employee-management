<!-- resources/views/employees/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Employee</h1>
    
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ url('/employees/'.$employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $employee->name }}" required>
        
        <label for="dob">DOB:</label>
        <input type="date" name="dob" value="{{ $employee->dob }}">

        <label for="salary">Salary:</label>
        <input type="number" name="salary" value="{{ $employee->salary }}">

        <label for="joining_date">Joining Date:</label>
        <input type="date" name="joining_date" value="{{ $employee->joining_date }}">

        <label for="relieving_date">Relieving Date:</label>
        <input type="date" name="relieving_date" value="{{ $employee->relieving_date }}">

        <label for="contact_number">Contact Number:</label>
        <input type="text" name="contact_number" value="{{ $employee->contact_number }}">

        <label for="status">Status:</label>
        <select name="status">
            <option value="active" {{ $employee->status == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ $employee->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>

        <button type="submit">Update</button>
    </form>
@endsection
