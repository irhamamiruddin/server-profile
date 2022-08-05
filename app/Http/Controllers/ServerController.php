<?php

namespace App\Http\Controllers;

use App\Models\Server;
use App\Models\Member;
use App\Models\ServerDetail;
use App\Models\ServerActivity;
use App\Models\ActivityType;
use App\Models\User;
use App\Models\Project;
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

            'storages' => 'required|array',
            'storages.*.partition' => 'required_with:storages.*.allocated_size,storages.*.unit,storages.*.status|string',
            'storages.*.allocated_size' => 'required_with:storages.*.partition,storages.*.unit,storages.*.status|integer',
            'storages.*.unit' => 'required_with:storages.*.partition,storages.*.allocated_size,storages.*.status',
            'storages.*.remarks' => 'nullable',
            'storages.*.status' => 'required_with:storages.*.partition,storages.*.allocated_size,storages.*.unit',

            'members' => 'array',
            'members.*.name' => 'required:members|unique:members,name',
            'members.*.status' => 'required_with:members.*.name',
            'documents' => 'array',
            'documents.*.name' => 'required:documents',
            'documents.*.url' => 'required_with:documents.*.name',
            'projects' => 'array',
            'projects.*.code' => 'required:projects|unique:projects,code',
            'projects.*.name' => 'required_with:projects.*.code',
            'projects.*.nature' => 'required_with:projects.*.code',
        ], [
            'storages.*.partition.required_with' => 'Storage partition is required when other field present.',
            'storages.*.partition.string' => 'Storage partition must be a letter.',
            'storages.*.allocated_size.required_with' => 'Size is required when other field present.',
            'storages.*.allocated_size.integer' => 'Size must be a number.',
            'storages.*.unit.required_with' => 'Unit required.',
            'storages.*.status.required_with' => 'Member status is required when member name is present.',

            'members.*.name.required' => 'Member name is required.',
            'members.*.name.unique' => 'Member name has already been taken.',
            'members.*.status.required_with' => 'Member status is required when member name is present.',
            'documents.*.name.required' => 'Document name is required.',
            'documents.*.url.required_with' => 'Document url is required when document name is present.',
            'projects.*.code.required' => 'Project code is required.',
            'projects.*.code.unique' => 'Project code has already been taken.',
            'projects.*.name.required_with' => 'Project name is required when project code is present.',
            'projects.*.nature.required_with' => 'Project nature is required when project code is present.',
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

            //save activity log
            $activity = ActivityType::firstOrCreate(['name'=>Str::snake('create '.$request->name),'description'=>$request->name.' Created']);
            ServerActivity::firstOrCreate(['server_id'=>$server->id,'activity_type_id'=>$activity->id,'user_id'=>Auth::user()->id]);

            if($documents !== null){
                $server->documentations()->createMany($documents);

                //save activity log
                $activity = ActivityType::firstOrCreate(['name'=>Str::snake('create '.$request->name.' documentations'),'description'=>$request->name.' Documentations Created']);
                ServerActivity::firstOrCreate(['server_id'=>$server->id,'activity_type_id'=>$activity->id,'user_id'=>Auth::user()->id]);
            }

            if($members !== null){
                $server->members()->createMany($members);
            }

            if($projects !== null){
                $server->projects()->createMany($projects);

                //save activity log
                $activity = ActivityType::firstOrCreate(['name'=>Str::snake('create '.$request->name.' projects'),'description'=>$request->name.' Projects Created']);
                ServerActivity::firstOrCreate(['server_id'=>$server->id,'activity_type_id'=>$activity->id,'user_id'=>Auth::user()->id]);
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

        $isMember = false;

        foreach ($server->members as $member) {
            if(Auth::user()->name == $member->name)
                $isMember = true;
        }

        $storages = $server->server_details->storage_details()->get();
        $storages = self::_group_by($storages->toArray(), 'partition');

        return Inertia::render('Server/Show',compact('server','activities','storages','isMember'));
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
        $server = Server::withTrashed()->find($id);
        $existingMemberIds = $server->members->pluck('id');
        $existingProjectIds = $server->projects->pluck('id');

        $request->validate([
            'name' => 'required|unique:servers,name,'.$id,
            'domain' => 'required|unique:servers,domain,'.$id,
            'environment' => 'required',
            'ip_address' => 'required|ip|unique:servers,ip_address,'.$id,
            'port' => 'required|numeric',
            'status' => 'required',
            'operating_system' => 'required',
            'vcpu_amount' => 'required|integer',
            'memory' => 'required|integer',

            'storages' => 'required|array',
            'storages.*.partition' => 'required_with:storages.*.allocated_size,storages.*.unit,storages.*.status|string',
            'storages.*.allocated_size' => 'required_with:storages.*.partition,storages.*.unit,storages.*.status|integer',
            'storages.*.unit' => 'required_with:storages.*.partition,storages.*.allocated_size,storages.*.status',
            'storages.*.remarks' => 'nullable',
            'storages.*.status' => 'required_with:storages.*.partition,storages.*.allocated_size,storages.*.unit',

            'members' => 'array',
            'members.*.name' => 'required:members',
            'members.*.status' => 'required_with:members.*.name',
            'documents' => 'array',
            'documents.*.name' => 'required:documents',
            'documents.*.url' => 'required_with:documents.*.name',
            'projects' => 'array',
            'projects.*.code' => 'required:projects',
            'projects.*.name' => 'required_with:projects.*.code',
            'projects.*.nature' => 'required_with:projects.*.code',
        ], [
            'storages.*.partition.required_with' => 'Storage partition is required when other field present.',
            'storages.*.partition.string' => 'Storage partition must be a letter.',
            'storages.*.allocated_size.required_with' => 'Size is required when other field present.',
            'storages.*.allocated_size.integer' => 'Size must be a number.',
            'storages.*.unit.required_with' => 'Unit required.',
            'storages.*.status.required_with' => 'Member status is required when member name is present.',

            'members.*.name.required' => 'Member name is required.',
            'members.*.name.unique' => 'Member name has already been taken.',
            'members.*.status.required_with' => 'Member status is required when member name is present.',
            'documents.*.name.required' => 'Document name is required.',
            'documents.*.url.required_with' => 'Document url is required when document name is present.',
            'projects.*.code.required' => 'Project code is required.',
            'projects.*.code.unique' => 'Project code has already been taken.',
            'projects.*.name.required_with' => 'Project name is required when project code is present.',
            'projects.*.nature.required_with' => 'Project nature is required when project code is present.',
        ]);

        DB::transaction(function () use ($request,$server,$existingMemberIds,$existingProjectIds){

            $input_server = $request->only('name','domain','environment','ip_address','port','dns','status');
            $input_specification = $request->only('operating_system','vcpu_amount','memory');
            $input_storages = $request->storages;
            $input_documents = $request->documents;
            $input_members = $request->members;
            $input_projects = $request->projects;

            // $server = Server::withTrashed()->find($id);

            // Update server informations
            $server->update($input_server);
            $server->server_details()->update($input_specification);

            //save activity log
            $activity = ActivityType::firstOrCreate(['name'=>Str::snake('update '.$request->name),'description'=>$request->name.' Updated']);
            ServerActivity::firstOrCreate(['server_id'=>$server->id,'activity_type_id'=>$activity->id,'user_id'=>Auth::user()->id]);


            // find which to update/delete/create
            $existingStorageIds = $server->server_details->storage_details->pluck('id');
            $newStorages = collect([]);


            $storages = collect($input_storages)->mapWithKeys(function($storage) use ($newStorages) {
                if (isset($storage['id'])) {
                    return [$storage['id'] => $storage];
                } else {
                    $newStorages->push($storage);
                    return [];
                }
            });

            foreach($existingStorageIds as $storageId){
                if (isset($storages[$storageId])) {
                    // update
                    ServerStorageDetail::find($storageId)->update($storages[$storageId]);
                    unset($storages[$storageId]);

                } else {
                    // delete
                    ServerStorageDetail::find($storageId)->delete();
                    unset($storages[$storageId]);
                }
            }

            // create if new input
            $server->server_details->storage_details()->createMany($newStorages);

            if($input_documents !== null){

                $existingDocumentIds = $server->documentations->pluck('id');
                $newDocuments = collect([]);

                $documents = collect($input_documents)->mapWithKeys(function($document) use ($newDocuments) {
                    if (isset($document['id'])) {
                        return [$document['id'] => $document];
                    } else {
                        $newDocuments->push($document);
                        return [];
                    }
                });

                foreach($existingDocumentIds as $documentId){
                    if (isset($documents[$documentId])) {
                        // update
                        Documentation::find($documentId)->update($documents[$documentId]);
                        unset($documents[$documentId]);

                    } else {
                        // delete
                        Documentation::find($documentId)->delete();
                        unset($documents[$documentId]);
                    }
                }

                // create added documents
                $server->documentations()->createMany($newDocuments);

                //save activity log
                $activity = ActivityType::firstOrCreate(['name'=>Str::snake('update '.$request->name.' documentations'),'description'=>$request->name.' Documentations Updated']);
                ServerActivity::firstOrCreate(['server_id'=>$server->id,'activity_type_id'=>$activity->id,'user_id'=>Auth::user()->id]);
            }

            if($input_members !== null){
                // $existingMemberIds = $server->members->pluck('id');
                $newMembers = collect([]);

                $members = collect($input_members)->mapWithKeys(function($member) use ($newMembers) {
                    if (isset($member['id'])) {
                        return [$member['id'] => $member];
                    } else {
                        $newMembers->push($member);
                        return [];
                    }
                });

                foreach($existingMemberIds as $memberId){
                    if (isset($members[$memberId])) {
                        // update
                        Member::find($memberId)->update($members[$memberId]);
                        unset($members[$memberId]);

                    } else {
                        // delete
                        $server->members()->detach($memberId);
                        Member::find($memberId)->delete();
                        unset($members[$memberId]);
                    }
                }

                // create added members
                $server->members()->createMany($newMembers);
            }

            if($input_projects !== null){
                // $existingProjectIds = $server->projects->pluck('id');
                $newProjects = collect([]);

                $projects = collect($input_projects)->mapWithKeys(function($project) use ($newProjects) {
                    if (isset($project['id'])) {
                        return [$project['id'] => $project];
                    } else {
                        $newProjects->push($project);
                        return [];
                    }
                });

                foreach($existingProjectIds as $projectId){
                    if (isset($projects[$projectId])) {
                        // update
                        Project::find($projectId)->update($projects[$projectId]);
                        unset($projects[$projectId]);

                    } else {
                        // delete
                        $server->projects()->detach($projectId);
                        Project::find($projectId)->delete();
                        unset($projects[$projectId]);
                    }
                }

                // create added project
                $server->projects()->createMany($newProjects);

                //save activity log
                $activity = ActivityType::firstOrCreate(['name'=>Str::snake('update '.$request->name.' projects'),'description'=>$request->name.' Projects Updated']);
                ServerActivity::firstOrCreate(['server_id'=>$server->id,'activity_type_id'=>$activity->id,'user_id'=>Auth::user()->id]);
            }

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
