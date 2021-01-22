<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Storage;
use Auth;
use App\Http\Requests\FileUploadRequest;
use App\Models\Storage;
use Illuminate\Support\Facades\Hash;

class FileManagerController extends Controller
{
    public function index()
    {
    	return view('dashboard.upload');
    }

    public function store(FileUploadRequest $request)
    {
    	$create = Storage::create([
    		'user_id'=>Auth::user()->id,
    		'name'=>$request->name,
    		'file'=>$request->name,
    		'hash'=>$request->name,
    	]);

    	if(!$create)
    	{
    		return back()->with('msg',"Something went wrong");
    	}

    	return back()->with('');    	
    }
}
