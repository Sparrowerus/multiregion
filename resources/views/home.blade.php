@extends('layout.theme')
@section('content')
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <div class="col-12">
            <table class="table dataTable">
                <thead>
                    <th>City</th>
                    <th>Action</th>
                </thead>
                <tbody>
                @foreach($cities as $city)
                    <tr>
                        <td>
                            <a href="{{ route('city.home', ['city' => $city->slug]) }}" @if(isset($currentCity->id) && $city->id == $currentCity->id) style="font-weight: bold;" @endif>
                                {{ $city->name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ url($city->slug) }}">
                                <button class="btn btn-sm btn-secondary">Open</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
