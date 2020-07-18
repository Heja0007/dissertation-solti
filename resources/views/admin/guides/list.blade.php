@extends('layouts.blank')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Guides List</h6>
            <div class="fa-pull-left">
                <a href="{{route('admin.guides.create')}}"> Create Guide</a>
            </div>
        </div>
        <div class="card-body">
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
                                        rowspan="2" colspan="1"
                                        aria-label="Name: activate to sort column ascending"
                                        style="width: 100px;" aria-sort="descending">Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="" aria-label="Position: activate to sort column ascending"
                                        style="width: 100px;">Phone
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Office: activate to sort column ascending"
                                        style="width: 300px;">Expertise
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Age: activate to sort column ascending"
                                        style="width: 100px;">Email
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
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Salary: activate to sort column ascending"
                                        style="width: 100px;">Photo
                                    </th>
                                    <th class="sorting"
                                        style="width: 100px;">Actions
                                </tr>
                                </thead>
                                <tfoot>
                                <tbody>
                                @forelse($guides as $index => $guide)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$guide->name}}</td>
                                        <td class="">{{$guide->phone}}</td>
                                        <td class="">{{str_limit($guide->expertise, $limit = 100, $end = '...')}}</td>
                                        <td class="">{{$guide->email}}</td>
                                        <td class="">{{$guide->status}}</td>
                                        <td class="">{{$guide->created_at}}</td>
                                        <td><img src="{{ asset($guide->photo)}}"
                                                 style="max-width: 100%; max-height: 100%; display: block;"/>
                                        </td>
                                        <td>
                                            <div class="row col-md-5">
                                                <a href="{{route('admin.guides.show',$guide->id)}}">
                                                    <button class="btn btn-purple darken-4 btn-sm m-0"><i
                                                            class="fa fa-eye "></i>
                                                    </button>
                                                </a>
                                                <a href="{{route('admin.guides.edit',$guide->id)}}">
                                                    <button class="btn btn-purple darken-4 btn-sm m-0"><i
                                                            class="fa fa-edit "></i>
                                                    </button>
                                                </a>
                                                {{ Form::open(['url' => route('admin.guides.destroy',$guide->id), 'method' => 'delete']) }}
                                                <button type="submit" class="btn btn-delete"><i class="fa fa-trash"></i>
                                                </button>
                                                {{Form::close() }}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <span>No Guides data</span>
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
