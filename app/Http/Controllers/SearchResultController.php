<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use Inertia\Inertia;

class SearchResultController extends Controller
{
    public function __invoke()
    {
        return Inertia::render("Search/Results");
    }
}
