<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ymk_branch;

class YmkStudentBranchesController extends Controller
{
    public function index(){
        $branch = Ymk_branch::where('status', '=', '1')->get();
        return view('student.branch', compact('branch'));
    }
}
