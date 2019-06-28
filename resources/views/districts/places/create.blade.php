@extends('layouts.app', ['title' => __('Places Information Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Information')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Places Information Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('places.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
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
                        <form method="post" action="{{ route('places.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Place Information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="district_id">{{ __('District Name') }}</label>
                                            <div class="form-group">
                                                <select name="district_id" class="custom-select" id="district_id" required>
                                                    <option value="" selected="">Choose One</option>
                                                    @foreach($districts as $district)
                                                        <option value="{{ $district->id }}">{{ $district->district_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('place_name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="place_name">{{ __('Place Name') }}</label>
                                            <input name="place_name" id="place_name" class="form-control form-control-alternative{{ $errors->has('place_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Place Name') }}" value="{{ old('place_name') }}" required>

                                            @if ($errors->has('place_name'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('place_name') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('picture') ? ' has-danger' : '' }}">
                                    <label for="picture" class="form-control-label" >{{ __('Upload a picture') }}</label>
                                    <div class="col-md-6">
                                        <input type="file" id="picture" name="picture" class="form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}" placeholder="Choose a place picture to upload" value="{{ old('picture') }}" required/>
                                        @if ($errors->has('picture'))
                                            <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('picture', 'Image size must be less than 15 MB')}}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="form-control-label">{{ __('Description') }}</label>
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-success mt-4" type="submit" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want add this information") }}') ? this.parentElement.submit() : ''">
                                        {{ __('Save') }}
                                    </button>
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