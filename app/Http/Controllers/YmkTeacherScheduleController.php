<?php

namespace App\Http\Controllers;

use App\Models\Ymk_teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class YmkTeacherScheduleController extends Controller
{
    public function index($short_name){
        $name_table_week = get_name_table('w');
        $date_monday = date('Y-m-d', strtotime('monday this week'));
        $id_week = DB::table($name_table_week)->where('monday', $date_monday)->value('id');
        return redirect()->route('teacher_schedule_week', ['short_name' => $short_name, 'id_week' => $id_week]);
    }

    public function week($short_name, $id_week){
        $name_table = get_name_table('s');
        $name_table_week = get_name_table('w');

        $name_teacher = Ymk_teacher::where('short_name', '=', $short_name)->get()[0]->name;

        $week = DB::table($name_table_week)->find($id_week);
        $date_monday = $week->monday;
        $date_wednesday = $week->wednesday;
        $date_thursday = $week->thursday;
        $date_saturday = $week->saturday;

        $predmet_1 = array();
        for($i = 1; $i <=5; $i++){
            $schedule = getScheduleTeacher($name_table, $name_teacher, $i, $date_monday, $date_wednesday);
            $predmet_1 = array_merge($predmet_1, $schedule);
        }
        usort($predmet_1,'grade_sort');

        $predmet_2 = array();
        for($i = 1; $i <=5; $i++){
            $schedule = getScheduleTeacher($name_table, $name_teacher, $i, $date_thursday, $date_saturday);
            $predmet_2 = array_merge($predmet_2, $schedule);
        }
        usort($predmet_2,'grade_sort');
        return view('teacher.schedule', ['name_teacher' => $name_teacher, 'predmet1' => $predmet_1, 'predmet2' => $predmet_2, 'id_week' => $id_week, 'short_name' => $short_name]);
    }
}
