@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('admin.slider.create')}}" class="btn btn-primary">Yeni Slider Ekle</a>
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Slider</h4>
                            <p class="category">Burada eklenen sliderları bulabilirsiniz.</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <th>Önizleme</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                                </thead>
                                <tbody>

                                @foreach($data as $val)
                                    <tr>
                                        <td><img src="{{asset($val['image'])}}" alt="" style="width: 120px; height:120px;"></td>
                                        <td><a href="{{route('admin.slider.edit',['id'=>$val['id']])}}">Düzenle</a></td>
                                        <td><a href="{{route('admin.slider.delete',['id'=>$val['id']])}}">Sil</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$data->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

