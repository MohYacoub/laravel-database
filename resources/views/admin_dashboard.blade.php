@extends('layout.master')

@section('title')
    ADMIN DASHBOARD
@endsection

@section('content')

        <div class="row">
            <div class="container">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">NID</th>
                        <th scope="col">ADDRESS</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($students as $row)
                        <tr>
                            <th scope="row">{{$row->id}}</th>
                            <td>{{$row->fullname}}</td>
                            <td>{{$row->nid}}</td>
                            <td>{{$row->address}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->mobile}}</td>
                            <td><a class="btn btn-warning" href="/admin/edit/{{$row->id}}">Edit</a></td>
                            <td><a class="btn btn-danger" href="/admin/delete/{{$row->id}}">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>

@endsection
