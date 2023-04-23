<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::with('category','user')->paginate(6);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post=new Post();
        $categories=Category::all();
        return view('posts.create',compact('post','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
         //dd($request);
        $user_id=Auth::user()->id;
        $data=$request->all();
        $online = array_key_exists ('online',$data) ? $data['online'] : 0 ; //aller chercher si la cle online existe dans  datas
        Post::create([
            'title'=>$data['title'],
            'body'=>$data['body'],
            'online' => ($online == 'on' ? 1 : 0),
            'user_id'=>$user_id,
            'category_id'=>$data['category'],
        ])->saveOrFail();

        session()->flash('status','votre post a ete creer avec success');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $categories=Category::all();
        return view('posts.update',compact('post','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //si l'utilisateur connecter n'a pas le meme id que celui qui a creer le post alors aura une erreur 403
        if (! Gate::allows('update-post', $post)) {
            //abort(403);
            session('error','Vous n\'avez pas le droit de modifer le post!');
           return back();
        }

        $user_id=Auth::user()->id;
        $data=$request->all();

        $online = array_key_exists ('online',$data) ? $data['online'] : 0 ; //aller chercher si la cle online existe dans  datas
        $post->update([
            'title'=>$data['title'],
            'body'=>$data['body'],
            'online' => ($online == 'on' ? 1 : 0),
            'user_id'=>$user_id,
            'category_id'=>$data['category'],
        ]);

        session()->flash('status','votre post a ete modifier  avec success!');
        return redirect()->route('posts.index',compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('status','votre post a ete supprimer!');
        return redirect()->route('posts.index');
    }

    //afficher la view de login

}
