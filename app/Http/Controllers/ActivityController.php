<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\ServerActivity;
use Illuminate\Database\Eloquent\Builder;

class ActivityController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:activity-list|activity-show|activity-create|activity-edit|activity-delete', ['only' => ['index','store']]);
         $this->middleware('permission:activity-show', ['only' => ['show']]);
         $this->middleware('permission:activity-create', ['only' => ['create','store']]);
         $this->middleware('permission:activity-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:activity-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $queries = ['search','page'];
        // $filters = $request -> all($queries);

        $activities = ServerActivity::with('user','type','server')
                        ->orderBy('created_at', 'desc')
                        ->filter($request->only($queries))
                        ->paginate(5)
                        ->withQueryString();

        return Inertia::render('Activity/Index',compact('activities'));
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
        //
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
