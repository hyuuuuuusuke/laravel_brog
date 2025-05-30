<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    const LOCAL_STORAGE_FOLDER = 'public/images/';

    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $all_posts = $this->post->latest()->get();

        return view('posts.index')
                    ->with('all_posts', $all_posts);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        # 1. Validate the request
        $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:1000',
            'image'=> 'required|mimes:jpeg,jpg,png,gif|max:1048'
        ]);
            //mimes - multiple purpose internet mail extension

        # 2. save the form data to the db
        $this->post->user_id = Auth::user()->id;
        //Auth::user() - contains the entire record of the logged in user except for the password
        //owner of the post = id of the logged in user
        $this->post->title = $request->title;
        $this->post->body = $request->body;
        $this->post->image = $this->saveImage($request);
        $this->post->save();

        # 3. back to homepage
        return redirect()->route('index');
    }

    private function saveImage($request)
    {
        //change the name of the image to the CURRENT TIME to avoid overwriting.
        $image_name = time() ."." . $request->image->extension();

        //save the image inside storage/app/public/images
        $request->image->storeAs(self::LOCAL_STORAGE_FOLDER, $image_name);

        return $image_name;
    }

    public function show($id)
    {
        $post = $this->post->findOrFail($id);

        return view('posts.show')
                    ->with('post', $post);
    }

    public function edit($id)
    {
        $post = $this->post->findORFail($id);

        if($post->user_id != Auth::user()->id)
            return redirect()->back();

        return view('posts.edit')->with('post', $post);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|min:1|max:50',
            'body'  => 'required|min:1|max:1000',
            'image' => 'mimes:jpeg,jpg,png,gif|max:1048'
        ]);

        $post = $this->post->findOrFail($id);
        $post->title = $request->title;
        $post->body = $request->body;

        // If there is a new image
        if ($request->image) {
            // Delete the previous image from the local storage
            $this->deleteImage($post->image);

            // Move the new image to local storage
            $post->image = $this->saveImage($request); // assign the image name only
        }

        $post->save();
        return redirect()->route('post.show', $id);
    }

    private function deleteImage($image_name) {
        $image_path = self::LOCAL_STORAGE_FOLDER . $image_name;
        // $image_path = "/public/images/16254545.jpg";

        if (Storage::disk('local')->exists($image_path)) {
            Storage::disk('local')->delete($image_path);
            // It will delete the image inside the storage folder
        }
    }

    public function destroy($id)
    {
        $post = $this->post->findOrFail($id);

        $this->deleteImage($post->image);

        $post->delete();

        return redirect()->back();
        
    }
}
