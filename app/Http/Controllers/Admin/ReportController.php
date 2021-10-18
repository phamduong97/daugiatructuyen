<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Users;
use App\Models\Room;
use App\Models\Position;
use Hash;
use Session;
use Auth;


class ReportController extends Controller
{
   

    public function ListComplete100(){
        return view('report.list100');
    }

    public function ListComplete50(){
        return view('report.list50');
    }

     public function ListMonth(){
        return view('report.listmonth');
    }





}
