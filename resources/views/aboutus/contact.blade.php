@extends('layouts.app', ['title' => __('Contact Us')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row ml-5 mr-5">
            <div class="col-md-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Edit Contact Us') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('contactus.update', ['id' => $contact->id]) }}" autocomplete="off">
                            @csrf
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label for="address" class="form-control-label">{{ __('Address') }}</label>
                                    <input name="address" id="address" class="form-control" value="{{ $contact->address }}">
                                </div>
                            </div>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label for="email" class="form-control-label">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $contact->email }}">                                </div>
                            </div>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label for="phone" class="form-control-label">{{ __('Phone') }}</label>
                                    <input name="phone" id="phone" class="form-control" value="{{ $contact->phone }}">
                                </div>
                            </div>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label for="fax" class="form-control-label">{{ __('Fax') }}</label>
                                    <input name="fax" id="fax" class="form-control" value="{{ $contact->fax }}">
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

        @include('layouts.footers.auth')
    </div>
@endsection