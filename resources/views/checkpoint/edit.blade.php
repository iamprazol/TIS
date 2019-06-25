@extends('layouts.app', ['title' => __('Checkpoint Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Edit Checkpoint')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Checkpoint Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('checkpoint.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('checkpoint.update', ['id' => $checkpoint->id]) }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Checkpoint') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="checkpoint_name">{{ __('Checkpoint Name') }}</label>
                                    <input name="checkpoint_name" id="checkpoint_name" class="form-control form-control-alternative{{ $errors->has('checkpoint_name') ? ' is-invalid' : '' }}" value="{{ old('checkpoint_name', $checkpoint->checkpoint_name) }}" required>
                                    @if ($errors->has('checkpoint_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('checkpoint_name') }}</strong>
                                        </span>
                                    @endif
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