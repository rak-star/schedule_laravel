<?php

namespace App\Http\Controllers;

use App\Models\Ymk_teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JournalController extends Controller
{
    public function index(){
        $id_teacher = Auth::user()->teacher_id;
        $short_name = Ymk_teacher::find($id_teacher)->short_name;
        $name_table_week = get_name_table('w');
        $date_monday = date('Y-m-d', strtotime('monday this week'));
        $id_week = DB::table($name_table_week)->where('monday', $date_monday)->value('id');
        return redirect()->route('journal_schedule_week', ['short_name' => $short_name, 'id_week' => $id_week, 'id_teacher' => $id_teacher]);

    }

    public function week($short_name, $id_week){
        $name_table = get_name_table('s');
        $name_table_week = get_name_table('w');

        $name_teacher = Ymk_teacher::where('short_name', '=', $short_name)->get()[0]->name;
        $id_teacher = Ymk_teacher::where('short_name', '=', $short_name)->get()[0]->id;

        $week = DB::table($name_table_week)->find($id_week);
        $date_monday = $week->monday;
        $date_saturday = $week->saturday;

        $predmets = array();
        for($i = 1; $i <=5; $i++){
            $schedule = getScheduleTeacher($name_table, $name_teacher, $i, $date_monday, $date_saturday);
            $predmets = array_merge($predmets, $schedule);
        }
        usort($predmets,'grade_sort');


        return view('teacher.journal.index', ['name_teacher' => $name_teacher, 'predmets' => $predmets, 'id_week' => $id_week, 'short_name' => $short_name, 'id_teacher' => $id_teacher]);
    }


    public function add_link(Request $teacher_link){
        dd($teacher_link->all());
    }

    public function journal_answer(){
        return view('teacher.journal.answer');
    }

    public function journal_check(){
        return view('teacher.journal.check');
    }

}
