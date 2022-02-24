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
                            <h4 class="title">Kitap Ekle</h4>
                            <p class="category">Kitap Oluşturunuz </p>
                        </div>
                        <div class="card-content">
                            <form action="{{route('admin.kitaplar.create.post')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">Kitap Adı</label>
                                            <input type="text" name="name" class="form-control">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <select class="form-control" name="yazarid" >
                                                <option>Yazar Seçiniz</option>
                                                @foreach($yazar as $val)
                                                    <option value="{{$val->id}}">{{$val->name}}</option>
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
                                                <option>Yayınevi Seçiniz</option>
                                            @foreach($yayinevi as $val)
                                                    <option value="{{$val->id}}">{{$val->name}}</option>
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
                                                <option>Kategori Seçiniz</option>
                                                @foreach($kategoriler as $val)
                                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="file" name="image" class="form-control" style="opacity: 1;position: inherit">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Fiyat</label>
                                            <input type="number" name="fiyat" class="form-control">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">Açıklama</label>
                                            <textarea name="aciklama" id="" cols="30" rows="10" class="form-control"></textarea>
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <button type="submit" class="btn btn-primary pull-right">Kitap Ekle</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
