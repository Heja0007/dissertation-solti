@extends('layouts.blank')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
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
                                        style="width: 63px;" aria-sort="descending">Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                        style="width: 78px;">Position
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Office: activate to sort column ascending"
                                        style="width: 51px;">Office
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Age: activate to sort column ascending"
                                        style="width: 31px;">Age
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1"
                                        aria-label="Start date: activate to sort column ascending"
                                        style="width: 68px;">Start date
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-label="Salary: activate to sort column ascending"
                                        style="width: 67px;">Salary
                                    </th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tbody>
                                <tr role="row" class="odd">
                                    <td class="sorting_1">Zorita Serrano</td>
                                    <td class="">Software Engineer</td>
                                    <td class="">San Francisco</td>
                                    <td class="">56</td>
                                    <td class="">2012/06/01</td>
                                    <td class="">$115,000</td>
                                </tr>
                                <tr role="row" class="even">
                                    <td class="sorting_1">Zenaida Frank</td>
                                    <td class="">Software Engineer</td>
                                    <td class="">New York</td>
                                    <td class="">63</td>
                                    <td class="">2010/01/04</td>
                                    <td class="">$125,250</td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td class="sorting_1">Yuri Berry</td>
                                    <td class="">Chief Marketing Officer (CMO)</td>
                                    <td class="">New York</td>
                                    <td class="">40</td>
                                    <td class="">2009/06/25</td>
                                    <td class="">$675,000</td>
                                </tr>
                                <tr role="row" class="even">
                                    <td class="sorting_1">Vivian Harrell</td>
                                    <td class="">Financial Controller</td>
                                    <td class="">San Francisco</td>
                                    <td class="">62</td>
                                    <td class="">2009/02/14</td>
                                    <td class="">$452,500</td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td class="sorting_1">Unity Butler</td>
                                    <td class="">Marketing Designer</td>
                                    <td class="">San Francisco</td>
                                    <td class="">47</td>
                                    <td class="">2009/12/09</td>
                                    <td class="">$85,675</td>
                                </tr>
                                <tr role="row" class="even">
                                    <td class="sorting_1">Timothy Mooney</td>
                                    <td class="">Office Manager</td>
                                    <td class="">London</td>
                                    <td class="">37</td>
                                    <td class="">2008/12/11</td>
                                    <td class="">$136,200</td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td class="sorting_1">Tiger Nixon</td>
                                    <td class="">System Architect</td>
                                    <td class="">Edinburgh</td>
                                    <td class="">61</td>
                                    <td class="">2011/04/25</td>
                                    <td class="">$320,800</td>
                                </tr>
                                <tr role="row" class="even">
                                    <td class="sorting_1">Thor Walton</td>
                                    <td class="">Developer</td>
                                    <td class="">New York</td>
                                    <td class="">61</td>
                                    <td class="">2013/08/11</td>
                                    <td class="">$98,540</td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td class="sorting_1">Tatyana Fitzpatrick</td>
                                    <td class="">Regional Director</td>
                                    <td class="">London</td>
                                    <td class="">19</td>
                                    <td class="">2010/03/17</td>
                                    <td class="">$385,750</td>
                                </tr>
                                <tr role="row" class="even">
                                    <td class="sorting_1">Suki Burks</td>
                                    <td class="">Developer</td>
                                    <td class="">London</td>
                                    <td class="">53</td>
                                    <td class="">2009/10/22</td>
                                    <td class="">$114,500</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
