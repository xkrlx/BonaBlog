@extends('layouts.app')
@section('header')
    Edytuj post
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            {!! Form::model($page,['route' => ['pages.update', $page->id], 'files'=>true] ) !!}

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="btn btn-danger btn-xl js-scroll-trigger">{{ $error }}</div>
                @endforeach
            @endif

            <div class="col-sm-12">
                {!! Form::label('title', "Title:", ['class'=>"comment-form"]) !!}
                {!! Form::text('title', null, ['class'=>'form-control','placeholder'=>"Tytuł"]) !!}
            </div>

            <div class="col-sm-12">
                {!! Form::label('body', "Treść:") !!}
                {!! Form::textarea('body', null, ['id'=>'article-ckeditor' ,'class'=>'form-control','placeholder'=>"Treść"]) !!}
            </div>

            <div class="col-sm-12">
                {!! Form::hidden('views', null) !!}

            </div>

            <div class="col-sm-12">

                {{Form::select("category",['News','Sport','Inne'
                ], null,
                     [
                        "class" => "load-more-btn",
                        "placeholder" => "Wybierz kategorie"
                     ])
        }}
            </div>

            <div class="col-sm-12">
                {!! Form::label('select_file', "Zmień obraz:") !!}
                {!! Form::file('select_file', null, ['class'=>'btn btn-dark']) !!}
            </div>





                <div class="col-sm-12">
                {!! Form::submit('Zapisz', ['class'=>'load-more-btn']) !!}
                {!! link_to(URL::previous(), 'Powrót', ['class' => 'load-more-btn']) !!}
            </div>

            {!! Form::close() !!}
        </div>

    </div>
    </div>
@endsection




