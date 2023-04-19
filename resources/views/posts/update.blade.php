@extends('layout')
@section('title','home')
@section('content')

<div class="form-container w-100 m-auto">
    <form action="{{route('posts.update',$post)}}" method="post">
        @method('PUT')
        @csrf
       @component('compoments.input',[
        'title'=>'Title',
        'name'=>'title',
        'type'=>'text',
        'value'=>$post->title
       ])
        @endcomponent
        @component('compoments.input',[
            'title'=>'Categories',
            'name'=>'category',
            'type'=>'select',
            'options'=>$categories,
            'value'=>$post->category_id
           ])
            @endcomponent

        @component('compoments.input',[
            'title'=>'Description',
            'name'=>'body',
            'type'=>'textarea',
            'value'=>$post->body
        ])
        @endcomponent

        @component('compoments.input',[
            'title'=>'En ligne ?',
            'name'=>'online',
            'type'=>'checkbox',
            'value'=>$post->online
        ])
        @endcomponent
        <button type="submit" class="btn btn-primary mt-3">Modifier</button>
    </form>
</div>


@endsection
