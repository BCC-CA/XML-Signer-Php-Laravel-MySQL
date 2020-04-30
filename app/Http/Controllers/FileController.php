<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use App\LeaveApplication;
use Spatie\ArrayToXml\ArrayToXml;
use Illuminate\Support\Str;
use File;

class FileController extends Controller
{
	public function download($token,$id)
	{
		if($token!="token_not_implemented")
			return "token verification failed";
		$application = LeaveApplication::findOrFail($id);
		//return $application;
		$contents = ArrayToXml::convert($application->toArray());

		$filename = Str::random(40).$token.$id.'.xml';
		return response()->streamDownload(function () use ($contents) {
		    echo $contents;
		}, $filename);
	}

	public function upload(Request $request)
	{
		$file = $request->file('xmlFile');
		$file_content = $file->get();
		$prevousFileId = $request->input('previousFileId');
		$token = $request->input('token');

		File::makeDirectory(public_path('upload/'), $mode = 0777, true, true);
		$file->move(public_path('upload/'), $file->getClientOriginalName());
		return $prevousFileId;

		$xml = simplexml_load_string($file_content);
		$json = json_encode($xml);
		$array = json_decode($json,TRUE);

		$application = LeaveApplication::findOrFail($array['id']);
		$application->purpose_of_leave = $file_content;
		$application->save();*/
		//return $array['id'];
		return $array;		//array should be converted to eloquent object
	}
}