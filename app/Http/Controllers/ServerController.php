<?php

namespace App\Http\Controllers;

use App\Models\Server;
use App\Models\ServerDetail;
use App\Models\ServerActivity;
use App\Models\ActivityType;
use App\Models\Documentation;
use App\Models\ServerStorageDetail;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ServerController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:server-list|server-show|server-create|server-edit|server-delete', ['only' => ['index','store']]);
        $this->middleware('permission:server-show', ['only' => ['show']]);
        $this->middleware('permission:server-create', ['only' => ['create','store']]);
        $this->middleware('permission:server-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:server-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $queries = ['search','page'];
        $servers = Server::filter($request->only($queries))->withTrashed()->paginate(5);
        $activities = ServerActivity::with('user','type')->orderBy('created_at', 'desc')->paginate(5);

        return Inertia::render('Server/Index',compact('servers','activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // return Inertia::render('Server/Create', ['errors' => ['documents_name' => 'Document name missing']]);
        return Inertia::render('Server/Create');
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
            'name' => 'required|unique:servers,name',
            'domain' => 'required|unique:servers,domain',
            'environment' => 'required',
            'ip_address' => 'required|ip|unique:servers,ip_address',
            'port' => 'required|numeric',
            'status' => 'required',
            'operating_system' => 'required',
            'vcpu_amount' => 'required|integer',
            'memory' => 'required|integer',
            'storages' => 'required',
            // 'storage_partition' => 'required|string|distinct',
            // 'storage_allocated_size' => 'required|integer',
            // 'storage_unit' => 'required',
            // 'storage_remarks' => 'nullable',
            // 'storage_status' => 'required',
            // 'members' => 'required',
            // 'member_name' => 'unique:members',
            // 'member_status' => 'numeric',
            // 'member_name' => 'required',
            // 'member_status' => 'required',
            // 'documents' => 'nullable',
            // 'document_name' => 'required',
            // 'document_url' => 'required',
            // 'projects' => 'required',
            // 'project_code' => 'required',
            // 'project_name' => 'required',
            // 'project_nature' => 'required',
        ]);

        DB::transaction(function () use ($request){

            $server = $request->only('name','domain','environment','ip_address','port','dns','status');
            $specification = $request->only('operating_system','vcpu_amount','memory');
            $storages = $request->storages;
            $documents = $request->documents;
            $members = $request->members;
            $projects = $request->projects;

            $server = Server::create($server);
            $specification = $server->server_details()->create($specification);
            $specification->storage_details()->createMany($storages);

            //save activity
            $activity = ActivityType::firstOrCreate(['name'=>Str::snake('create '.$request->name),'description'=>$request->name.' Created']);
            ServerActivity::firstOrCreate(['server_id'=>$server->id,'activity_type_id'=>$activity->id,'user_id'=>Auth::user()->id]);

            if($documents !== null){
                $server->documentations()->createMany($documents);
            }

            if($members !== null){
                $server->members()->createMany($members);
            }

            if($projects !== null){
                $server->projects()->createMany($projects);
            }

        });

        return redirect()->route('servers.index')->with('message','Create successful.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $server = Server::with('documentations','applications','server_details','members','projects')
                        ->withTrashed()->find($id);

        $activities = ServerActivity::with('user','type')
                        ->where('server_id','=',$id)
                        ->orderBy('created_at', 'desc')
                        ->paginate(5);

        // $canView = function(){
        //     Member::
        // };

        $storages = $server->server_details->storage_details()->get();
        $storages = self::_group_by($storages->toArray(), 'partition');

        return Inertia::render('Server/Show',compact('server','activities','storages'));
    }

    // To group by partition
    private function _group_by($array, $key) {
        $return = [];
        foreach($array as $val) {
            $return[$val[$key]][] = $val;
        }
        return $return;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $server = Server::with('documentations','server_details','members','projects')
                        ->withTrashed()->find($id);

        $storages = $server->server_details->storage_details()->get();

        return Inertia::render('Server/Edit',compact('server','storages'));
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
        DB::transaction(function () use ($request,$id){

            $input_server = $request->only('name','domain','environment','ip_address','port','dns','status');
            $input_specification = $request->only('operating_system','vcpu_amount','memory');
            $input_storages = $request->storages;
            $input_documents = $request->documents;
            $input_members = $request->members;
            $input_projects = $request->projects;

            $server = Server::withTrashed()->find($id);

            # Update server informations
            $server->update($input_server);
            $server->server_details()->update($input_specification);

            if($input_documents !== null){

                $documents = $server->documentations()->upsert($input_documents,['id'],['name','url']);



                // $documents->find(['server_id' => $id]);

                // $document = Documentation::find(1)->updateOrCreate($input_documents);
                // $documents = Documentation::updateOrCreate($input_documents[0]);
                // $server->documentations()->sync($documents);
            }

            // if($input_members !== null){
            //     $server->members()->saveMany($input_members);
            // }

            // if($input_projects !== null){
            //     $server->projects()->saveMany($input_projects);
            // }

        });


        return redirect()->route('servers.index')->with('message','Update successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Server::find($id)->delete();
        return back()->with('message','Deleted successfully!');
    }

    public function restore($id)
	{
		Server::withTrashed()->find($id)->restore();
		return back()->with('message','Data restored!');
	}

}
