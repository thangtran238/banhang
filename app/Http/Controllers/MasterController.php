<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\product;
use App\Models\Slide;
use App\Models\Type_Product;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
        $new_product = Product::where('new', 1)->paginate(8);
        $sanpham_khuyenmai = Product::where('promotion_price', '<>', 0)->paginate(4);
        return view('page.trangchu', compact('slide', 'new_product', 'sanpham_khuyenmai'));
    }

    public function getDetail(Request $request)
    {
        $sanpham = Product::where('id', $request->id)->first();
        $splienquan = Product::where('id', '<>', $sanpham->id, 'and', 'id_type', '=', $sanpham->id_type)->paginate(3);
        $comments = Comment::where('id_product', $request->id)->get();
        return view('page.chitiet_sanpham', compact('sanpham', 'splienquan', 'comments'));
    }
    public function getLoaiSp($type) {
        $type_product = Type_Product::all();

        $sp_theoloai = Product::where('id_type',$type)->get();

        $sp_khac = Product::where('id_type', '<>',$type)->paginate(3);

        return view('page.loai_sanpham', compact('sp_theoloai','type_product','sp_khac'));
    }

    public function show()
    {
        return view('page.trangchu');
    }
    public function product()
    {
        return view('page.loai_sanpham');
    }

    public function productDetail()
    {
        return view('page.chitiet_sanpham');
    }
    public function contact()
    {
        return view('page.lienhe');
    }
    public function about()
    {
        return view('page.about');
    }
    public function date()
    {
        $day = Carbon::now()->dayOfWeek;
        return view('page.trangchu',  ['day' => $day]);
    }
}
