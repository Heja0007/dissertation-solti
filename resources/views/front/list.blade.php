@include('partials.header')
@inject('helper','App\Helpers\Helper')
@include('search')
@include('message')
<div class="popular_destination_area">

    <div class="container">
        <div class="row">
            @forelse($treks as $trek)

                <div class="col-lg-4 col-md-6">
                    <div class="single_destination">
                        <div class="thumb">
                            <img src="{{asset($helper->firstPhoto($trek->id))}}" alt="">
                        </div>
                        <div class="content">
                            <p class="d-flex align-items-center">{{$trek->title}} <a
                                    href="{{route('front.trek.view' , $trek->id)}}">
                                    {{$trek->destination}}</a></p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="mr-t-20 text-center">No Routes To be shown, Sorry</p>
            @endforelse
        </div>
        <div class="col-sm-12 text-right pagination">
            {{$treks->appends(Request::get('page'))->links()}}
        </div>
    </div>
</div>
