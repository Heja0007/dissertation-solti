@include('partials.header')
<div class="bradcam_area bradcam_bg_4">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Book your very first expperience with us</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">{{$trek->title}}</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-sm" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Route Name</th>
                        <th>Destination</th>
                        <th>Cost Per Person</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="center">{{$trek->name}}</td>
                        <td class="center">{{$trek->destination}}</td>
                        <td class="center">{{$trek->cost}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-8">
                {{ Form::open(['url' => isset($data)?route('front.trek.book-update',[$data->id,$trek->id]) :
                     route('front.trek.book' , $trek->id), 'method' => 'POST','enctype'=> 'multipart/form-data']) }}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{Form::text('name', $data->name?? old('name') , ['class' => 'form-control' , 'placeholder' => 'Name'])}}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        {{Form::text('email', $data->email?? old('email') , ['class' => 'form-control' , 'placeholder' => 'Email'])}}
                    </div>
                    <div class="col-sm-6">
                        {{Form::text('phone', $data->phone?? old('phone') , ['class' => 'form-control' , 'placeholder' => 'Phone'])}}
                    </div>
                    <div class="col-sm-6">
                        {{Form::number('peoples', $data->peoples?? old('peoples') , ['class' => 'form-control' , 'placeholder' => 'Number of Peoples'])}}
                    </div>
                    <div class="col-sm-6">
                        {{Form::label('When would you like to start your trek?')}}
                        {{Form::date('prefered_date', $data->prefered_date?? old('prefered_date') , ['class' => 'form-control' , 'placeholder' => 'When would you like to start your trek?'])}}
                    </div>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="button button-contactForm boxed-btn">Submit</button>
                </div>
                {{Form::close()  }}
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>Kathmandu, Nepal.</h3>
                        <p>Boudha, BA 91770</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3>+977 9846587260</h3>
                        <p>Sun to Fri 9am to 6pm</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3>trekkersNepal@abc.com</h3>
                        <p>Send us your query anytime!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
