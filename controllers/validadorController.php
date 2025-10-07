<?php


class validadorController {

    public static function validate_data($data, $labels){
        $pendets = [];
        foreach ($labels as $lbl){
            if (!isset($data[$lbl]) && empty($data[$lbl]) ){
                $pendets[] = $lbl;
            }
        }
        if(!empty($pendets) ){
            $pendets = implode(", ", $pendets);
            jsonResponse(['message'=>"Erro, Falta o campo: ".$pendets], 400);
            exit;
        }
    }

    public static function fix_dateHour($date, $hour){
        $dateHour = new DateTime($date);
        $dateHour->setTime($hour, 0, 0);
        return $dateHour->format('Y-m-d H:i:s');
    }


}