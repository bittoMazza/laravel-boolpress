<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Post;
use App\Model\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\VarDumper\Cloner\Data;

use function GuzzleHttp\Promise\all;

class PostController extends Controller
{

    protected $validationRules = [
                    
        'title' => 'required|min:5|max:255',
        'thumb' => 'required|image|max:265',
        'post_content' => 'required|min:3|max:200',
        'tags' => 'exists:tags,id'  
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::user()->posts;
        return view ('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $post = new Post();
        return view('admin.posts.create',compact('post','categories','tags'));
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
             
      
        $validatedData = $request->validate($this->validationRules); 

        $post = new Post();

        $data['user_id'] = Auth::user()->id;

        $data['post_date'] = date('Y-m-d H:i:s');

        $data['thumb'] = Storage::put('uploads',$data['thumb']);

        $post->fill($data); 

        $post->save();
        
         
        if (isset($curr_post['tags'])) {
            $post->tags()->sync($curr_post['tags']);
        }


        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $post = Post::findOrFail($id);
        return view('admin.posts.edit',compact('post','categories','tags'));
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

        
        $curr_post = $request->all();
        
        $validatedData = $request->validate($this->validationRules); 

        $post = Post::findOrFail($id);
        
        $curr_post['thumb'] = Storage::put('uploads',$curr_post['thumb']);

        $post->fill($curr_post); // Facciamo il fill di post con i dati di curr_post
       
        if (isset($curr_post['tags'])) {
            $post->tags()->sync($curr_post['tags']);
        }
        else
        {
            $post->tags()->detach();
        }

        $post->save();

        return redirect()->route('admin.posts.index')->with('update',$post->title); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('delete',$post->title);
    }
}
