<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $guarded = ['id'];

    public function getTimeCardActive()
    {

        $cardNumber = substr($this->card_number, 9, strlen($this->card_number));
        $time = (int)(((int)$cardNumber) / 50);

        $from = (6 + $time);
        $to = (6 + $time + 1);

        $type1 = "صباحاً";
        $type2 = "صباحاً";

        if ($from >= 12 && $from != 24) {
            $type1 = "مساءً";
            if ($from != 12)
                $from %= 12;
        } elseif ($from == 24) {
            $from = 12;
            $type1 = "صباحاً";
        }

        if ($to >= 12 && $to != 24) {
            $type2 = "مساءً";
            if ($to != 12)
                $to %= 12;
        } elseif ($to >= 12) {
            $type1 = "صباحاً";
            $to = 12;
        }

        $text = "من ";
        $text .= $from . " ";
        $text .= $type1 . " ";
        $text .= "إلى ";
        $text .= $to . " ";
        $text .= $type2;

        return $text;

    }
}
