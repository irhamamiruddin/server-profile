<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationDetail;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Server;
use Illuminate\Support\Carbon;

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

        $applications = Application::with(['server' => function ($query) {
            $query->withTrashed();
        }])->filter($request->only($queries))->paginate(5);

        return Inertia::render('Application/Index',compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servers = Server::pluck('name','name')->all();
        return Inertia::render('Application/Create',compact('servers'));
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
            'name' => 'required',
            'description'=> 'required',
            'version' => 'required|numeric',
            'ports' => 'required|numeric',
            'status'=> 'required',
            'health_status' => 'required',
            'server' => 'required',
        ]);

        $server = Server::where('name','=',$request->input('server'))->first();
        $input = $request->only('name','description','version','ports','status','health_status');
        $input['health_last_checked'] = Carbon::now();
        $server->applications()->create($input);

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
        $application = Application::findOrFail($id);

        $applications = Application::with('application_detail')->where('applications.server_id','=',$application->server_id)->get();
        // $applications = Application::with('application_detail')->find($id);

        $details =
        ApplicationDetail::join('applications','applications.server_id','=','application_details.server_id')
                        ->select('applications.server_id','v_technology','config_file')
                        ->groupBy('applications.server_id','v_technology','config_file')
                        ->having('applications.server_id','=',$application->server_id)
                        ->get();

        return Inertia::render('Application/Show',compact('id','applications','details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application = Application::find($id)->first();
        $servers = Server::pluck('name','name')->all();
        $server = Server::where('id','=',$application->server_id)->first();

        return Inertia::render('Application/Edit',compact('application','servers','server'));
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
        // $request->validate([

        // ]);

        $application = Application::find($id);

        $server = Server::where('name','=',$request->input('server'))->first();
        $input = $request->only('name','description','version','ports','status','health_status');
        // $server->applications()->save($input);

        // $application->update($input);
        $application->server()->save($input);

        return redirect()->route('applications.index')
            ->with('success','Application updated successfully');
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
        return back()->with('success','Delete successful!');
    }
}
