@include('partials.header')
@inject('helper','App\Helpers\Helper)
@include('search')
<div class="popular_destination_area">
    <div class="container">
        <div class="row">
            @forelse($helper->allTreks() as $trek)

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
        <div class="col-lg-12 text-center">
            <button class="btn text-center">
                <a href="{{route('front.trek.all')}}">
                    <span style="text-decoration-color: black">View more</span>
                </a>
            </button>
        </div>
    </div>
</div>
<div class="travel_variation_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <img src="img/svg_icon/1.svg" alt="">
                    </div>
                    <h3>Comfortable Journey</h3>
                    <p>A wonderful serenity has taken to the possession of my entire soul.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <img src="img/svg_icon/2.svg" alt="">
                    </div>
                    <h3>Luxuries Hotel</h3>
                    <p>A wonderful serenity has taken to the possession of my entire soul.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_travel text-center">
                    <div class="icon">
                        <img src="img/svg_icon/3.svg" alt="">
                    </div>
                    <h3>Travel Guide</h3>
                    <p>A wonderful serenity has taken to the possession of my entire soul.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="recent_trip_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Our Guides</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse($helper->allGuides() as $guide)

                <div class="col-lg-4 col-md-6">
                    <div class="single_trip">
                        <div class="thumb">
                            <img src="{{asset($guide->photo)}}" alt="">
                        </div>
                        <div class="info">
                            <div class="date">
                                <span>Oct 12, 2019</span>
                            </div>
                            <a href="#">
                                <h3>{{$guide->expertise}}</h3>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="mr-t-20 text-center">No Guides To be shown, Sorry</p>
            @endforelse
        </div>
    </div>
</div>
<footer class="footer">
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        Copyright All rights reserved | This website is made by Suraj
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
