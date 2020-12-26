@extends('layout.master')

@section('title')
    Students
@endsection

@section('style')
    <link href="{{ asset('css/custom2.css') }}" rel="stylesheet" type="text/css" >

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

@endsection
@section('content')

    <div class="content">
        <div class="container">

            <!-- end row -->
            <div class="row">
                @foreach($students as $student)
                <div class="col-lg-4">
                    <div class="text-center card-box">
                        <div class="member-card pt-2 pb-2">
                            <div class="thumb-lg member-thumb mx-auto"><img src="{{asset
                            ("uploads/images/$student->image")}}" class="rounded-circle
                            img-thumbnail" alt="profile-image"></div>
                            <div class="">

                                <h4>{{$student->fullname}}</h4>
                                <p>{{$student->email}}</span></p>
                            </div>
                            <a href="/students/{{$student->id}}" type="button" class="btn btn-primary mt-3 btn-rounded
                             waves-effect
                            w-md
                            waves-light">View info </a>

                        </div>
                    </div>
                </div>

                @endforeach

            </div>
            <!-- end row -->




        </div>
        <!-- container -->
    </div>

@endsection
