@extends('layouts.app', ['title' => __('Carousel Information Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Edit Information')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Carousel Information Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('carousel.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
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
                        <form method="post" action="{{ route('carousel.update', ['id' => $carousel->id]) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Carousel Information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="title">{{ __('Title') }}</label>
                                    <input name="title" id="title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('eg. district Name') }}" value="{{ old('title', $carousel->title) }}" required>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('picture') ? ' has-danger' : '' }}">
                                    <label for="picture" class="form-control-label" >{{ __('Upload a picture') }}</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p style="font-size: 14px; font-weight: 600">Old Image :</p>
                                            @if ("{{ asset('argon') }}/img/carousel/{{ $carousel->picture }}")
                                                <img src="{{ asset('argon') }}/img/carousel/{{ $carousel->picture }}"  style="height: 30vh;">
                                            @else
                                                <p>No image found</p>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <p style="font-size: 14px; font-weight: 600">Change Image ( Leave the field if don't want to ):</p>
                                            <input type="file" id="picture" name="picture" class="form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}" placeholder="Choose a place picture to upload" value="{{ $carousel->picture }}"/>
                                            @if ($errors->has('picture'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('picture')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tag" class="form-control-label">{{ __('tag') }}</label>
                                    <input name="tag" id="tag" class="form-control" placeholder="{{ __('Describe picture in short') }}" value="{{ old('tag', $carousel->tag) }}" required>
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