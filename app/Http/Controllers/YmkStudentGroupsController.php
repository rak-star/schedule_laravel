<?php

namespace App\Http\Controllers;

use App\Models\Ymk_group;
use App\Models\Ymk_branch;
use Illuminate\Http\Request;

class YmkStudentGroupsController extends Controller
{
    public function index($name_branch){
        $id_branch = Ymk_branch::where('short_name', $name_branch)->value('id');

        $groups1 = Ymk_group::where([
            ['branch_id', '=', $id_branch],
            ['kurs', '=', '1']
        ])
            ->orderBy('display_order', 'asc')
            ->get();

        $groups2 = Ymk_group::where([
            ['branch_id', '=', $id_branch],
            ['kurs', '=', '2']
        ])
            ->orderBy('display_order', 'asc')
            ->get();

        $groups3 = Ymk_group::where([
            ['branch_id', '=', $id_branch],
            ['kurs', '=', '3']
        ])
            ->orderBy('display_order', 'asc')
            ->get();

        $groups4 = Ymk_group::where([
            ['branch_id', '=', $id_branch],
            ['kurs', '=', '4']
        ])
            ->orderBy('display_order', 'asc')
            ->get();

        return view('student.group', ['groups1' => $groups1, 'groups2' => $groups2, 'groups3' => $groups3, 'groups4' => $groups4, 'branch' => $name_branch]);
    }
}
