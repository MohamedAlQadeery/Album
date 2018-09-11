<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PhotoController extends Controller
{
    //

    public function create($album_id)
    {
        return view('photo.create')->with('album_id', $album_id);
    }

    public function store(Request $request)
    {
        $request->validate($this->rules());
        if (!$request->hasFile('photo'))
            Photo::create($request->all());
        else {
            $photo = new Photo();
            $photo->title = $request->input('title');
            $photo->description = $request->input('description');
            $photo->photo = parent::uploadImage($request->file('photo'), '/users/'.Auth::user()->email.'/photos/'.$request->input('album_id').'/');

            $photo->album_id = $request->input('album_id');
            $photo->save();
        }
        return redirect()->route('album.show', ['id' => $request->input('album_id')])->with('success', 'the photo has been uploaded successfully');

    }


    public function show($id)
    {
        try {
            $photo = Photo::findOrFail($id);
            return view('photo.show')->with('photo', $photo);
        } catch (ModelNotFoundException $modelNotFoundException) {
            return redirect()->back()->with('error', 'Photo not found');
        }
    }

    public function destroy($id)
    {
        try {
            $photo = Photo::findOrFail($id);
            if (File::exists(public_path($photo->photo)))
                File::delete(public_path($photo->photo));


            $photo->delete();
            return redirect()->route('album.show', ['id' => $photo->Album->id])->with('success', 'Photo has been deleted successfully');

        } catch (ModelNotFoundException $modelNotFoundException) {
            return redirect()->back()->with('error', 'Photo not found');
        }
    }

    private function rules()
    {
        return [
            'title' => 'required',
            'photo' => 'image',
            'description' => 'required'
        ];
    }

}
