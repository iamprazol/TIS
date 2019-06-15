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
                                <h3 class="mb-0">{{ __('Exiting Tourists Information') }}</h3>
                            </div>
                        </div>
                        <hr style="margin-bottom: 1rem !important;">
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <form action="{{ route('exit.search') }}" method="get">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-control-label" for="from" style="margin-left: 1rem;">{{ __('From') }}</label>
                                                    <div class="form-group">
                                                        <input name="from" class="form-control" id="from" style="margin-left: 1rem; font-size: 0.82rem; height:1.8rem;"  placeholder="2076-02-15" value="{{ old('from') }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-control-label" for="to" style="margin-left: 1rem;">{{ __('To') }}</label>
                                                    <div class="form-group">
                                                        <input name="to" class="form-control" id="to" style="margin-left: 1rem; font-size: 0.82rem; height:1.8rem;" placeholder="2076-02-16"  value="{{ old('to') }}" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <input class="btn btn-primary btn-pill d-flex ml-auto mr-auto" name="submit" type="submit" value="Search" style="height:1.8rem; font-size: 0.82rem; line-height: 0.5rem; margin-top: 1.9rem;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @if(auth()->user()->role_id != 3)
                            <div class="col-3 text-left">
                                <a href="{{ route('exit.create') }}" class="btn btn-sm btn-primary" style="margin-top: 2rem; margin-right: 1rem;">{{ __('Add Exit Information') }}</a>
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
                                <th scope="col">{{ __('Passport Number') }}</th>
                                <th scope="col">{{ __('Reviews') }}</th>
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
                                    <td>{{ $tourist->passport_number }}</td>
                                    <td>{{ substr($tourist->reviews, $limit = 20) }}</td>
                                    @if(auth()->user()->role_id != 3)
                                        <td>
                                            <a class="btn  btn-sm btn-danger" href="{{ route('exit.delete', ['id' => $tourist->id]) }}">{{ __('Delete') }}</a>

                                            {{-- @if(auth()->user()->role_id != 1)
                                                 @if(auth()->user()->checkpointuser->checkpoint_id == $tourist->checkpoint_id)
                                                     @if($tourist->editable == 1)
                                                         <a class="btn  btn-sm btn-primary" href="{{ route('information.edit', ['id' => $tourist->id]) }}">{{ __('Edit') }}</a>
                                                     @else
                                                         <a class="btn btn-sm btn-success" href="{{ route('request.sent', ['id' => $tourist->id]) }}">{{__('Request For Edit')}}</a>
                                                     @endif
                                                 @else
                                                     <a class="btn btn-sm btn-secondary">{{__('Uneditable')}}</a>
                                                 @endif
                                             @else
                                                 <a class="btn  btn-sm btn-primary" href="{{ route('information.edit', ['id' => $tourist->id]) }}">{{ __('Edit') }}</a>
                                             @endif--}}
                                        </td>
                                    @endif
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