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

        <br class="row">
        <div class="col-lg-6 col-md-3"><h3 class="title">Nazwa:</h3></div>
        <div class="col-lg-6 col-md-3"><h3 class="title"><b>{{$user->name}}</b></h3></div><br/>
        <div class="col-lg-6 col-md-3"><h3 class="title">O mnie:</h3></div><br/>
        <div class="col-lg-6 col-md-3"><h3 class="title"><b>{{$user->about_me}}</b></h3></div><br/>







    </div>

@endsection




