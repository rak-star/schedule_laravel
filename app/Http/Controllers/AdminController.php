<?php

namespace App\Http\Controllers;

use App\Models\Ymk_branch;
use App\Models\Ymk_group;
use App\Models\Ymk_kabinet;
use App\Models\Ymk_teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $teachers = Ymk_teacher::all();
        $branches = Ymk_branch::all();
        $groups = Ymk_group::select('id', 'name')->get();
        $kabinets = Ymk_kabinet::all();
        return view('admin.index', (['teachers' => $teachers, 'branches' => $branches, 'groups' => $groups, 'kabinets' => $kabinets]));
    }

    public function edit_teacher_add(Request $teacher){
        $new_teacher = new Ymk_teacher();
        $name_branch = Ymk_branch::find($teacher->branch_id);
        $name_group = Ymk_group::find($teacher->group_id);
        $name = $teacher->name;
        $short_name = translit_teacher($name);
        $name_kabinet = Ymk_kabinet::find($teacher->kabinet);
        $new_teacher->branch_id = $teacher->branch_id;
        $new_teacher->branch_name = $name_branch->name;
        $new_teacher->group_id = $teacher->group_id;
        $new_teacher->group_name = $name_group->name;
        $new_teacher->fullname = $teacher->fullname;
        $new_teacher->name = $name;
        $new_teacher->short_name = $short_name;
        $new_teacher->kabinet_id = $teacher->kabinet;
        $new_teacher->kabinet_name = $name_kabinet->name;
        $new_teacher->k_m = $teacher->k_m;
        $new_teacher->number_phone = $teacher->number_phone;
        $new_teacher->email = $teacher->email;

        if($teacher->status_teacher == 'on'){
            $new_teacher->status = true;
        }else{
            $new_teacher->status = false;
        }
        $new_teacher->save();



        $user_email = User::where('email', $teacher->email)->get();
        if(count($user_email) == 0 and $teacher->email != ''){
            $id = Ymk_teacher::where('email', $teacher->email)->value('id');
            $reg = new User();
            $reg->name = $name;
            $reg->email = $teacher->email;
            $reg->password = Hash::make('123456');
            $reg->teacher_id = $id;
            $reg->save();

        }

        return redirect()->route('admin_home');
    }

    public function edit_teacher_edit(Request $teacher){
        $id = $teacher->id_teacher;
        if(isset($_POST['edit_teacher'])){
            $old_teacher = Ymk_teacher::find($id);
            if($old_teacher->branch_id != $teacher->branch_id){
                $name_branch = Ymk_branch::where('id', $teacher->branch_id)->value('name');
                Ymk_teacher::where('id', $id)->update(['branch_id' => $teacher->branch_id, 'branch_name' => $name_branch]);
            }

            if($old_teacher->group_id != $teacher->group_id){
                $name_group = Ymk_group::where('id', $teacher->group_id)->value('name');
                Ymk_teacher::where('id', $id)->update(['group_id' => $teacher->group_id, 'group_name' => $name_group]);
            }

            if($old_teacher->name != $teacher->name_teacher){
                $short_name = translit_teacher($teacher->name_teacher);
                Ymk_teacher::where('id', $id)->update(['name' => $teacher->name_teacher, 'short_name' => $short_name]);

            }

            if($old_teacher->fullname != $teacher->fullname_teacher){
                Ymk_teacher::where('id', $id)->update(['fullname' => $teacher->fullname_teacher]);
            }

            if($old_teacher->kabinet_id != $teacher->kabinet_id){
                $name_kabinet = Ymk_kabinet::where('id', $teacher->kabinet_id)->value('name');
                Ymk_teacher::where('id', $id)->update(['kabinet_id' => $teacher->kabinet_id, 'kabinet_name' => $name_kabinet]);
            }

            if($old_teacher->k_m != $teacher->k_m){
                Ymk_teacher::where('id', $id)->update(['k_m' => $teacher->k_m]);
            }

            if($old_teacher->email != $teacher->email_teacher){
                Ymk_teacher::where('id', $id)->update(['email' => $teacher->email_teacher]);
            }

            if($old_teacher->number_phone != $teacher->phone_teacher){
                Ymk_teacher::where('id', $id)->update(['number_phone' => $teacher->phone_teacher]);
            }

            if($teacher->status_teacher == 'on'){
                $teacher->status = true;
            }else{
                $teacher->status = false;
            }

            if($old_teacher->status != $teacher->status){
                Ymk_teacher::where('id', $id)->update(['status' => $teacher->status]);
            }

        }elseif(isset($_POST['delete_teacher'])){
            Ymk_teacher::where('id', $id)->delete();
        }

        return redirect()->route('admin_home');
    }

    public function edit_group(){
        $branches = Ymk_branch::all();
        $groups = Ymk_group::all();
        return view('admin.edit_group', (['branches' => $branches, 'groups' => $groups]));
    }

    public function edit_group_edit(Request $group){
        $id = $group->id_group;
        if(isset($_POST['edit_group'])){
            $old_group = Ymk_group::find($id);

            if($old_group->branch_id != $group->branch_id){
                $name_branch = Ymk_branch::where('id', $group->branch_id)->value('name');
                Ymk_group::where('id', $id)->update(['branch_id' => $group->branch_id, 'branch_name' => $name_branch]);
            }

            if($old_group->kurs != $group->kurs){
                Ymk_group::where('id', $id)->update(['kurs' => $group->fullname_teacher]);
            }

            if($old_group->name != $group->name){
                $name = $group->name;
                $short_name = translit_group($name);
                strpos($name, '/') ? $uch_plan = substr($short_name, 0, -2) : $uch_plan = $short_name;
                Ymk_group::where('id', $id)->update(['name' => $name,'short_name' => $short_name, 'uch_plan' => $uch_plan]);
            }

            if($old_group->kod_group != $group->kod){
                Ymk_group::where('id', $id)->update(['kod_group' => $group->kod]);
            }

            if($old_group->name_group != $group->fullname){
                Ymk_group::where('id', $id)->update(['name_group' => $group->fullname]);
            }

            if($old_group->display_order != $group->display_order){
                Ymk_group::where('id', $id)->update(['display_order' => $group->display_order]);
            }

            ($group->status_group == 'on') ? $group->status_group = true : $group->status_group = false;

            if($old_group->status != $group->status_group){
                Ymk_group::where('id', $id)->update(['status' => $group->status_group]);
            }

        }elseif (isset($_POST['delete_group'])){
            Ymk_group::where('id', $id)->delete();
        }

        return redirect()->route('home_group');
    }

    public function edit_group_add(Request $group){
        $new_group = new Ymk_group();
        $name_branch = Ymk_branch::find($group->branch_id);
        $name = $group->name;
        $short_name = translit_group($name);
        $new_group->branch_id = $group->branch_id;
        $new_group->branch_name = $name_branch->name;
        $new_group->kurs = $group->kurs;
        $new_group->name = $name;
        $new_group->short_name = $short_name;
        strpos($name, '/') ? $new_group->uch_plan = substr($short_name, 0, -2) : $new_group->uch_plan = $short_name;
        $new_group->kod_group = $group->kod;
        $new_group->name_group = $group->fullname;
        $new_group->display_order = $group->display_order;
        ($group->status_group == 'on') ? $new_group->status = true : $new_group->status = false;

        $new_group->save();

        return redirect()->route('home_group');
    }

    public function edit_ads(){
        return view('admin.edit_ads');
    }
}
