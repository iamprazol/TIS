@extends('layouts.app', ['title' => __('Information Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Tourists') }}</h3>
                            </div>
                        </div>
                        <hr style="margin-bottom: 1rem !important;">
                    </div>
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

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Created At') }}</th>
                                <th scope="col">{{ __('Checkpoint') }}</th>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Country Name') }}</th>
                                <th scope="col">{{ __('Type') }}</th>
                                <th scope="col">{{ __('Gender') }}</th>
                                <th scope="col">{{ __('Option') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($requests as $request)
                                <tr>
                                    <td>{{ $request->information->nepali_date }}</td>
                                    <td>{{ $request->information->checkpoint->checkpoint_name }}</td>
                                    <td>{{ $request->information->tourist_name }}</td>
                                    <td>{{ $request->information->countries->country_name}}</td>
                                    <td>
                                        @if($request->information->tourist_type == 0)
                                            {{ "Domestic" }}
                                        @else
                                            {{ "International" }}
                                        @endif
                                    </td>
                                    <td>{{ $request->information->gender }}</td>
                                    <td>
                                        @if($request->approved == 0)
                                            <a class="btn  btn-sm btn-primary" href="{{ route('request.approve', ['id' => $request->id]) }}">{{ __('Approve') }}</a>
                                            <a class="btn  btn-sm btn-danger" href="{{ route('request.reject', ['id' => $request->id]) }}">{{ __('Reject') }}</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection