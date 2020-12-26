@extends('layout.master')



@section('title')
    register

@endsection

@section('style')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" >
    <!-- Website Font style -->

@endsection


@section('content')

    <div class="container">
        <div class="row main">
            <div class="main-login main-center">
                <h5>Sign up once and watch any of our free demos.</h5>
                <form class="" method="post" action="/admin/edit/{{$student->id}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Your Full Name</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="fullname" id="fullname"
                                       placeholder="Enter your Name" value="{{ $student->fullname }}" />
                            </div>
                            @error('fullname')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Your NID</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="nid" id="nid"  placeholder="Enter your
                                National Number" value="{{ $student->nid }}"/>
                            </div>
                            @error('nid')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Address</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="address" id="address"
                                       placeholder="Address" value="{{ $student->address }}"/>
                            </div>
                            @error('nid')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Mobile</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="mobile" id="mobile"
                                       placeholder="mobile" value="{{ $student->mobile }}"/>
                            </div>
                            @error('mobile')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="cols-sm-2 control-label">Your Email</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                <input value="{{ $student->email }}" type="text" class="form-control" name="email"
                                       id="email"  placeholder="Enter your Email"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="cols-sm-2 control-label">image</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                <input type="file" class="form-control" name="image" id="image"
                                       placeholder="uplode Your image"/>
                            </div>

                        </div>
                    </div>


                    <div class="form-group ">
                        <div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn btn-primary
                     btn-block btn-lg" tabindex="7"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
