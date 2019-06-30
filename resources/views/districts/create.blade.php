@extends('layouts.app', ['title' => __('District Information Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Information')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('District Information Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('districts.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
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
                        <form method="post" action="{{ route('districts.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('District Information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('district_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="district_name">{{ __('District Name') }}</label>
                                    <input name="district_name" id="district_name" class="form-control form-control-alternative{{ $errors->has('district_name') ? ' is-invalid' : '' }}" placeholder="{{ __('District Name') }}" value="{{ old('district_name') }}" required>

                                    @if ($errors->has('district_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('district_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('picture') ? ' has-danger' : '' }}">
                                    <label for="picture" class="form-control-label" >{{ __('Upload a picture') }}</label>
                                    <div class="col-md-6">
                                        <input type="file" id="picture" name="picture" class="form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}" placeholder="Choose a district picture to upload" value="{{ old('picture') }}" required/>
                                        @if ($errors->has('picture'))
                                            <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('picture')}}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="form-control-label">{{ __('Description') }}</label>
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Describe the speciality of the mentioned district"></textarea>
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