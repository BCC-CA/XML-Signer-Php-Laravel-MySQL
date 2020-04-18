<?php

namespace App\Http\Controllers;

use App\LeaveApplication;
use Illuminate\Http\Request;

class LeaveApplicationController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$leaves = LeaveApplication::latest()->paginate(5);

		return view('leave_application.index',compact('leaves'))
			->with('i', (request()->input('page', 1) - 1) * 5);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('leave_application.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		/*$request->validate([
			'name' => 'required',
			'detail' => 'required',
		]);*/
		LeaveApplication::create($request->all());
		return redirect()->route('leaves.index')
						->with('success','Leave Application Added successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\LeaveApplication  $leaveApplication
	 * @return \Illuminate\Http\Response
	 */
	public function show(LeaveApplication $leaveApplication)
	{
		return view('leave_application.show',compact('leaveApplication'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\LeaveApplication  $leaveApplication
	 * @return \Illuminate\Http\Response
	 */
	public function edit(LeaveApplication $leaveApplication)
	{
		return view('leave_application.edit',compact('leaveApplication'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\LeaveApplication  $leaveApplication
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, LeaveApplication $leaveApplication)
	{
		/*$request->validate([
			'name' => 'required',
			'detail' => 'required',
		]);*/

		$leaveApplication->update($request->all());

		return redirect()->route('leave_application.index')
						->with('success','Product updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\LeaveApplication  $leaveApplication
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(LeaveApplication $leaveApplication)
	{
		$leaveApplication->delete();
        return redirect()->route('leave_application.index')
                        ->with('success','Product deleted successfully');
	}
}
