@extends('layouts.app', ['title' => __('About Us')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Edit About Us') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('aboutus.update', ['id' => $about->id]) }}" autocomplete="off">
                            @csrf
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label for="description" class="form-control-label">{{ __('Description') }}</label>
                                    <textarea name="description" id="description" cols="30" rows="20" class="form-control">{{ $about->description }}</textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Edit Message') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('message.update', ['id' => $message->id]) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="title">{{ __('Title') }}</label>
                                    <input name="title" id="title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title', $message->title) }}" required>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description" class="form-control-label">{{ __('Description') }}</label>
                                    <textarea name="description" id="description" cols="20" rows="10" class="form-control">{{ $message->description }}</textarea>
                                </div>
                                <div class="form-group {{ $errors->has('picture') ? ' has-danger' : '' }}">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label for="picture" class="form-control-label" >{{ __('Upload a picture') }}</label>
                                            <p style="font-size: 14px; font-weight: 600">Old Image :</p>
                                            @if ("{{ asset('argon') }}/img/districts/places/{{ $message->picture }}")
                                                <img src="{{ asset('argon') }}/img/districts/places/{{ $message->picture }}"   style="width: 80px; height: 80px;">
                                            @else
                                                <p>No image found</p>
                                            @endif
                                        </div>
                                        <div class="col-md-7">
                                            <label for="picture" class="form-control-label" >Change Image ( Leave the field if don't want to ):</label>
                                            <input type="file" id="picture" name="picture" class="form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}" placeholder="Choose a place picture to upload" value="{{ $message->picture }}"/>
                                            @if ($errors->has('picture'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('picture')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
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