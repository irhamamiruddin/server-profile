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
    public function index()
    {
        $applications = Application::with('server')->paginate(5);

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
        //
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

        // $details = Application::with('application_detail')
        //                     ->where('server_id','=',$id)
        //                     ->select('v_technology','config_file')
        //                     ->get();

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
        //
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
        //
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
