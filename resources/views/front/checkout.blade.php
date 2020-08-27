@include('partials.header')
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="text-center">
            <h3>Payment Receipt</h3>
        </div>
    </div>
    <div class="container data-list">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('Payment Reference number') }}
                        <span>: {{$payment->prn}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('Payment Amount')}}
                        <span>: {{$payment->amount}} {{$payment->currency}}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="from-group">
                        {{Form::label('Insured Name')}}*
                        <span>: {{$payment->booking->name}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('Email')}}*
                        <span>: {{$payment->email}}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('Phone')}}*
                        <span>: {{$payment->booking->phone}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
