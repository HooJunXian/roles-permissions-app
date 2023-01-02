@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Projects List</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                @if(Auth::id()=='1')
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Project</a>
                @endif
                @endcan
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>Project updated successfully</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Student</th>
            <th>Project Title</th>
            <th>Project Type</th>
            <th>Supervisor</th>
            <th>Examiner 1</th>
            <th>Examiner 2</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Project Progress</th>
            <th>Project Status</th>
            <th>Duration In Month</th>
            <th width="200px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->studname }}</td>
            <td>{{ $product->projtitle }}</td>
            <td>{{ $product->projtype }}</td>
            <td>{{ $product->supname }}</td>
            <td>{{ $product->ex1name }}</td>
            <td>{{ $product->ex2name }}</td>
            <td>{{ $product->startdate }}</td>
            <td>{{ $product->enddate }}</td>
            <td>{{ $product->projprogress }}</td>
            <td>{{ $product->projstatus }}</td>
            <td>@php
                $sDate = $product->startdate;
                $eDate = $product->enddate;
                $datetime1 = new DateTime($sDate);
                $datetime2 = new DateTime($eDate);
                $interval = $datetime1->diff($datetime2);
                $days = $interval->format('%a');
                $month = $days/30;
                echo floor($month);
            @endphp</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    @can('project-edit')
                    @if(Auth::id()=='1' || Auth::user()->name==$product->supname)
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                    @endif
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('project-delete')
                    @if(Auth::id()=='1')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endif
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection