@extends('layouts.master')

@section('title', 'Add Student')

@section('content')

    @if(isset($error))
        <p style="color:red;">{{ $error }}</p>
    @endif

    <form action="index.php?action=store" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email"><br><br>

        <label for="course">Course:</label><br>
        <input type="text" name="course" id="course"><br><br>

        <button type="submit" class="btn btn-success">Add Student</button>
        <a href="index.php?action=index" class="btn">Cancel</a>
    </form>

@endsection
