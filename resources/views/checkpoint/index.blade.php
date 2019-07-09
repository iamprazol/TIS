@extends('layouts.app', ['title' => __('Checkpoint Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="mb-0">{{ __('Checkpoints') }}</h3>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('checkpoint.create') }}" class="btn btn-sm btn-primary">{{ __('Add Checkpoint') }}</a>
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
                                <th scope="col">{{ __('Checkpoint Name') }}</th>
                                <th scope="col">{{ __('Option') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($checkpoints as $checkpoint)
                                <tr>
                                    <td>{{ $checkpoint->checkpoint_name }}</td>
                                    <td>
                                        @if($checkpoint->information->count() == 0 && $checkpoint->exitinfo->count() == 0)
                                            <form action="{{ route('checkpoint.destroy', ['id' => $checkpoint->id]) }}" method="post">
                                                @csrf
                                                <a class="btn  btn-sm btn-primary" href="{{ route('checkpoint.edit', ['id' => $checkpoint->id]) }}">{{ __('Edit') }}</a>
                                                <button class="btn btn-sm btn-warning" type="button" class="dropdown-item" onclick="confirm('{{ __("No Entry and Exit Information associated with this checkpoint. Are you sure you want to delete this checkpoint?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        @else
                                            <a class="btn  btn-sm btn-primary" href="{{ route('checkpoint.edit', ['id' => $checkpoint->id]) }}">{{ __('Edit') }}</a>
                                            <button class="btn btn-sm btn-outline-warning" type="button" class="dropdown-item" onclick="confirm('{{ __("You cannot delete this checkpoint. There are ".$checkpoint->information->count()." Entry Informations and ". $checkpoint->exitinfo->count() . " Exit Information associated with this checkpoint ") }}') ? this.parentElement.submit() : ''">
                                                {{ __('Delete') }}
                                            </button>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $checkpoints->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection