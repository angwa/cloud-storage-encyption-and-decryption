<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Storage;
use App\Models\User;
use Auth;
use App\Http\Requests\FileUploadRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FileManagerController extends Controller
{
    public function index()
    {
    	return view('dashboard.upload');
    }

    public function store(FileUploadRequest $request)
    {
    	$file = Auth::user()->id.time().'.'.$request->file->extension();
   		$request->file->move(public_path('Storage'), $file);

   		$key = strtoupper(Str::Random(3).'-'.Str::Random(3).'-'.Str::Random(3));

   		$fileType = "";
   		if($request->file->clientExtension()=='mp3'){
   			$fileType = "Music";
   		}else if($request->file->clientExtension()=='mp4'){
   			$fileType = "Video";
   		}else if($request->file->clientExtension()=='docx'){
   			$fileType = "Document";
   		}else if($request->file->clientExtension()=='pdf'){
   			$fileType = "PDF";
   		}else if($request->file->clientExtension()=='png' || $request->file->clientExtension()=='jpg' || $request->file->clientExtension()=='gif' || $request->file->clientExtension()=='jpeg'){
   			$fileType = "Picture";
   		}else{
   			$fileType = "Others";
   		}

    	$create = Storage::create([
    		'user_id'=>Auth::user()->id,
    		'name'=>$request->name,
    		'file'=>$file,
    		'type'=>$fileType,
    		'hash'=>Hash::make($key),
    	]);

    	if(!$create)
    	{
    		return back()->with('warning',"Something went wrong");
    	}

    	return back()->with('msg','File has been uploaded successfully');    	
    }

    public function show()
    {
    	$files = User::findOrFail(Auth::user()->id)->storage;
    	return view('dashboard.files',compact('files'));
    }

    public function delete($id)
    {
    	$data = Storage::findOrFail($id);
    	if($data->delete()){
    		return back()->with('msg','File successfully deleted');
    	}
    }
}
