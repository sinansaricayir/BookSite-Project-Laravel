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
                            <h4 class="title">Slider Ekle</h4>
                            <p class="category">Slider Oluşturunuz </p>
                        </div>
                        <div class="card-content">
                            <form action="{{route('admin.slider.create.post')}}" method="POST" enctype="multipart/form-data">
                                @csrf



                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Yazar Resim</label>
                                            <input type="file" name="image" class="form-control" style="opacity: 1;position: inherit">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                <button type="submit" class="btn btn-primary pull-right">Slider Ekle</button>
                                </div>

                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
