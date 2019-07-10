@extends('layouts.bono')
@section('content')




        <div class="col-lg-2 col-md-0"></div>
        <div class="col-lg-8 col-md-12 no-right-padding">
            <br class="post-wrapper">
                <div class="post-info">

                    <div class="left-area">
                        <a class="avatar" href="/profile/{{$page->user->id}}"><img src="/images/{{ $page->user->profile_picture }}" alt="Profile Image"></a>
                    </div>

                    <div class="middle-area">
                        <a class="name" href="#"><b>{{ $page->user->name }}</b></a>
                        <h6 class="date">{{$page->created_at}}</h6>
                    </div>
                    <div class="right-area">
                        @if ($page->isLiked)
                            <a href="{{ route('page.like', $page->id) }}"><i class="ion-heart">You and {{ $page->likes()->count()-1 }} likes this</i></a>
                        @else
                            <a href="{{ route('page.like', $page->id) }}"><i class="ion-ios-heart-outline">{{ $page->likes()->count() }} likes this</i></a>
                        @endif
                    </div>


                </div><!-- post-info -->

                    <small> <i class="fa fa-thumbs-up"></i></small>




                <h3 class="title"><a><b>{{$page->title}}</b></a></h3>

                <p class="para">{!! $page->body !!}</p>
                <p class="para"></p>

                <div class="post-image"><img src="/images/{{$page->path_img}}" alt="Blog Image"></div>
                <br/>
                <br/>


                @if(Auth::user())
                @if($page->user_id==Auth::user()->id or Auth::user()->hasRole('moderator'))

                        <button class="btn load-more-btn"><a href="/page/{{$page->id}}/edit" class="load-more-btn">Edytuj</a></button><br/>
                    <form action="{{route('pages.delete', $page->id)}}" method="POST">
                        <input  type="hidden" name="_token" value="{{csrf_token()}}">
                        <button class="btn load-more-btn">Usuń post</button>
                    </form>


                @endif
                @endif
            </div><!-- post-wrapper -->
        </div><!-- col-sm-8 col-sm-offset-2 -->



@endsection

@section('comments')

    <div class="col-lg-8 col-md-12">

        <div class="comment-form">
            <h4><b>POST COMMENT</b></h4>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="btn btn-danger btn-xl js-scroll-trigger">{{ $error }}</div>
                @endforeach
            @endif
            <div id="comment-form " class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
                {{ Form::open(['route' => ['comments.store', $page->id], 'method' => 'POST']) }}

                <div class="row">
                @if(Auth::user())
                        <div class="col-sm-6">
                            {{ Form::text('name', Auth::user()->name, ['class' => 'form-control','placeholder'=>"Nick"]) }}
                        </div>

                @else
                    <div class="col-sm-6">
                        {{ Form::text('name', null, ['class' => 'form-control','placeholder'=>"Nick"]) }}
                    </div>
                    @endif



                    <div class="col-sm-12">
                        {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '2','placeholder'=>"Komentarz"]) }}

                        {{ Form::submit('Dodaj komentarz', ['class' => 'submit-btn', 'style' => 'margin-top:15px;']) }}
                    </div>
                </div>

                {{ Form::close() }}

        </div><!-- comment-form -->
                <h4><b>Komentarze({{$page->comments->count()}})</b></h4>

        @foreach($page->comments as $comment)
                    <div class="commnets-area">
                    <div class="comment">
                        <div class="post-info">

                                <a class="name" ><b>{{$comment->name}}</b></a>
                                <h6 class="date">{{$comment->created_at}}</h6>


                            <div class="right-area">
                                @if(Auth::user())
                                    @if(Auth::user()->hasRole('moderator'))
                                        <form action="{{route('comments.delete',$comment->id)}}" method="GET">
                                        <button class="btn btn-block">Usuń komentarz</button>
                                        </form>
                                    @endif
                                @endif

                            </div>

                        </div><!-- post-info -->

                        <p><i>{{$comment->comment}}</i></p>



                    @foreach($comment->replies as $reply)
                        <div class="comment" style="padding-left: 40px">
                            <div class="post-info">

                                <a class="name"><b>{{$reply->name}}</b></a>
                                <h6 class="date">{{$reply->created_at}}</h6>


                                <div class="right-area">


                                    @if(Auth::user())
                                        @if(Auth::user()->hasRole('moderator'))
                                            <form action="{{route('reply.delete',$reply->id)}}" method="GET">
                                                <button class="btn btn-block">Usuń komentarz</button>
                                            </form>
                                        @endif
                                    @endif
                                </div>

                            </div><!-- post-info -->
                            <p><i>{{$reply->comment}}</i></p>
                            </div>
                        @endforeach


                        {{ Form::open(['route' => ['reply.store',$comment->id], 'method' => 'POST']) }}

                        <div class="form-group">
                            @if(Auth::user())
                                {{ Form::text('name', Auth::user()->name, ['class' => 'form-control','placeholder'=>"Nick",'style' => 'margin-top:25px;']) }}


                            @else
                                {{ Form::text('name', null, ['class' => 'form-control','placeholder'=>"Nick",'style' => 'margin-top:25px;']) }}

                            @endif



                            {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '2','placeholder'=>"Komentarz"]) }}


                            {{ Form::submit('Odpowiedz', ['class' => 'btn btn-warning', 'style' => 'margin-top:15px;']) }}
                        </div>

                        {{ Form::close() }}

                    </div>


                    </div>
            @endforeach







    </div><!-- col-lg-8 col-md-12 -->

    @endsection
