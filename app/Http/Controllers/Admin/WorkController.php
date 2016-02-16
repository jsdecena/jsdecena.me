<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Work;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.works.list', ['works' => Work::orderBy('id', 'desc')->paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.works.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'company'       => 'required',
            'designation'   => 'required',
            'from'          => 'required',
            'to'            => 'required'
        ]);

        $work                   = new Work;
        $work->company          = $request->input('company');
        $work->designation      = $request->input('designation');
        $work->from             = date('Y-m-d', strtotime($request->input('from')));
        $work->to               = date('Y-m-d', strtotime($request->input('to')));
        $work->description      = $request->input('description');
        $work->created_at       = new \DateTime('today');
        $work->updated_at       = new \DateTime('today');
        $work->save();

        return redirect()->route('admin.work.index')->with('success', 'Successfully created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.works.edit', ['data' => Work::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'company'       => 'required',
            'designation'   => 'required',
            'from'          => 'required'
        ]);

        $work                   = Work::find($id);
        $work->company          = $request->input('company');
        $work->designation      = $request->input('designation');
        $work->from             = date('Y-m-d', strtotime($request->input('from')));
        $work->to               = date('Y-m-d', strtotime($request->input('to')));
        $work->description      = $request->input('description');
        $work->updated_at       = new \DateTime('today');
        $work->save();

        return redirect()->route('admin.work.index', $id)->with('success', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
