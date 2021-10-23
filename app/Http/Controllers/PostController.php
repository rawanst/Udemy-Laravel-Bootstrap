<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdatePictureRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index (){
        $posts = Post::orderBy('updated_at', 'DESC')->get();
        return view('posts.list', compact('posts'));
    }

    public function details($id)
    {
        $post = Post::find($id); //Post seul communique avec DB
        $categories = Category::all();
        return view('posts.details', compact(['post', 'categories']));
    }

    public function add()
    {
        $categories = Category::all();
        return view('posts.add', compact('categories'));
    }
    public function store(PostStoreRequest $request)
    {
        $params = $request ->validated();
        $file = Storage::put('public', $params['picture']);
        $params['picture'] = substr($file,7);
        $params['user_id'] = auth()->user()->id;
        $post = Post::create($params);
        if (!empty($params['categories']))
        {
            $post->categories()->attach($params['categories']);
        }
        return redirect()->route('postList');
    }

    public function update($id, PostUpdateRequest $request)
    {
        $params = $request ->validated();
        $post = Post::find($id);
        $post->update($params);
        $post->categories()->detach();
        if(!empty($params['checkBoxCategories'])){
            $post->categories()->attach($params['checkBoxCategories']);
        }
        return redirect()->route('postDetails', $id);
    }

    public function updatePicture ($id, PostUpdatePictureRequest $request){
        $params = $request ->validated();
        $post = Post::find($id);
        if(Storage::exists('public/$post->picture')) {
            Storage::delete('public/$post->picture');
        }
        $file = Storage::put('public', $params['picture']);
        $params['picture'] = substr($file,7);
        $post->picture = $params['picture'];
        $post->save();
        return redirect()->route('postDetails', $id);
    }

    public function delete ($id)
    {
        $post = Post::find($id);

        if(Storage::exists("public/$post->picture") === true) {
            Storage::delete("public/$post->picture");
        }
        $post->categories()->detach();
        $post->delete();
        return redirect()->route('postList');
    }
}
