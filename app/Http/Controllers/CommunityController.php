<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index()
    {
        $communities = Community::all();

        return view('communities.index', compact('communities'));
    }
    
    public function __construct()
    {
    $this->middleware('auth');
    }

}
