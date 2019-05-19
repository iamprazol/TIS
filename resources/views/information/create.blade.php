@extends('layouts.app', ['title' => __('Tourist Information')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Information')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Tourist Information') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ '#' }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('information.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Tourist information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="checkpoint_id">{{ __('Checkpoint Name') }}</label>
                                    <div class="form-group">
                                        @if(auth()->user()->is_admin == 1)
                                        <select name="checkpoint_id" class="custom-select" id="checkpoint_id" required>
                                            <option value="" selected="">Choose One</option>
                                            @foreach($checkpoints as $checkpoint)
                                                <option value="{{ $checkpoint->id }}">{{ $checkpoint->checkpoint_name }}</option>
                                            @endforeach
                                        </select>
                                        @else
                                            <select name="checkpoint_id" class="custom-select" id="checkpoint_id" required>
                                                <option value="{{ $user->checkpoituser->checkpoint_id }}" selected="">{{ $user->checkpoint_user->checkpoint->checkpoint_name }}</option>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="purpose_id">{{ __('Purpose') }}</label>
                                    <div class="form-group">
                                        <select name="purpose_id" class="custom-select" id="purpose_id" required>
                                            <option value="" selected="">Choose One</option>
                                            @foreach($purposes as $purpose)
                                                <option value="{{ $purpose->id }}">{{ $purpose->purpose }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('country_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="country_name">{{ __('Country Name') }}</label>
                                    <input name="country_name" id="country_name" class="form-control form-control-alternative{{ $errors->has('country_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Country') }}" value="{{ old('country_name') }}" required>

                                    @if ($errors->has('country_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('country_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('tourist_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="tourist_name">{{ __('Tourist Name') }}</label>
                                    <input name="tourist_name" id="tourist_name" class="form-control form-control-alternative{{ $errors->has('tourist_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Tourist Name') }}" value="{{ old('tourist_name') }}" required>

                                    @if ($errors->has('tourist_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tourist_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="age">{{ __('Age') }}</label>
                                    <input name="age" id="age" class="form-control" placeholder="{{ __('age') }}" value="{{ old('age') }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="visa_period">{{ __('Visa Expiry') }}</label>
                                    <input name="visa_period" id="visa_period" class="form-control" placeholder="{{ __('visa_period') }}" value="{{ old('visa_period') }}" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection