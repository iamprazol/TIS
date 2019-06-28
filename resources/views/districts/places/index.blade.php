@extends('layouts.app', ['title' => __('Place Information Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="mb-0">{{ __('Place Information') }}</h3>
                            </div>
                            @if(auth()->user()->role_id != 3)
                                <div class="col-6 text-right">
                                    <a href="{{ route('places.create') }}" class="btn btn-sm btn-primary" style="margin-top: 2rem; margin-right: 1rem;">{{ __('Add Place') }}</a>
                                </div>
                            @endif
                        </div>
                        <hr style="margin-bottom: 1rem !important;">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('places.search') }}" method="get">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="district_id" style="margin-left: 1rem;">{{ __('District Name') }}</label>
                                                <div class="form-group" style="margin-left: 1rem; font-size: 0.82rem; height:1.8rem;" >
                                                    <select name="district_id" class="form-control custom-select" id="district_id" required>
                                                        <option value="" selected="">Choose One</option>
                                                        @foreach($districts as $district)
                                                            <option value="{{ $district->id }}">{{ $district->district_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="btn btn-primary btn-pill d-flex ml-auto mr-auto" name="submit" type="submit" value="Search" style="height:1.8rem; font-size: 0.82rem; line-height: 0.5rem; margin-top: 1.9rem;">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('District Name') }}</th>
                                <th scope="col">{{ __('Place Name') }}</th>
                                <th scope="col">{{ __('Picture') }}</th>
                                <th scope="col">{{ __('Description') }}</th>
                                <th scope="col">{{ __('Option') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($places as $place)
                                <tr>
                                    <td>{{ $place->districts->district_name }}</td>
                                    <td>{{ $place->place_name }}</td>
                                    <td><div class="card-img"><img src="{{ asset('argon') }}/img/districts/places/{{ $place->picture }}" style="width: 80px; height: 80px" /></div></td>
                                    <td>{{ substr(strip_tags($place->description), 0, 200) }}</td>
                                    <td>
                                        <a class="btn  btn-sm btn-primary" href="{{ route('places.edit', ['id' => $place->id]) }}">{{ __('Edit') }}</a>
                                     </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $places->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection