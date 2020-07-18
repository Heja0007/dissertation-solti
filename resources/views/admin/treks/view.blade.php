@extends('layouts.blank')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="text-center">
                    Trekking Route View
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
                                        <h4>{{$trek->name}}</h4>
                                    </div>
                                </div>
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($uploads as $upload)
                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                <img class="d-block w-100"
                                                     src="{{asset($upload->filename)}}"
                                                     alt="First slide">
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                       data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                       data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <div class="form-group">
                                    <div class="form-group ">
                                        Cost Per Person: {{$trek->cost}}
                                    </div>
                                    <div class="form-group ">
                                        Trek Duration (Estimated): {{$trek->duration}}
                                    </div>
                                    <div class="form-group ">
                                        Maximum Altitude: {{$trek->maximum_altitude}}
                                    </div>
                                    <div class="form-group ">
                                        Status: {{$trek->status}}
                                    </div>
                                    <div class="form-group ">
                                        Description: {{$trek->description}}
                                    </div>
                                    <div class="form-group ">
                                        Itinerary: {{$trek->itinerary}}
                                    </div>
                                    <div class="form-group ">
                                        Cost Detals: {{$trek->cost_details}}
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
