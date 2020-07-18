@include('partials.header')
<div class="container data-list">
    <h2 class="text-center">
    </h2>
    <p>
        Your total payables is : USD. {{$data->amount}}
    </p>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="topic-block">
                    <div class="panel-body">
                        <div class="alert alert-danger display-error" style="display: none"></div>
                        <div id="paypal-button-container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    paypal.Buttons({
        createOrder: function (data, actions) {
            return fetch('/my-server/create-order', {
                method: 'POST'
            }).then(function(res) {
                return res.json();
            }).then(function(data) {
                return data.id;
            });
        },
        onApprove: function (data, actions) {
            return fetch('/my-server/capture-order/' + data.orderID, {
                method: 'POST'
            }).then(function(res) {
                if (!res.ok) {
                    alert('Something went wrong');
                }
            });
        }
    }).render('#paypal-button-container');
</script>
