<?php

namespace App\Http\Controllers;

use App\Models\Server;
use App\Models\ServerActivity;
use App\Models\ServerStorageDetail;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $queries = ['search','page'];
        $servers = Server::paginate(5);
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
        //
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
        $server = Server::with('documentations','applications','server_details','members','projects')
                        ->find($id);

        $activities = ServerActivity::with('user','type')
                        ->where('server_id','=',$id)
                        ->orderBy('created_at', 'desc')
                        ->limit(5)
                        ->get();

        $storages = ServerStorageDetail::with('server_detail')->where('server_detail_id','=',$id)->get();

        $data = self::_group_by($storages->toArray(), 'partition');


        return Inertia::render('Server/Show',compact('server','activities','storages'));
    }

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
        //
    }
}
