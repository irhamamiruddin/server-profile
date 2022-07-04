<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class SearchResultController extends Controller
{
    public function __invoke()
    {

        return Inertia::render("Search/Results");
    }
}
