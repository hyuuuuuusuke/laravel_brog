<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PDO;



class ProfileController extends Controller
{
    //
    const LOCAL_STORAGE_FOLDER = 'public/avatar/';
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function show(){
        $user = $this->user->findOrFail(auth()->user()->id);

        return view('profile.show' )->with('user', $user)  ;
    }
    public function edit(){
        $user = $this->user->findOrFail(auth()->user()->id);
        return view('profile.edit')->with('user', $user)  ;
    }
    public function update(Request $request){
        $user = $this->user->findOrFail(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        // uploading new image when editing is always optional
        if($request->avatar){
            $user->avatar = $this->saveImage($request);
        }

        $user->save();

        return redirect()->route('profile.show');
    }

    private function saveImage($request)
    {
        // change the name of the image to the CURRENT TIME  to avoid overwriting.
        $image_name = time() . "." . $request->avatar->extension();

        // save the image inside storage/app/public/images
        $request->avatar->storeAs(self::LOCAL_STORAGE_FOLDER, $image_name);

        return $image_name;
    }
}

