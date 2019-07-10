@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user())
                        Nie masz dostepu do tej opcji

                        @else Zaloguj się aby mieć dostęp do tej opcji

                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
