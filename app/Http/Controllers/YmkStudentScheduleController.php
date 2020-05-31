<?php

namespace App\Http\Controllers;

use App\Models\Ymk_branch;
use Carbon\Carbon;
use App\Models\Ymk_group;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class YmkStudentScheduleController extends Controller
{
    public function index($name_branch, $short_name_group){
        $name_table_week = get_name_table('w');
        $date_monday = date('Y-m-d', strtotime('monday this week'));
        $id_week = DB::table($name_table_week)->where('monday', $date_monday)->value('id');
        return redirect()->route('student_schedule_week', ['branch'=>$name_branch, 'group'=>$short_name_group, 'id_week'=>$id_week]);
    }

    public function week($name_branch, $sort_name_group, $id_week){
        $name_table_schedule = get_name_table('s');

        $name_table_week = get_name_table('w');
        $week = DB::table($name_table_week)->find($id_week);

        $date_monday = $week->monday;
        $date_wednesday = $week->wednesday;
        $date_thursday = $week->thursday;
        $date_saturday = $week->saturday;

        $id_branch = Ymk_branch::where('short_name', $name_branch)->value('id');
        $id_group = Ymk_group::where('short_name', $sort_name_group)->value('id');
        $name_group = Ymk_group::where('short_name', $sort_name_group)->value('name');
        $schedule1 = DB::table($name_table_schedule)->where([
            ['branch_id', '=', $id_branch],
            ['group_id', '=', $id_group]
        ])
            ->whereBetween('date', [$date_monday, $date_wednesday])
            ->orderBy('date', 'asc')
            ->get();
        $schedule2 = DB::table($name_table_schedule)->where([
            ['branch_id', '=', $id_branch],
            ['group_id', '=', $id_group]
        ])
            ->whereBetween('date', [$date_thursday, $date_saturday])
            ->orderBy('date', 'asc')
            ->get();
        return view('student.schedule', ['id_branch' => $id_branch, 'id_group' => $id_group, 'schedules1' => $schedule1, 'schedules2' => $schedule2, 'short_group' => $sort_name_group,'group' => $name_group, 'branch' => $name_branch, 'id_week' => $id_week]);
    }
}
