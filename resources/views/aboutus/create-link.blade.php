@extends('layouts.app', ['title' => __('Contact Us')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Add Useful Links') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('link.store') }}" autocomplete="off">
                            @csrf
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('display_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="display_name">{{ __('Display Name') }}</label>
                                    <input name="display_name" id="display_name" class="form-control form-control-alternative{{ $errors->has('display_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Display Name') }}" value="{{ old('display_name') }}" required>

                                    @if ($errors->has('display_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('display_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="link">{{ __('Link') }}</label>
                                    <input name="link" id="link" class="form-control form-control-alternative" placeholder="{{ __('http://www.atithigandaki.com') }}" value="{{ old('link') }}" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
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