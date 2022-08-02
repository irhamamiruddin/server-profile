<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documentation;
use App\Models\Member;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class DocumentationController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:documentation-list|documentation-show', ['only' => ['index']]);
         $this->middleware('permission:documentation-show', ['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $queries = ['search','page'];

        $documents = Documentation::with(['server' => function ($query) {
                            $query->withTrashed();
                        }])->filter($request->only($queries))->paginate(10);

        // find user in members table
        $member = Member::where('name', Auth::user()->name)->first();

        // if user exist in members, find servers associate with members
        $serverPermitted = [];
        if($member){
            foreach ($member->servers as $server) {
                array_push($serverPermitted,$server->pivot->server_id);
            }
        }

        return Inertia::render("Documentation/Index",compact('documents','serverPermitted'));
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
        $document = Documentation::find($id);
        return Inertia::render("Documentation/Show",compact('document'));
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
