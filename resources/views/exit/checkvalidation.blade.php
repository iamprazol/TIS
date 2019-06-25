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

                    <div class="row">
                        <div class="col-md-5" style="margin-left: 4rem;margin-bottom: 5rem;">
                            <div class="card shadow">
                                <div class="card-header border-0">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h3 class="mb-0">{{ __('Entry') }}</h3>
                                        </div>
                                    </div>
                                </div>
                                @if($entry != null)
                                    <table class="table table-hover">
                                        <tbody>
                                        <tr>
                                            <td>Tourist Name :</td><td>{{ $entry->tourist_name }}</td>
                                        </tr>

                                        <tr>
                                            <td>Checkpoint Name :</td><td>{{ $entry->checkpoint->checkpoint_name }}</td>
                                        </tr>


                                        <tr>
                                            <td>Country Name :</td><td>{{ $entry->countries->country_name }}</td>
                                        </tr>


                                        <tr>
                                            <td>Gender</td><td>{{ $entry->gender }}</td>
                                        </tr>

                                        <tr>
                                            <td>Entry Date :</td><td>{{ $entry->nepali_date }}</td>
                                        </tr>

                                        </tbody>

                                    </table>
                                @else
                                    <p style="margin-left: 2rem;font-size: 14px; color: red;">No record in entry table found</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5" style="margin-left: 3rem;margin-bottom: 5rem;">
                            <div class="card shadow">
                                <div class="card-header border-0">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h3 class="mb-0">{{ __('Exit') }}</h3>
                                        </div>
                                    </div>
                                </div>
                                @if($exit != null)
                                    <table class="table table-hover">
                                        <tbody>
                                        <tr>
                                            <td>Tourist Name :</td><td>{{ $exit->tourist_name }}</td>
                                        </tr>

                                        <tr>
                                            <td>Checkpoint Name :</td><td>{{ $exit->checkpoint->checkpoint_name }}</td>
                                        </tr>


                                        <tr>
                                            <td>Country Name :</td><td>{{ $exit->countries->country_name }}</td>
                                        </tr>


                                        <tr>
                                            <td>Gender</td><td>{{ $exit->gender }}</td>
                                        </tr>


                                        <tr>
                                            <td>Exit Date :</td><td>{{ $exit->nepali_date }}</td>
                                        </tr>

                                        </tbody>

                                    </table>
                                @else
                                    <p style="margin-left: 2rem;font-size: 14px; color: red;">No record in exit table found</p>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection