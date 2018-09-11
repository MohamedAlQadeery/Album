<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    //

    public function index(){
        return view('album.index');
    }
    public function showAllAlbums(){
       $albums=Album::with('photos')->where('user_id',Auth::user()->id)->get();
        return view('album.showAllAlbums')->with('albums',$albums);
    }

    public function create(){
        return view('album.create');
    }

    public function store(Request $request){
        $request->validate($this->rules());
       if(!$request->hasFile('cover_image'))
            Album::create($request->all());
       else {

           $album = new Album();
           $album->user_id=Auth::user()->id;
           $album->cover_image = parent::uploadImage($request->file('cover_image'),'/users/'.Auth::user()->email.'/album');
           $album->name = $request->input('name');
           $album->description = $request->input('description');
           $album->save();
       }
       return redirect()->back()->with('success','Done the album has been created successfully');

    }



    public function show($id){
        try{
            $album=Album::findOrFail($id);
            return view('album.show')->with('album',$album);
        }catch(ModelNotFoundException $modelNotFoundException){
        return redirect()->back()->with('error','album not found');
        }
    }


    public function destroy($id){
        try{
            $album=Album::findOrFail($id);
            if(File::isDirectory(public_path('/users/'.Auth::user()->email.'/album')))
                File::deleteDirectory(public_path('/users/'.Auth::user()->email.'/album'));
            if(File::exists(public_path($album->getImage())))
                File::delete(public_path($album->getImage()));
            $album->delete();
            return redirect()->route('album.showAllAlbums')->with('success',$album->name.' Album has been deleted successfully');
        }catch(ModelNotFoundException $modelNotFoundException){
            return redirect()->back()->with('error','album not found');
        }
    }
    private function rules(){
        return [
          'name'=>'required',
            'cover_image'=>'image|max:1999' //max upload size 1999byte

        ];
    }
}
