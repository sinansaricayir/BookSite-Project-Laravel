<?php

namespace App\Http\Controllers\admin\kategoriler;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Kategoriler;
use Illuminate\Http\Request;


class indexController extends Controller
{
    public function index(){
        $data=Kategoriler::paginate(10);
        return view('admin.kategoriler.index',['data'=>$data]);
    }

    public function create(){
        return view('admin.kategoriler.create');
    }

    public function store(Request $request){
        $all = $request->except('_token');
        $all['selflink'] =  mHelper::permalink($all['name']);
        $insert = Kategoriler::create($all);


        if($insert){
            return redirect()->to('/admin/kategoriler')->send();
        }else{
            return redirect()->back()->with('status','Yayın Evi Eklenemedi');
        }
    }

    public function edit($id)
    {
        $c = Kategoriler::where('id', '=', $id)->count();

        if ($c != 0) {

            $data = Kategoriler::where('id', $id)->get();
            return view('admin.kategoriler.edit', ['data' => $data]);

        } else {

            return redirect('/');
        }
    }

    public function update(Request $request){
        $id = $request->route('id');
        $c = Kategoriler::where('id', '=', $id)->count();

        if ($c != 0) {
            $all = $request->except('_token');
            $all['selflink'] = mHelper::permalink($all['name']);
            $update = Kategoriler::where('id',$id)->update($all);

            if($update){
                return redirect()->back()->with('status','Yayın Evi Başarı İle Düzenlendi');
            }else{
                return redirect()->back()->with('status','Yayın Evi Düzenlenemedi');
            }
        } else {
            return redirect('/');
        }


    }


    public function delete($id){
        $c = Kategoriler::where('id', '=', $id)->count();

        if ($c != 0) {
            $delete = Kategoriler::where('id','=',$id)->delete();
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }




}
