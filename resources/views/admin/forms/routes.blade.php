<div class="row">
    <div class="col-lg-12">
        @include('message')
        <div class="p-5">
            <div class="form">
                <div class="text-center">
                    Guides Form
                </div>
                @if(isset($treks))
                    {{ Form::model($treks, ['route' => ['admin.treks.update',$treks->id], 'method' => 'PUT' , 'enctype' => 'multipart/form-data']) }}
                @else
                    {{ Form::open(['route' => 'admin.treks.store' ,'method' => 'POST','enctype'=> 'multipart/form-data']) }}
                @endif
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        {{Form::text('name' , $treks->name ?? old('name') , ['class' => 'form-control form-control-user' , 'required' => 'required', 'placeholder'=>'Name' ])}}
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        {{Form::text('destination' , $treks->destination ?? old('destination') , ['class' => 'form-control form-control-user' , 'required' => 'required', 'placeholder'=>'Destination' ])}}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{Form::text('cost' , $treks->cost ?? old('cost') , ['class' => 'form-control form-control-user' , 'required' => 'required' ,'placeholder' => 'Cost'])}}
                        </div>
                    </div>
                    <div class=" col-sm-6">
                        <div class="form-group">
                            {{ Form::label('uploads','Upload  photos', ['class'=>'control-label'])}}
                            {{ Form::file('uploads[]' , ['multiple'] )}}
                        </div>

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        {{Form::text('duration' , $treks->duration ?? old('duration') , ['class' => 'form-control form-control-user' , 'required' => 'required', 'placeholder'=>'Duration' ])}}
                    </div>
                    <div class="col-sm-6">
                        {{ Form::select('difficulty',
                                            [
                                               '' => 'Select Difficulty',
                                               'Hard' => 'Hard',
                                               'Mild' => 'Mild',
                                               'Low' => 'Low',
                                           ]
                                           , $data->difficulty ?? old('difficulty'), ['class'=>'form-control','required' => 'required'])
                                      }}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        {{Form::text('maximum_altitude' , $treks->maximum_altitude ?? old('maximum_altitude') , ['class' => 'form-control form-control-user' , 'required' => 'required', 'placeholder'=>'Maximum Altitude' ])}}
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        {{Form::select('status' ,[
                                '' =>'Select Status',
                                'Active' =>'Active',
                                'Inactive' =>'Inactive',
                        ], $treks->status ?? old('status') , ['class' => 'form-control form-control-user', 'required' => 'required' ])}}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        {{Form::textarea('description' , $treks->description ?? old('description') , ['class' => 'form-control form-control-user' , 'required' => 'required', 'placeholder'=>'Description' ])}}
                    </div>
                    <div class="col-sm-6">
                        {{Form::textarea('itinerary' , $treks->itinerary ?? old('itinerary') , ['class' => 'form-control form-control-user' , 'required' => 'required', 'placeholder' => 'Itinerary'])}}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        {{Form::textarea('cost_details' , $treks->cost_details ?? old('cost_details') , ['class' => 'form-control form-control-user' , 'required' => 'required', 'placeholder'=>'Cost Details' ])}}
                    </div>
                </div>
                <div class=" row">

                    <div class="col-sm-11">
                        <button type="submit" name="submit" id="submit" class="btn-default btn-info btn-sm">
                            <i class="fa fa-save"></i> Save
                        </button>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
        <hr>
        @if(isset($uploads))
            <div class=" row ">
                @foreach($uploads as $upload)
                    <div class="photo-img"
                         style="width: 150px; height: 150px; border: 1px solid #ccc; padding-bottom: 20px; overflow: hidden;">
                        <img src="{{ asset($upload->filename)}}"
                             style="max-width: 100%; max-height: 100%; display: block;"/>
                        <div class="row col-md-5">
                            {{ Form::open(['url' => route('admin.uploads.destroy',$upload->id), 'method' => 'delete']) }}
                            <button type="delete" class="btn-delete"><i class="fa fa-trash"></i>
                            </button>
                            {{Form::close() }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
