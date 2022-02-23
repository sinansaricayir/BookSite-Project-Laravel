<?php

namespace App\Http\Controllers\admin\kitaplar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\imageUpload;
use App\Helper\mHelper;
use App\Kitaplar;
use App\YayinEvi;
use App\Yazarlar;


class indexController extends Controller
{
    public function index(){
        $data = Kitaplar::paginate(10);
        return view('admin.kitaplar.index',['data'=>$data]);
    }

    public function create(){
        $yazar = Yazarlar::all();
        $yayinevi = YayinEvi::all();

        return view('admin.kitaplar.create',['yazar'=>$yazar,'yayinevi'=>$yayinevi]);
    }

    public function store(Request $request){
        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);
        $all['image'] = imageUpload::singleUpload(rand(1, 9000), "kitaplar", $request->file('image'));
        $add = Kitaplar::create($all);
        if($add){
            return redirect()->to('/admin/kitaplar')->send();
        }else{
            return redirect()->back()->with('status','Beklenmedik Bir hata Oluştu');
        }
    }

    public function edit($id){
        $yazar = Yazarlar::all();
        $yayinevi = YayinEvi::all();
        $c = Kitaplar::where('id',$id)->count();
        if($c != 0){
            $data = Kitaplar::where('id',$id)->get();
            return view('admin.kitaplar.edit',['data'=>$data,'yazar'=>$yazar,'yayinevi'=>$yayinevi]);
        }else{
            return redirect('/');
        }
    }

    public function update(Request $request){
        $id = $request->route('id');
        $all = $request->except('_token');
        $all['selflink'] = mHelper::permalink($all['name']);
        if(@$all['image'] != null){
            $all['image'] = imageUpload::singleUpload(rand(1,9000),'kitaplar',$request->file('image'));
        }
        $update = Kitaplar::where('id','=',$id)->update($all);
        if($update){
            return redirect()->to('/admin/kitaplar')->send();
        }else{
            return redirect()->back()->with('status','Beklenmedik Bir hata Oluştu');
        }
    }

    public function delete($id){
        $c = Kitaplar::where('id', '=', $id)->count();
        if ($c != 0) {
            Kitaplar::where('id','=',$id)->delete();
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }

}
