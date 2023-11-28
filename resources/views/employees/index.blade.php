<!-- resources/views/employees/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Employee List</h1>
    
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>DOB</th>
                <th>Salary</th>
                <th>Joining Date</th>
                <th>Relieving Date</th>
                <th>Contact Number</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->dob }}</td>
                    <td>{{ $employee->salary }}</td>
                    <td>{{ $employee->joining_date }}</td>
                    <td>{{ $employee->relieving_date }}</td>
                    <td>{{ $employee->contact_number }}</td>
                    <td>{{ $employee->status }}</td>
                    <td>
                        <a href="{{ url('/employees/'.$employee->id.'/edit') }}">Edit</a>
                        <form action="{{ url('/employees/'.$employee->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <a href="{{ url('/employees/create') }}">Add Employee</a>
@endsection
