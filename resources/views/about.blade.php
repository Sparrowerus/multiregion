@extends('layout.theme')
@section('content')
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <div class="col-sm-12 col-md-12">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('assets/img/news-on-go.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Some local info</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
@endsection
