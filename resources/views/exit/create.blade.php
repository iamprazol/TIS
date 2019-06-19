@extends('layouts.app', ['title' => __('Exit Tourist Information')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Information')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Exit Information Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('exitinfo.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('exit.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Exiting Tourist information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="nepali_date">{{ __('Exit Date') }}</label>
                                            <input name="nepali_date" id="nepali_date" class="form-control nepali-calendar" placeholder="{{ __('Pick a Nepali date') }}" value="{{ old('nepali_date') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="checkpoint_id">{{ __('Checkpoint Name') }}</label>
                                            <div class="form-group">
                                                @if(auth()->user()->isAdmin())
                                                    <select name="checkpoint_id" class="custom-select" id="checkpoint_id" required>
                                                        <option value="" selected="">Choose One</option>
                                                        @foreach($checkpoints as $checkpoint)
                                                            <option value="{{ $checkpoint->id }}">{{ $checkpoint->checkpoint_name }}</option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <select name="checkpoint_id" class="custom-select" id="checkpoint_id" required>
                                                        <option value="{{ $user->checkpointuser->checkpoint_id }}" selected="">{{ $user->checkpointuser->checkpoint->checkpoint_name }}</option>
                                                    </select>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="country_id">{{ __('Country Name') }}</label>
                                            <div class="form-group">
                                                <select name="country_id" class="form-control" id="country_id" required>
                                                    <option value="" selected="">Choose One</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 1rem;">
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('tourist_name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="tourist_name">{{ __('Tourist Name') }}</label>
                                            <input name="tourist_name" id="tourist_name" class="form-control form-control-alternative{{ $errors->has('tourist_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Tourist Name') }}" value="{{ old('tourist_name') }}" required>

                                            @if ($errors->has('tourist_name'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tourist_name') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="passport_number">{{ __('Passport Number') }}</label>
                                            <input name="passport_number" id="passport_number" class="form-control" placeholder="{{ __('Enter Passport Number (Mandatory)') }}" value="{{ old('passport_number') }}" required >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="gender">{{ __('Gender') }}</label>
                                    <div class="custom-radio" style="margin-left: 1.5rem">
                                        <label><input type="radio"  name="gender" id="gender" value="Male" class="custom-radio" checked> Male</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label><input type="radio" name="gender" id="gender" value="Female" class="custom-radio"> Female</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label><input type="radio" name="gender" id="gender" value="Others" class="custom-radio"> Others</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="reviews" class="form-control-label">{{ __('Reviews ( If any )') }}</label>
                                    <textarea name="reviews" id="reviews" cols="30" rows="10" class="form-control"></textarea>
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
<script>
    function selectall(source) {
        checkboxes = document.getElementsByName('purpose_id[]');
        for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>
