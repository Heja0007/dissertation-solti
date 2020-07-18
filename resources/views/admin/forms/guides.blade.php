<div class="row">
    <div class="col-lg-12">
        @include('message')
        <div class="p-5">
            <div class="text-center">
                Guides Form
            </div>
            @if(isset($guide))
                {{ Form::model($guide, ['route' => ['admin.guides.update',$guide->id], 'method' => 'PUT' , 'enctype' => 'multipart/form-data']) }}
            @else
                {{ Form::open(['route' => 'admin.guides.store' ,'method' => 'POST','enctype'=> 'multipart/form-data']) }}
            @endif
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    {{Form::text('name' , $guide->name ?? old('name') , ['class' => 'form-control form-control-user' ,'placeholder'=>'Name' ,'required' => 'required', 'required pattern' => ".+?(?:[\s'].+?){1,}" ])}}
                </div>
                <div class="col-sm-6">
                    {{Form::text('phone' , $guide->phone ?? old('phone') , ['class' => 'form-control form-control-user','placeholder'=>'Phone' , 'required' => 'required'])}}
                    </div>
            </div>
            <div class="form-group">
                {{Form::text('email' , $guide->email ?? old('email') , ['class' => 'form-control form-control-user' ,'placeholder'=>'Email', 'required' => 'required'])}}
            </div>
            <div class="form-group ">
                {{Form::textarea('expertise' , $guide->expertise ?? old('expertise') , ['class' => 'form-control form-control-user' ,'placeholder'=>'Expertise', 'required' => 'required' ])}}
            </div>
            <div class=" row">
                <div class=" col-sm-6">
                    <div class="form-group">
                        {{ Form::label('photo','Upload  photo', ['class'=>'control-label'])}}
                        @if(isset($guide->photo))
                            {{ Form::file('photo' , ['accept'=> 'image/png, image/jpeg'])}}
                        @else
                            {{ Form::file('photo' , ['accept'=> 'image/png, image/jpeg' , 'required'])}}
                        @endif
                    </div>
                    @if(isset($guide->photo))
                        <div class="col-sm-4 pull-right">
                            <div class="photo-img"
                                 style="width: 102px; height: 110px; border: 1px solid #ccc; padding: 10px; overflow: hidden;">
                                <img src="{{ asset($guide->photo)}}"
                                     style="max-width: 100%; max-height: 100%; display: block;"/>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-sm-11">
                    <button type="submit" name="submit" id="submit" class="btn-default btn-info btn-sm">
                        <i class="fa fa-save"></i> Save
                    </button>
                </div>
            </div>
            {{--            <div class="row mr-t-10">--}}
            {{--               --}}
            {{--            </div>--}}
        </div>
        {{Form::close()}}
        <hr>
    </div>
</div>
