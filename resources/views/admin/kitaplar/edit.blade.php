@extends('layouts.admin')
@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(session('status'))
                        <div class="alert alert-primary" role="alert">
                            {{session('status')}}
                        </div>

                    @endif
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Kitap Düzenle</h4>
                            <p class="category">Kitap Oluşturunuz </p>
                        </div>
                        <div class="card-content">
                            <form action="{{route('admin.kitaplar.edit.post',['id'=>$data[0]['id']])}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <input type="text" name="name" class="form-control" value="{{$data[0]['name']}}">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <select class="form-control" name="yazarid" >
                                                @foreach($yazar as $val)
                                                    <option @if($val['id'] == $data[0]['yazarid']) selected @endif value="{{$val->id}}">{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <select class="form-control" name="yayinid" >
                                                @foreach($yayinevi as $val)
                                                    <option @if($val['id'] == $data[0]['yayinid']) selected @endif value="{{$val->id}}">{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <select class="form-control" name="kategoriid" >
                                                @foreach($kategoriler as $val)
                                                    <option @if($val['id'] == $data[0]['kategoriid']) selected @endif value="{{$val->id}}">{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            @if($data[0]['image']!="")
                                                <img src="{{asset($data[0]['image'])}}" style="width: 120px;height: 120px;">
                                            @endif
                                            <input type="file" name="image" class="form-control" style="opacity: 1;position: inherit">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="number" name="fiyat" class="form-control" value="{{$data[0]['fiyat']}}">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <textarea name="aciklama" id="" cols="30" rows="10" class="form-control">{{$data[0]['aciklama']}}</textarea>
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <button type="submit" class="btn btn-primary pull-right">Kitap Düzenle</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
