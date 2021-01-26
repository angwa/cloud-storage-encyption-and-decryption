<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Storage;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;


class FileManagerController extends Controller
{
    public function index()
    {
    	return view('dashboard.upload');
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
