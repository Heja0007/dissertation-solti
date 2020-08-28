@extends('layouts.blank')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Routes List</h6>
            <div class="fa-pull-left">
                <a href="{{route('admin.treks.create')}}"> Create Route</a>
            </div>
        </div>
        <div class="card-body">
            @include('message')
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                   cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                   style="width: 100%;">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_desc" tabindex="0" aria-controls="dataTable"
                                        rowspan="1" colspan="1"
                                        aria-label="Name: activate to sort column ascending"
                                        style="width: 100px;" aria-sort="descending">Trek Title
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                        style="width: 100px;">Cost per person
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Office: activate to sort column ascending"
                                        style="width: 100px;">Duration
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Age: activate to sort column ascending"
                                        style="width: 100px;">Difficulty
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1"
                                        aria-label="Start date: activate to sort column ascending"
                                        style="width: 50px;">Status
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Salary: activate to sort column ascending"
                                        style="width: 100px;">Started Date
                                    </th>
                                    <th class="sorting"
                                        style="width: 100px;">Actions
                                </tr>
                                </thead>
                                <tfoot>
                                <tbody>
                                @forelse($treks as $index => $trek)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$trek->name}}</td>
                                        <td class="">{{$trek->cost}}</td>
                                        <td class="">{{$trek->duration}}</td>
                                        <td class="">{{$trek->difficulty}}</td>
                                        <td class="">{{$trek->status}}</td>
                                        <td class="">{{$trek->created_at}}</td>
                                        <td>
                                            <div class="row col-md-5">
                                                <a href="{{route('admin.treks.show',$trek->id)}}">
                                                    <button class="btn btn-purple darken-4 btn-sm m-0"><i
                                                            class="fa fa-eye "></i>
                                                        View
                                                    </button>
                                                </a>
                                                <a href="{{route('admin.treks.edit',$trek->id)}}">
                                                    <button class="btn btn-purple darken-4 btn-sm m-0"><i
                                                            class="fa fa-edit "></i>
                                                        Edit
                                                    </button>
                                                </a>
{{--                                                {{ Form::open(['url' => route('admin.treks.destroy',$trek->id), 'method' => 'delete','class'=>'form-delete  pull-left']) }}--}}
{{--                                                <button type="submit" class="btn btn-delete"><i class="fa fa-trash"></i>--}}
{{--                                                </button>--}}
{{--                                                {{Form::close() }}--}}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <span>No Trekking Route data</span>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
