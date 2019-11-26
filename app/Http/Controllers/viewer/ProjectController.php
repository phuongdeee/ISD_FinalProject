<?php

namespace App\Http\Controllers\viewer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Http\Requests;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = project::paginate(5);
        return view("viewer.project.index", array('model' => $project));
    }
}
