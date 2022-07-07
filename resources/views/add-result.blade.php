@extends('layouts.app')
@section('title', 'Result')

@section('css')
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Results</h1>
        <a href="{{ route('result.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Go Back</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Results</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('result.save') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select a Student</label>
                    <select class="form-control" name="student">
                        @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                        @endforeach
                    </select>
                  </div>
                @foreach($subjects as $subject)
                    <div class="form-group">
                    <label for="exampleInputEmail1">{{ $subject->subject_name }}</label>
                    <input type="hidden" class="form-control" name="subject[]" value="{{ $subject->id }}">
                    <input type="number" class="form-control" name="result[]" value="">
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
  
@endsection

@section('js')
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
@endsection