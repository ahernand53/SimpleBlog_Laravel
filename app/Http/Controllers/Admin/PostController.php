<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;

use Illuminate\Support\Facades\Storage; //Clase de almacenamiento

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;


class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','DESC')->where('user_id',auth()->user()->id)->paginate();
        return view('admin.posts.index',compact('posts')); //Crea un array con posts o es igual ['posts'=>$posts]
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name','ASC')->pluck('name','id');
        $tags = Tag::orderBy('name','ASC')->get();
        return view('Admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create($request->all());
       
        if($request->file('file')){
            $path= Storage::disk('public')->put('image', $request->file('file'));
            $post->fill(['file'=> asset($path)])->save();
        }
        //Crear sincronización entre las etiquetas creadas y el post
        $post->tags()->attach($request->get('tags'));

       
        
        return redirect()->route('posts.edit',$post->id)->with('info','Entrada creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);
        $this->authorize('pass',$posts);
        return view('admin.posts.show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $this->authorize('pass',$post);

        $categories = Category::orderBy('name','ASC')->pluck('name','id');
        $tags = Tag::orderBy('name','ASC')->get();
        
        return view('admin.posts.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::find($id);
        $this->authorize('pass',$post);
        $post ->fill($request->all())->save();

        
        if($request->file('file')){
            $path= Storage::disk('public')->put('image', $request->file('file'));
            $post->fill(['file'=> asset($path)])->save();
        }
        //Crear sincronización entre las etiquetas creadas y el post
        $post->tags()->sync($request->get('tags'));


        return redirect()->route('posts.edit',$post->id)->with('info','Entrada actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id)->delete();
        $this->authorize('pass',$post);
        return back()->with('info','Eliminado correctamente');
    }
}