@extends('layouts.blank')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bookings </h6>
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
                                        rowspan="1" colspan="1"
                                        aria-label="Name: activate to sort column ascending"
                                        style="width: 63px;" aria-sort="descending">Payment Reference No
                                    </th>
                                    <th class="sorting_desc" tabindex="0" aria-controls="dataTable"
                                        rowspan="1" colspan="1"
                                        aria-label="Name: activate to sort column ascending"
                                        style="width: 63px;" aria-sort="descending">Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                        style="width: 78px;">Email
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                        style="width: 78px;">Phone
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Office: activate to sort column ascending"
                                        style="width: 51px;">Payment Status
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Age: activate to sort column ascending"
                                        style="width: 31px;">Payment Amount
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Age: activate to sort column ascending"
                                        style="width: 31px;">Route
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Age: activate to sort column ascending"
                                        style="width: 31px;">People Count for trek
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Salary: activate to sort column ascending"
                                        style="width: 67px;">Booked at
                                    </th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tbody>
                                @forelse($datas as $data)
                                    <tr role="row" class="odd">
                                        @if($data->payment)
                                            <td class="sorting_1">{{$data->payment->prn}}</td>
                                        @else
                                            <td class="sorting_1">No payment</td>
                                        @endif
                                        <td class="sorting_1">{{$data->name}}</td>
                                        <td class="">{{$data->email}}</td>
                                        <td class="">{{$data->phone}}</td>
                                        @if(isset($data->payment))
                                            <td class="">Paid</td>
                                        @else
                                            <td class="">Not Paid</td>
                                        @endif
                                        @if(isset($data->payment))
                                            <td class="">{{$data->payment->amount}}</td>
                                        @else
                                            <td class="">N/A</td>
                                        @endif
                                        <td class=""><a
                                                href="{{route('admin.treks.show',$data->trek->id)}}">{{$data->trek->name}}</a>
                                        </td>
                                            <td class="">{{$data->peoples}}</td>
                                        <td class="">{{$data->created_at}}</td>
                                    </tr>
                                @empty
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
