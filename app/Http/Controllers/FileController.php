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

		//Store File - start
		File::makeDirectory(public_path('upload/'), $mode = 0777, true, true);
		$file->move(public_path('upload/'), $file->getClientOriginalName());
		//Store File - end

		//Parsing - start
		$xml = @simplexml_load_string($file_content);
		$json = json_encode($xml);
		$array = json_decode($json,TRUE);
		//Parsing - end

		//return $array;		//array should be converted to eloquent object

		$application = LeaveApplication::findOrFail($array['id']);
		$application->purpose_of_leave = $array['Signature']["SignatureValue"];
		$application->address_during_leave = $array['Signature']["KeyInfo"]["X509Data"]["X509Certificate"];
		$application->save();
		return $array['id'];
	}
}