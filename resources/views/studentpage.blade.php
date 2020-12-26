@extends('layout.master')


@section('style')
    <link href="{{ asset('css/custom2.css') }}" rel="stylesheet" type="text/css" >

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

@endsection


@section('content')

    <div class="content">
        <div class="container">

            <!-- end row -->
            <div class="row text-center justify-content-center">
                        <div class="text-center card-box">
                            <div class="member-card pt-2 pb-2">
                                 <div class="thumb-lg member-thumb mx-auto"><img src="{{asset
                                 ("uploads/images/$student->image")}}" class="rounded-circle
                            img-thumbnail" alt="profile-image"></div>
                                <div class="">

                                    <h4>{{$student->fullname}}</h4>
                                    <p>{{$student->email}}</span></p>
                                </div>
                                <a href="/students" type="button" class="btn btn-primary mt-3 btn-rounded
                             waves-effect
                            w-md
                            waves-light">back</a>

                            </div>
                        </div>
                    </div>


            <!-- end row -->




        </div>
        <!-- container -->
    </div>

@endsection
