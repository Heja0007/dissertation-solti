@include('partials.header')
    <div class="container-fluid">
        <div class="card">
            <div class="card-title">
                <h3>Payment Failed</h3>
            </div>
            <div class="card-body">
                <div class="alert alert-success" role="alert" style="margin-top:10px">
                    {{$message}}
                </div>
            </div>
        </div>
    </div>
