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
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <form action="{{ route('information.search') }}" method="get">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label" for="year" style="margin-left: 1rem;">{{ __('Year') }}</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input name="year" class="custom-select" id="year" style="margin-left: 1rem; font-size: 0.82rem; height:1.8rem;" required>
                                            </div>
                                        </div>
                                    <div class="col-4 text-right">
                                        <input class="btn btn-primary btn-pill d-flex ml-auto mr-auto" name="submit" type="submit" value="Search" style="height:1.8rem; font-size: 0.82rem; line-height: 0.5rem;">
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @if(auth()->user()->role_id != 3)
                            <div class="col-3 text-right">
                                <a href="{{ route('information.create') }}" class="btn btn-sm btn-primary" style="margin-top: 2rem; margin-right: 1rem;">{{ __('Add Information') }}</a>
                            </div>
                        @endif
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
                                <th scope="col">{{ __('Purposes') }}</th>
                                <th scope="col">{{ __('Duration') }}</th>
                                <th scope="col">{{ __('Age') }}</th>
                                <th scope="col">{{ __('Visa Period') }}</th>
                                <th scope="col">{{ __('Passport Number') }}</th>
                                @if(auth()->user()->role_id != 3)
                                    <th scope="col">{{ __('Option') }}</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tourists as $tourist)
                                <tr>
                                    <td>{{ $tourist->nepali_date }}</td>
                                    <td>{{ $tourist->checkpoint->checkpoint_name }}</td>
                                    <td>{{ $tourist->tourist_name }}</td>
                                    <td>{{ $tourist->country->country_name}}</td>
                                    <td>
                                        @if($tourist->tourist_type == 0)
                                            {{ "Domestic" }}
                                        @else
                                            {{ "International" }}
                                        @endif
                                    </td>
                                    <td>{{ $tourist->gender }}</td>
                                    <td>
                                        @foreach($tourist->userpurpose as $p)
                                            {{ $text[] = $p->purpose->purpose }} ,
                                        @endforeach
                                    </td>
                                    <td>{{ $tourist->duration }}</td>
                                    <td>{{ $tourist->age }}</td>
                                    <td>{{ $tourist->visa_period }}</td>
                                    <td>{{ $tourist->passport_number }}</td>
                                    @if(auth()->user()->role_id != 3)
                                        <td>
                                            @if($tourist->editable == 1)
                                                <a class="btn  btn-sm btn-primary" href="{{ route('information.edit', ['id' => $tourist->id]) }}">{{ __('Edit') }}</a>
                                            @else
                                                <button class="btn btn-sm btn-secondary">{{__('UnEditable')}}</button>
                                            @endif
                                        </td>
                                    @endif
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