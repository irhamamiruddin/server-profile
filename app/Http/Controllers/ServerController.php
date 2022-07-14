<?php

namespace App\Http\Controllers;

use App\Models\Server;
use App\Models\ServerDetail;
use App\Models\ServerActivity;
use App\Models\ServerStorageDetail;
use Inertia\Inertia;
use Illuminate\Http\Request;

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
        $servers = Server::filter($request->only($queries))->paginate(5);
        $activities = ServerActivity::with('user','type')->orderBy('created_at', 'desc')->limit(5)->get();

        return Inertia::render('Server/Index',compact('servers','activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        // $request->validate([
        //     'name' => 'required|unique:servers,name',
        //     'domain' => 'required|unique:servers,domain',
        //     'environment' => 'required',
        //     'ip_address' => 'required|unique:servers,ip_address',
        //     'port' => 'required',
        //     'dns' => 'required',
        //     'status' => 'required',
        //     'operating_system' => 'required',
        //     'vcpu_amount' => 'required',
        //     'memory' => 'required'
        // ]);

        $server = $request->only('name','domain','environment','ip_address','port','dns','status');
        $specification = $request->only('operating_system','vcpu_amount','memory');

        Server::create($server);
        // ServerDetail::create($specification);

        /* loop this thing store for each storage in storages ServerStorageDetail::create($storage); */

        return redirect()->route('servers.index')->with('success','Create successful.');
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
                        ->find($id);

        $activities = ServerActivity::with('user','type')
                        ->where('server_id','=',$id)
                        ->orderBy('created_at', 'desc')
                        ->limit(5)
                        ->get();

        $storages = ServerStorageDetail::with('server_detail')->where('server_detail_id','=',$id)->get();
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
        Server::where('id',$id)->delete();
        return back()->with('success','Deleted successfully!');
    }

}
