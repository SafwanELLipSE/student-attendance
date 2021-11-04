<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_attendance extends Model
{

    public static function setDay($name)
    {
        switch ($name) {
            case "Sunday":
                return "Su";
            case "Monday":
                return "M";
            case "Tuesday":
                return "Tu";
            case "Wednesday":
                return "W";
            case "Thursday":
                return "Th";
            case "Friday":
                return "F";
            case "Saturday":
                return "Sa";
        }
    }
}
