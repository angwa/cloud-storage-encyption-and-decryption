<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Storage;
use App\Http\Requests\DecryptRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\FileUploadRequest;
use Auth;
use Illuminate\Support\Str;
use FileVault;

class EncryptDecryptController extends Controller
{
    public function show($id)
    {
    	$data = Storage::findorFail($id);
    	return view('dashboard.decrypt',compact('data'));
    }
    public function store(FileUploadRequest $request)
    {
    	$file = Auth::user()->id.time().'.'.$request->file->extension();
   		$request->file->move("D:\cloud-storage-encyption-and-decryption\storage\app", $file);

   		$key = strtoupper(Str::Random(3).'-'.Str::Random(3).'-'.Str::Random(3));

   		$fileType = "";
   		$fileExtention=$request->file->clientExtension();
   		if($fileExtention=='mp3'){
   			$fileType = "Music";
   		}else if($fileExtention=='mp4'){
   			$fileType = "Video";
   		}else if($fileExtention=='docx'){
   			$fileType = "Document";
   		}else if($fileExtention=='pdf'){
   			$fileType = "PDF";
   		}else if($fileExtention=='png' || $fileExtention=='jpg' || $fileExtention=='gif' || $fileExtention=='jpeg'){
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
    	
    	FileVault::encrypt($file);
    	if(!$create)
    	{
    		return back()->with('warning',"Something went wrong");
    	}

    	return back()->with('msg','File has been uploaded successfully. Find the hash key below and keep it safe')->with('key',$key);    	
    }


    public function decrypt(DecryptRequest $request)
    {
    	$file = Storage::findorFail($request->file);
    	$hash = Hash::check($request->key,$file->hash);
    	if(!$hash){
    		return back()->with('not','Hash key is incorrect. Please try again');
    	}
    	$dir = "D:\cloud-storage-encyption-and-decryption\storage\app/";
    	$final = "D:\cloud-storage-encyption-and-decryption\storage\app\decrypted";
    	$success = \File::copy($dir.$file->file.'.enc',$final.$file->file);
    	return back()->with('found',$file);
    }
}
