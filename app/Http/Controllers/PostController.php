<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Author;
use App\Tag;
use App\Mail\PostCreated;
use Illuminate\Support\Facades\Mail;
use App\Mail\TagsUsed;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\NotTaggedControllerValueResolver;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $tags = Tag::all();
        return view('post.create', compact('authors', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $path = $request->file('image')->store('images');

        // dd($path);
        $post = new Post();
        $post->fill($data);
        $post->image = $path;
        // dd($post->image);
        $post->save();

        $post->tags()->attach($data['tags']);

        // mail con markdown: all'invio di ogni post, invia tutti i tags del post
        $allTags = Tag::all();
        // dd($data['tags']);


        $tagsObject = [];
        foreach($allTags as $tagObject) {
            if(in_array($tagObject->id, $data['tags'])) {
                $tagsObject[] = $tagObject;
            }
        }

        $tagsMail = new TagsUsed($tagsObject);
        Mail::to('b70847667f-272c59@inbox.mailtrap.io')->send($tagsMail);

        // mail all'invio di ogni post
        $mailableObject = new PostCreated($post);
        Mail::to('b70847667f-272c59@inbox.mailtrap.io')->send($mailableObject);



        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
