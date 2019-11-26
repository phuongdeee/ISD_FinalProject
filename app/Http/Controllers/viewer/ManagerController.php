<?php

namespace App\Http\Controllers\viewer;
use App\Http\Controllers\Controller;
use App\Models\Manager;
use App\Http\Requests;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manager = manager::paginate(5);
        return view("viewer.manager.index", array('model' => $manager));
    }

    
}
