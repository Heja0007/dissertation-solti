@extends('layouts.blank')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="text-center">
                    Guide View
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        @include('message')
                        <div class="p-5">
                            <div class="form">
                                <div class="form-group">
                                    <div class="col-sm-12 card-header text-center">
                                        <h4>{{$guide->name}}</h4>
                                    </div>
                                </div>
                            <div class="card-img">
                                    <img src="{{ asset($guide->photo)}}"
                                         style="max-width: 250px; max-height: 350px; display: block;"/>
                            </div>
                                <div class="form-group">
                                    <div class="form-group ">
                                        Phone: {{$guide->phone}}
                                    </div>
                                    <div class="form-group ">
                                        Email: {{$guide->email}}
                                    </div>
                                    <div class="form-group ">
                                        Expertise: {{$guide->expertise}}
                                    </div>
                                </div>
                                <hr>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
