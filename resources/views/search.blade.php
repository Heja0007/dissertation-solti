<div class="where_togo_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="form_area">
                    <h3>Where you want to go?</h3>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="search_wrap">
                    {{ Form::open(['route' => 'front.trek.search' ,'method' => 'POST','enctype'=> 'multipart/form-data' , 'class'=>'search_form']) }}
                    <div class="input_field">
                        {{form::text('destination',$data->destination ?? old('destination') ,['placeholder' => 'Where to go?'])}}
                    </div>
                    <div class="input_field">
                        {{ Form::select('cost',
                                              [
                                                 '' => 'Select Budget',
                                                 '10000' => 'Less than us 10000',
                                                 '20000' => 'Less than us 20000',
                                                 '100000' => 'More than us 200000',
                                             ]
                                             , $data->cost ?? old('cost'), ['class'=>'form-control'])
                                        }}
                    </div>
                    <div class="input_field">
                        {{ Form::select('difficulty',
                                              [
                                                 '' => 'Select Difficulty',
                                                 'Hard' => 'Hard',
                                                 'Mild' => 'Mild',
                                                 'Low' => 'Low',
                                             ]
                                             , $data->difficulty ?? old('difficulty'), ['class'=>'form-control'])
                                        }}
                    </div>
                    <div class="search_btn">
                        <button class="boxed-btn4 " type="submit">Search</button>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
