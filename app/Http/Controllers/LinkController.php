<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use App\Http\Resources\LinkResource;

class LinkController extends Controller
{
    public function index(){
        $links = Link::with('category')->paginate(5);
        return LinkResource::collection($links);
        // return $links;
    }

}
