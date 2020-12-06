<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $guarded = ['id'];

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'id_driver');
    }

    public function passengers()
    {
        return $this->belongsToMany(Passenger::class);
    }

    public function getDayMonthDateFormat()
    {

        $day = substr($this->date, strlen($this->date) - 2, 2);
        $month = substr($this->date, strlen($this->date) - 5, 2);

        return $day . '/' . $month;
    }

    public function getHourMinuteFormat()
    {

        $hour = (int)(substr($this->hour, 0, 2));
        $minute = (int)(substr($this->hour, 3, 4));
        $type = " صباحاً";

        if ($this->hour > 12) {

            $hour = $hour % 12;
            $type = " مساءً";

        }

        if ($hour < 10)
            $hour = "0" . $hour;

        if ($minute < 10)
            $minute = "0" . $minute;

        return " " . $hour . ':' . $minute . ' -' . $type;

    }

    public function getAvailablePassenger()
    {
        $available = $this->driver->vehicle_capacity - $this->passengers->count();
        return ($available < 0) ? 0 : (($available < 10) ? "0" . $available : $available);
    }

}
