@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <h1>Upload Excel File</h1>
        <form action="/upload" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Choose Excel file (.xlsx, .xls)</label>
                <input type="file" class="form-control-file" id="file" name="file" accept=".xlsx, .xls">
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
@endsection
