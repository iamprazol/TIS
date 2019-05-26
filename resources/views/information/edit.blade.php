@extends('layouts.app', ['title' => __('Information Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Edit Information')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Information Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('information.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('information.update', ['id' => $tourist->id]) }}" autocomplete="off">
                            @csrf
                            @method('post')

                            <h6 class="heading-small text-muted mb-4">{{ __('Tourist information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="checkpoint_id">{{ __('Checkpoint Name') }}</label>
                                            <div class="form-group">
                                                @if(auth()->user()->isAdmin())
                                                    <select name="checkpoint_id" class="custom-select" id="checkpoint_id" required>
                                                        <option value="{{ $tourist->checkpoint_id }}" selected="">{{ $tourist->checkpoint->checkpoint_name }}</option>
                                                    </select>
                                                @else
                                                    <select name="checkpoint_id" class="custom-select" id="checkpoint_id" required>
                                                        <option value="{{ $user->checkpointuser->checkpoint_id }}" selected="">{{ $user->checkpointuser->checkpoint->checkpoint_name }}</option>
                                                    </select>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="country_id">{{ __('Country Name') }}</label>
                                            <div class="form-group">
                                                <select name="country_id" class="custom-select" id="country_id" required>
                                                    <option value="{{ $tourist->country_id }}" selected="">{{ $tourist->country->country_name }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('tourist_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="tourist_name">{{ __('Tourist Name') }}</label>
                                    <input name="tourist_name" id="tourist_name" class="form-control form-control-alternative{{ $errors->has('tourist_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Tourist Name') }}" value="{{ old('tourist_name', $tourist->tourist_name) }}" required>

                                    @if ($errors->has('tourist_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tourist_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="purpose_id">{{ __('Purpose') }}</label>
                                    <div class="form-group list-inline" style="margin-left: .5rem">
                                        @foreach($purposes as $purpose)
                                            <label><input class="list-inline" style="margin-left: 1.5rem" type="checkbox" name="purpose_id[]" id="purpose_id" value="{{ $purpose->id }}"
                                                @foreach($tourist->userpurpose as $pu)
                                                    @if($pu->purpose_id == $purpose->id)
                                                        {{ $purpose->id ? 'checked': '' }}
                                                            @endif
                                                        @endforeach
                                                > {{ $purpose->purpose }} </label>
                                        @endforeach
                                            <label><input type="checkbox" style="margin-left: 2.5rem" onClick="selectall(this)"/>Select All</label>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="gender">{{ __('Gender') }}</label>
                                    <div class="custom-radio" style="margin-left: 1.5rem">
                                        @php $genders = ['Male', 'Female', 'Others'] @endphp
                                        @foreach($genders as $gender)
                                            <label><input type="radio"  name="gender" id="gender" value="{{ $gender }}"
                                                          @if($gender == $tourist->gender)
                                                                  {{ ($gender ? 'checked': '') }}
                                                          @endif
                                                          class="custom-radio">{{ $gender }}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="duration">{{ __('Duration') }}</label>
                                            <input name="duration" id="duration" class="form-control" placeholder="{{ __('eg. 5 days (Not Mandatory)') }}" value="{{ old('duration', $tourist->duration) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="age">{{ __('Age') }}</label>
                                            <input name="age" id="age" class="form-control" placeholder="{{ __('Enter Age (Not Mandatory)') }}" value="{{ old('age', $tourist->age) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="visa_period">{{ __('Visa Expiry') }}</label>
                                            <input name="visa_period" id="visa_period" class="form-control" placeholder="{{ __('Enter Visa Expiry Date (Not Mandatory)') }}" value="{{ old('visa_period', $tourist->visa_period) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="passport_number">{{ __('Passport Number') }}</label>
                                            <input name="passport_number" id="passport_number" class="form-control" placeholder="{{ __('Enter Passport Number (Not Mandatory)') }}" value="{{ old('passport_number', $tourist->passport_number) }}" >
                                        </div>
                                    </div>
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
        for(var i=0, n=checkboxes.length; i<n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>