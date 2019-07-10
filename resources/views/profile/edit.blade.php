@extends('layouts.bono')
@section('header')
    Mój profil
@endsection
@section('content')
    <div class="row">

        <div class="col-lg-8 col-md-12 no-right-padding">
            <h1>Edycja danych</h1>
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
        <div class="col-lg-12 col-md-12">
        {!! Form::model($user,['route' => ['profile.update', $user->id], 'files'=>true] ) !!}

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="btn btn-danger btn-xl js-scroll-trigger">{{ $error }}</div>
            @endforeach
        @endif

        <div class="col-sm-12">
            {!! Form::label('name', "Nick:", ['class'=>"comment-form"]) !!}
            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>"Nick"]) !!}
        </div>

            <div class="col-sm-12">
                {!! Form::label('email', "Email:", ['class'=>"comment-form"]) !!}
                {!! Form::text('email', null, ['class'=>'form-control','placeholder'=>"Email"]) !!}
            </div>

            <div class="col-sm-12">
                {!! Form::label('about',"O mnie", ['class'=>'comment-form']) !!}
                {!! Form::textarea('about_me', null, ['class'=>'form-control','placeholder'=>"O mnie"]) !!}
            </div>

            <div class="col-sm-12">
                {!! Form::label('profile_picture', "Zmień zdjęcie:", ['class'=>'comment-form']) !!}
                {!! Form::file('profile_picture', null, ['class'=>'btn load-more-btn']) !!}
            </div>

                <div class="col-sm-12">
            {!! Form::submit('Zapisz', ['class'=>'btn load-more-btn']) !!}
            {!! link_to(URL::previous(), 'Powrót', ['class' => 'btn load-more-btn']) !!}
        </div>

        {!! Form::close() !!}
        </div>









    </div>
    </div>

@endsection




