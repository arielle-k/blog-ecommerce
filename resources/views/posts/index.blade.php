@extends('layouts.app')

@section('title', 'home')
@section('content')
@component('compoments.session')@endcomponent
<div class="d-flex flex-wrap">
        @foreach($posts as $post)
            <div class="col-md-4 py-3 px-3">
                <div class="card-group">
                <div class="card w-100">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <span class="fw-bold text-info">{{$post->category->name}}</span>
                        <p class="card-text">{{$post->body}}</p>
                        <div class="d-flex ">
                            <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary me-2">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <form action="{{route('posts.destroy',$post)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger bg-danger ml-2">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent text-muted text-small border-0">
                        <small>Depuis le {{$post->created_at->format('d M Y')}} par {{$post->user->name}} </small>
                    </div>
                </div>
            </div>
            </div>
        @endforeach
    </div>
{{$posts->links()}}
@endsection


