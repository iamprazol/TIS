@extends('layouts.app', ['title' => __('Purpose Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="mb-0">{{ __('Purposes') }}</h3>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('purpose.create') }}" class="btn btn-sm btn-primary">{{ __('Add Purpose') }}</a>
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
                                <th scope="col">{{ __('Purpose') }}</th>
                                <th scope="col">{{ __('Option') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($purposes as $purpose)
                                <tr>
                                    <td>{{ $purpose->purpose }}</td>
                                    <td>
                                        @if(auth()->user()->role_id == 1)
                                            <form action="{{ route('purpose.destroy', ['id' => $purpose->id]) }}" method="post">
                                                @csrf
                                                <a class="btn  btn-sm btn-primary" href="{{ route('purpose.edit', ['id' => $purpose->id]) }}">{{ __('Edit') }}</a>
                                                <button class="btn btn-sm btn-warning" type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this purpose? All the datas related with this purpose will be deleted!!!") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        @else
                                            @if($purpose->editable == 1)
                                                <a class="btn  btn-sm btn-primary" href="{{ route('purpose.edit', ['id' => $purpose->id]) }}">{{ __('Edit') }}</a>
                                            @else
                                                <button class="btn  btn-sm btn-default">{{ __('UnEditable') }}</button>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $purposes->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection