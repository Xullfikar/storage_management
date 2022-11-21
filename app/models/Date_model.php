<?php

class Date_model
{
    public function waktu()
    {
        date_default_timezone_set("Asia/Makassar");
        $date = date("Y-m-d");
        return $date;
    }
}
