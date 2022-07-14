<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationDetail;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:application-list|application-show|application-create|application-edit|application-delete', ['only' => ['index','store']]);
         $this->middleware('permission:application-show', ['only' => ['show']]);
         $this->middleware('permission:application-create', ['only' => ['create','store']]);
         $this->middleware('permission:application-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:application-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $queries = ['search','page'];

        $applications = Application::with('server')
                            ->filter($request->only($queries))
                            ->paginate(5);

        return Inertia::render('Application/Index',compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Application/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

        ]);

        $input = $request->all();

        return redirect()->route('applications.index')
            ->with('success','Application created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applications = Application::with('application_detail')->where('server_id','=',$id)->get();
        // $applications = Application::with('application_detail')->find($id);

        $details = ApplicationDetail::join('applications','applications.application_detail_id','=','application_details.id')
                        ->select('server_id','v_technology','config_file')
                        ->groupBy('server_id','v_technology','config_file')
                        ->having('server_id','=',$id)
                        ->get();

        return Inertia::render('Application/Show',compact('applications','details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application = Application::find($id);

        return Inertia::render('User/Edit',compact('application'));
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
        $request->validate([

        ]);

        $application = Application::find($id);

        return redirect()->route('roles.index')
            ->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application = Application::find($id)->delete();
        return back()
            ->with('success','Delete successful!');
    }
}
