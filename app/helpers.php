<?php

use Illuminate\Support\Facades\DB;
use App\Models\setting;
use App\Models\type_contact;
use App\Models\category;


function get_phone(){
    $id = 1;
    $objs = setting::find($id);
    return $objs->phone;
}

function get_line(){
    $id = 1;
    $objs = setting::find($id);
    return $objs->line_oa_url;
}

function get_email(){
    $id = 1;
    $objs = setting::find($id);
    return $objs->email;
}

function get_facebook(){
    $id = 1;
    $objs = setting::find($id);
    return $objs->facebook_url;
}

function get_fax(){
    $id = 1;
    $objs = setting::find($id);
    return $objs->banner_his;
}

function type_contact(){
    $objs = type_contact::where('status', 1)->get();
    return $objs;
}

function get_category(){
    $objs = category::where('status', 1)->get();
    return $objs;
}

function formatDateThat($strDate)
{
    $strYear = date("Y",strtotime($strDate));
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","January","February","March","April","May","June","July","August","September","October","November","December");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear ";
}
