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
                            <h4 class="title">Slider Düzenle</h4>
                        </div>
                        <div class="card-content">
                            <form action="{{route('admin.slider.edit.post',['id'=>$data[0]['id']])}}" method="POST" enctype="multipart/form-data">
                                @csrf


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            @if($data[0]['image']!="")
                                                <img src="{{asset($data[0]['image'])}}" style="width: 150px; height: 150px">
                                            @endif
                                            <input type="file" name="image" class="form-control" style="opacity: 1;position: inherit" >
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <button type="submit" class="btn btn-primary pull-right">Slider Güncelle</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
