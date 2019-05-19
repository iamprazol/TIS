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
                            <div class="col-4 text-right">
                                <a href="{{ route('information.create') }}" class="btn btn-sm btn-primary">{{ __('Add Information') }}</a>
                            </div>
                        </div>
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
                                <th scope="col">{{ __('Checkpoint') }}</th>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Country Name') }}</th>
                                <th scope="col">{{ __('Purpose') }}</th>
                                <th scope="col">{{ __('Age') }}</th>
                                <th scope="col">{{ __('Visa Period') }}</th>
                                <th scope="col">{{ __('Option') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tourists as $tourist)
                                <tr>
                                    <td>{{ $tourist->checkpoint->checkpoint_name }}</td>
                                    <td>{{ $tourist->tourist_name }}</td>
                                    <td>{{ $tourist->country_name}}</td>
                                    <td>{{ $tourist->purpose->purpose }}</td>
                                    <td>{{ $tourist->age }}</td>
                                    <td>{{ $tourist->visa_period }}</td>
                                    <td>
                                        @if($tourist->editable == 1)
                                            <a class="btn  btn-sm btn-primary" href="{{ route('information.edit', ['id' => $tourist->id]) }}">{{ __('Edit') }}</a>
                                        @else
                                            <button class="btn btn-sm btn-secondary">{{__('UnEditable')}}</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $tourists->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection