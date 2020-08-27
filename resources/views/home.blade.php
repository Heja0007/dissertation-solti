@extends('layouts.blank')
@inject('dashboard_helper','App\Helpers\DashboardHelper')
@section('content')
    <div class="card">
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card-header">
                Admin Dashboard
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-list fa-5x"> {{$dashboard_helper->allTreks()}}</i><br>
                            Active Routes
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-archive fa-5x"> {{$dashboard_helper->allGuides()}}</i><br>
                            Active Guides
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-user fa-5x"> {{$dashboard_helper->bookings()}}</i><br>
                            Bookings
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
