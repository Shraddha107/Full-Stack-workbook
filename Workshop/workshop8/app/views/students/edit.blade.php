@extends('layouts.master')

@section('title', 'Edit Student')

@section('content')

    @if(isset($error))
        <p style="color:red;">{{ $error }}</p>
    @endif

    <form action="index.php?action=update&id={{ $student['id'] }}" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name" value="{{ $student['name'] }}" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" value="{{ $student['email'] }}" required><br><br>

        <label for="course">Course:</label><br>
        <input type="text" name="course" id="course" value="{{ $student['course'] }}" required><br><br>

        <button type="submit">Update Student</button>
        <a href="index.php?action=index" class="btn">Cancel</a>
    </form>

@endsection
