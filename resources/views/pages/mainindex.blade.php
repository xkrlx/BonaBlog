@extends('layouts.app')
@section('header')
    Strona główna

    @endsection
@section('content')
    <div class="row">

    @if($pages)
    @foreach($pages as $page)


            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
    <div class="single-post post-style-1">

        <div class="blog-image"><img src="/images/{{$page->path_img}}" alt="Blog Image"></div>

        <a class="avatar" href="/profile/{{$page->user->id}}"><img src="/images/{{ $page->user->profile_picture }}" alt="Profile Image"></a>

        <div class="blog-info">

            <h4 class="title"><a href="{{route('pages.show', $page)}}"><b>{{$page->title}}</b></a></h4>

            <ul class="post-footer">
                <li>@if ($page->isLiked)
                        <a href="{{ route('page.like', $page->id) }}"><i class="ion-heart"></i>{{ $page->likes()->count()}}</a>
                    @else
                        <a href="{{ route('page.like', $page->id) }}"><i class="ion-ios-heart-outline"></i>{{ $page->likes()->count() }}</a>
                    @endif</li>
                <li><a href="#"><i class="ion-chatbubble"></i>{{$page->comments()->count()}}</a></li>
                <li><a href="#"><i class="ion-eye"></i>{{$page->views}}</a></li>
            </ul>

        </div><!-- blog-info -->
    </div>
    </div>
    </div>

    @endforeach
        @else<h4 class="title">Brak postów do wyświetlenia</h4>
        @endif
    </div>
    <div>{{$pages->links()}}</div>






    @endsection




