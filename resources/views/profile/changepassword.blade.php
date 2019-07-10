@extends('layouts.bono')
@section('header')
    Mój profil
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-12 no-right-padding">
            <br class="post-wrapper">
            <div class="post-info">

                <div class="left-area">
                    <a class="avatar" href="#"><img src="/images/{{ $user->profile_picture }}" alt="Profile Image"></a>
                </div>
                <div class="middle-area">
                    <h6 class="date">Data dołączenia: {{$user->created_at}}</h6>
                </div>
            </div>
        </div>

        {!! Form::open(['route' => ['profile.updatepassword', $user->id], 'files'=>true] ) !!}

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="btn btn-danger btn-xl js-scroll-trigger">{{ $error }}</div>
            @endforeach
        @endif

        <div class="col-sm-12">
            {!! Form::password('current', null, ['class'=>'form-control','placeholder'=>"Stare hasło"]) !!}
        </div>
        <br/>
        <div class="col-sm-12">
            {!! Form::password('password', null, ['class'=>'form-control','placeholder'=>"Nowe hasło"]) !!}
        </div>

        <div class="col-sm-12">
            {!! Form::password('password_confirmation', null, ['class'=>'form-control','placeholder'=>"Powtórz nowe hasło"]) !!}
        </div>

        <br/>

        <div class="col-sm-12">
            {!! Form::submit('Zmień hasło', ['class'=>'btn load-more-btn']) !!}
            {!! link_to(URL::previous(), 'Powrót', ['class' => 'btn load-more-btn']) !!}
        </div>

        {!! Form::close() !!}







    </div>

@endsection




