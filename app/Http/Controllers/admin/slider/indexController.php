<?php

namespace App\Http\Controllers\admin\slider;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Yazarlar;
use Illuminate\Http\Request;
use App\Helper\imageUpload;;
use App\Slider;



class indexController extends Controller
{
    public function index()
    {
        $data = Slider::paginate(10);
        return view('admin.slider.index',['data'=>$data]);
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request){
        $all = $request->except('_token');
        $all['image'] = imageUpload::singleUpload(rand(1, 9000), "slider", $request->file('image'));
        $add = Slider::create($all);
        if($add){
            return redirect()->to('/admin/slider')->send();
        }else{
            return redirect()->back()->with('status','Beklenmedik Bir hata Oluştu');
        }
    }

    public function edit($id)
    {
        $data = Slider::where('id','=',$id)->get();
        return view('admin.slider.edit',['data'=>$data]);
    }


    public function update(Request $request){
        $id = $request->route('id');
        $c = Slider::where('id',$id)->count();
        if($c!=0)
        {
            $data=Slider::where('id','=',$id)->get();
            $all = $request->except('_token');
            $all['image'] = imageUpload::singleUploadUpdate(rand(1,9000),'slider',$request->file('image'),$data,"image");
            $update = Slider::where('id','=',$id)->update($all);
            if($update)
            {
                return redirect()->back()->with('status','Slider Başarı İle Düzenlendi');
            }else
            {
                return redirect()->back()->with('status','Slider Düzenlenemedi');

            }
        }else
        {
            return redirect('/');
        }

    }

    public function delete($id)
    {
        $data = Slider::where('id','=',$id)->delete();
        return redirect()->back();
    }




}
