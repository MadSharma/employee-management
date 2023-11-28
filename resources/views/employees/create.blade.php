<!-- resources/views/employees/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Create Employee</h1>
    
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ url('/employees') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        
        <label for="dob">DOB:</label>
        <input type="date" name="dob">

        <label for="salary">Salary:</label>
        <input type="number" name="salary">

        <label for="joining_date">Joining Date:</label>
        <input type="date" name="joining_date">

        <label for="relieving_date">Relieving Date:</label>
        <input type="date" name="relieving_date">

        <label for="contact_number">Contact Number:</label>
        <input type="text" name="contact_number">

        <label for="status">Status:</label>
        <select name="status">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>

        <button type="submit">Save</button>
    </form>
@endsection
