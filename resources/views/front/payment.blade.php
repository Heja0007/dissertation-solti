@include('partials.header')
<div class="container">
    <div class="card">
        <div class="card-title">
            <h2 class="text-center">
                Payment Form
            </h2>
        </div>
        <div class="card-body">
            <p>
                Your total payables is : USD. {{$data->cost}}
            </p>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="topic-block">
                            <div class="panel-body text-center">
                                <div class="alert alert-danger display-error" style="display: none"></div>
                                {{Form::open(['url'=>route('charge'),'method' => 'POST','enctype'=> 'multipart/form-data', 'id'=>'payment-form'])}}
                                {{Form::text('amount', $data->cost,['class'=> 'form-control', 'hidden'=>'hidden'])}}
                                {{Form::text('email', $data->email,['class'=> 'form-control', 'hidden'=>'hidden'])}}
                                {{Form::text('booking_id', $data->id,['class'=> 'form-control', 'hidden'=>'hidden'])}}

                                <label for="card-element">
                                </label>
                                <div id="card-element">
                                </div>
                                <div id="card-errors" role="alert"></div>
                            </div>
                            <button>Submit Payment</button>
                            {{ csrf_field() }}
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let publishable_key = '{{ env('STRIPE_PUBLISHABLE_KEY') }}';
</script>
<script src="{{ asset('/js/stripe.js') }}"></script>
