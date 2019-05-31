@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Users') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Add Checkpoint user') }}</a>
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
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Checkpoint') }}</th>
                                    <th scope="col">{{ __('Email') }}</th>
                                    <th scope="col">{{ __('Phone Number') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col">{{__('Option')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->full_name }}</td>
                                        <td>
                                            @if($user->checkpointuser != null)
                                                {{ $user->checkpointuser->checkpoint->checkpoint_name }}
                                            @else
                                                {{ 'Null' }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                        </td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            @if($user->disable == 0)
                                                @if($user->role_id == 2)
                                                    <a class="btn btn-sm btn-twitter" href="{{ route('make.admin', ['id' => $user->id]) }}">{{ __('Make Admin') }}</a>
                                                @elseif($user->role_id == 1)
                                                    <a class="btn btn-sm btn-twitter" href="{{ route('remove.admin', ['id' => $user->id]) }}">{{ __('Remove Admin') }}</a>
                                                @else
                                                    {{ 'Guest' }}
                                                @endif
                                            @else
                                                {{ 'Disabled' }}
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    @if($user->disable == 0)
                                                        <a class="dropdown-item" href="{{ route('disable.user', ['id' => $user->id]) }}">{{ __('Disable User') }}</a>
                                                    @else
                                                        <a class="dropdown-item" href="{{ route('enable.user', ['id' => $user->id]) }}">{{ __('Enable User') }}</a>
                                                    @endif
                                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Edit') }}</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $users->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection