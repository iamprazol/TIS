@extends('layouts.app', ['title' => __('Contact Us')])

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
                            <div class="col-6">
                                <h3 class="mb-0">{{ __('Useful Links') }}</h3>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('link.create') }}" class="btn btn-sm btn-primary">{{ __('Add Link') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Display Name') }}</th>
                                    <th scope="col">{{ __('Link') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($usefullinks as $link)
                                    <tr>
                                        <td>{{ $link->display_name }}</td>
                                        <td>
                                            <form action="{{ route('link.destroy', ['id' => $link->id]) }}" method="post">
                                                @csrf
                                                <a class="btn  btn-sm btn-primary" href="{{ route('link.edit', ['id' => $link->id]) }}">{{ __('Edit') }}</a>
                                                <button class="btn btn-sm btn-warning" type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this link?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Edit Contact Us') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('contactus.update', ['id' => $contact->id]) }}" autocomplete="off">
                            @csrf
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