@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        <div class="col-sm-11 tab-content" id="nav-pills-tipo">

            <div class="tab-pane fade show active" id="tipo1" role="tabpanel">
                <div class="table-responsive pb-0">
                    <table class="table table-hover " id="tabela-dados">

                        <thead>
                            <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            @if ( $Admin == 1 )
                                <th><a>Editar</a></th>
                                <th><a>Apagar</a></th>
                            @else
                                @if ($Editar ?? '' == 1 )
                                <th>Editar</th>

                                @endif
                                @if ($Apagar ?? '' == 1 )
                                <th>Apagar</th>

                                @endif

                            @endif

                        </tr>
                        </thead>
                        <tbody>
                            {{$Admin}};
                            {{$Apagar ?? ''}};
                            {{$Editar ?? ''}};
                            @foreach ($users as $user)
                                <tr >
                                    @if ( $Admin != 1 && $user->id == $use->id)
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>

                                    @else
                                        @if ( $Admin == 1 )
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            @if ($Editar == 1 )
                                                <th>Editar</th>
                                            @endif
                                            @if ($Apagar  == 1 )
                                                <th>Apagar</th>
                                            @endif
                                        @else

                                        @endif

                                    @endif


                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

    </div>
</div>
@endsection
