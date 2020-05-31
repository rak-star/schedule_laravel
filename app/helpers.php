<?php

if (! function_exists('getScheduleTeacher')) {
    function getScheduleTeacher($name_table,$prepod,$para,$day_1,$day_2){
        $query = DB::table($name_table)->select("branch_id", "group_name", 'date', "predmet$para", "kabinet$para", "prepod$para")->where("prepod$para", "like", "%$prepod%")->whereBetween('date', [$day_1, $day_2])->get();
        if(count($query) > 0){
            $test = array();
            foreach ((array)$query as $items) {
                foreach ((array)$items as $item) {
                    $item = (array)$item;
                    $item += ['para'=>$para];
                    array_push($test,$item);
                }
            }
            return $test;
        }else{
            return array();
        }
    }
}

if (! function_exists('translit_teacher')) {
    function translit_teacher($s) {
        $s = (string) $s; // преобразуем в строковое значение
        $s = strip_tags($s); // убираем HTML-теги
        $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
        $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
        $s = trim($s); // убираем пробелы в начале и конце строки
        $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
        $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'zh','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
        $s = str_replace(" ", "_", $s); // заменяем пробелы знаком минус
        $s = str_replace(".", "_", $s); // заменяем пробелы знаком минус
        $s = mb_substr($s, 0, -1);
        return $s; // возвращаем результат
    }
}

if (! function_exists('translit_group')) {
    function translit_group($s) {
        $s = (string) $s; // преобразуем в строковое значение
        $s = strip_tags($s); // убираем HTML-теги
        $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
        $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
        $s = trim($s); // убираем пробелы в начале и конце строки
        $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
        $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'zh','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
        $s = str_replace("/", "-", $s);
        return $s; // возвращаем результат
    }
}

function grade_sort($x, $y) {
    return ($x['para'] > $y['para']);
}

if (! function_exists('get_name_table')) {
    function get_name_table($pref_table){
        $this_month = date('n');
        $this_year = date('y');
        if($this_month >=1 and $this_month <=7){
            $year = $this_year - 1;
            return $pref_table.'_2_'.$year.'_'.$this_year;
        }elseif($this_month >=8 and $this_month <=12){
            $year = $this_year + 1;
            return $pref_table.'_1_'.$this_year.'_'.$year;
        }
    }
}

if (! function_exists('get_week')) {
    function get_week($i){
        $num_week = date('N',strtotime("Monday +$i day"));
        if ($num_week == 1) return 'Понедельник';
        elseif ($num_week == 2) return 'Вторник';
        elseif ($num_week == 3) return 'Среда';
        elseif ($num_week == 4) return 'Четверг';
        elseif ($num_week == 5) return 'Пятница';
        elseif ($num_week == 6) return 'Суббота';
    }
}
