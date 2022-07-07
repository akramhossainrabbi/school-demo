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
        <h1 class="h3 mb-0 text-gray-800">Results</h1>
        <a href="{{ route('result.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Add result</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Results</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="10">#</th>
                            <th>Name</th>
                            <th>Total</th>
                            <th>GPA</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Total</th>
                            <th>GPA</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($students)
                            @foreach($students as $key => $student)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->results()->sum('mark') }}</td>
                                <td>
                                    @if($student->results->contains('gpa', 0))
                                        0
                                    @else
                                    {{ round($student->results()->avg('gpa'), 2) }}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  
@endsection

@section('js')
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                order: [[3, 'desc']],
            });
        });
    </script>
@endsection