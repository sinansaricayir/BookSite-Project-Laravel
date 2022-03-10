@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('admin.yazar.create')}}" class="btn btn-primary">Yeni Yazar Ekle</a>
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Yazarlar</h4>
                            <p class="category">Burada eklenen yazarların listesini bulabilirsiniz.</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <th>İsim</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                                </thead>
                                <tbody>

                                @foreach($data as $val)
                                    <tr>
                                        <td>{{$val->name}}</td>
                                        <td><img src="/{{$val->image}}" style="height: 120px;width: 120px;"></td>
                                        <td><a href="{{route('admin.yazar.edit',['id'=>$val['id']])}}">Düzenle</a></td>
                                        <td><a href="{{route('admin.yazar.delete',['id'=>$val['id']])}}">Sil</a></td>
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

