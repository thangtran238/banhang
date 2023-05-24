<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function show() {
        return view('page.trangchu');
    }
    public function product() {
        return view('page.loai_sanpham');
    }

    public function productDetail() {
        return view('page.chitiet_sanpham');
    }
    public function contact() {
        return view('page.lienhe');
    }
    public function about() {
        return view('page.about');
    }
    public function date() {
        $day = Carbon::now()->dayOfWeek;
        return view('page.trangchu',  ['day' => $day]);
    }
}
