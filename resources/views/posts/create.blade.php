@extends('layouts.app')
@section('title', 'create')
@section('content')
<div class="form-container w-100 m-auto">
    <form action="{{route('posts.store')}}" method="post">
        @csrf
       @component('compoments.input',[
        'title'=>'Title',
        'name'=>'title',
        'type'=>'text',
        'value'=>''
       ])
        @endcomponent
        @component('compoments.input',[
            'title'=>'Categories',
            'name'=>'category',
            'type'=>'select',
            'options'=>$categories,
            'value' =>''
           ])
            @endcomponent

        @component('compoments.input',[
            'title'=>'Description',
            'name'=>'body',
            'type'=>'textarea',
            'value'=>''
        ])
        @endcomponent

        @component('compoments.input',[
            'title'=>'En ligne ?',
            'name'=>'online',
            'type'=>'checkbox',
            'value'=>True
        ])
        @endcomponent
        <button type="submit" class="btn btn-primary mt-3 text-dark fw-bold">Creer</button>
    </form>
</div>


@endsection
