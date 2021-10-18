@extends('layouts.template')

@section('content')
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">List Members</div>
                    <div class="card-body">
                        <p class="card-title"></p>
                        <table class="table table-hover" id="dataTables-example" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Event Name</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Fee (RM)</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $e)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$e->e_name}}</td>
                                    <td>{{$e->e_type}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="{{url('')}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                        <a href="{{url('')}}" class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="{{url('')}}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
