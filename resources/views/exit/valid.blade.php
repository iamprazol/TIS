@extends('layouts.app', ['title' => __('Information Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Tourists') }}</h3>
                            </div>
                        </div>
                        <hr style="margin-bottom: 1rem !important;">
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <form action="{{ route('check.validation') }}" method="get">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-4">
                                                <label class="form-control-label" for="tourist_name" style="margin-left: 1rem;">{{ __('Tourist Name') }}</label>
                                                <input name="tourist_name" id="tourist_name" class="form-control" style="margin-left: 1rem; font-size: 0.82rem; height:1.8rem;" placeholder="{{ __('Tourist Name') }}" value="{{ old('tourist_name') }}" required>
                                        </div>
                                        <div class="col-4">
                                            <label class="form-control-label" for="passport_number" style="margin-left: 1rem;">{{ __('Passport Number') }}</label>
                                            <input name="passport_number" class="form-control" id="passport_number" style="margin-left: 1rem; font-size: 0.82rem; height:1.8rem;" value="{{ old('passport_number') }}" required>
                                        </div>
                                        <div class="col-4 text-left">
                                            <input class="btn btn-primary btn-pill d-flex ml-auto mr-auto" name="submit" type="submit" value="Search" style="height:1.8rem; font-size: 0.82rem; line-height: 0.5rem; margin-top: 1.9rem;">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection