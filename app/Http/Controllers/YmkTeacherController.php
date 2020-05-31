<?php

namespace App\Http\Controllers;

use App\Models\Ymk_teacher;
use Illuminate\Http\Request;

class YmkTeacherController extends Controller
{
    public function index(){
        return view('teacher.index');
    }

    public function alphabet(){
        $arrays_teacher = Ymk_teacher::where('status', '=', 1)->orderBy('name', 'asc')->get();
        $array_alphabet = array();
        $last_symbol = '';
        foreach ($arrays_teacher as $el){
            $name = $el->name;
            $a = mb_substr($name, 0, 1, 'UTF-8');
            if($last_symbol != $a){
                $array_alphabet[] = $a;
            }
            $last_symbol = $a;
        }
        return view('teacher.alphabet', ['alphabet' => $array_alphabet]);
    }
}
