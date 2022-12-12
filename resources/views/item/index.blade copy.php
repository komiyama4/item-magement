@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品一覧</h1>
@stop

@section('content')
{{-- 検索機能 --}}
<div class="search container">
    <p>{{$items}}</p>
    <form action="{{ route('item.index') }}" method="GET">
        @csrf
        <div class="form-group row row-cols-2">
            {{-- neme&datail検索フォーム --}}
            <div class="name.search.form mb-2">
                <label for="">名前・詳細検索フォーム</label>
                    <div>
                        <input class="form-control" type="search" name="keyword" placeholder="入力" value="@if(isset($keyword)) {{ $keyword }} @endif">
                    </div>
            </div>

        </div>

        <button type="submit" class="btn btn-info">検索</button>
        <button type="button" class="btn btn-warning"><a href="{{  url('items') }}" class="text-white"></a> クリア</button>
    </form>

</div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>種別</th>
                                <th>詳細</th>
                                <th>価格</th>
                                <th>商品個数</th>
                                <th>購入日</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->detail }}</td>
                                    <td>{{ $item->value }}</td>
                                    <td>{{ $item->product_quantity }}</td>
                                    <td>{{ $item->date}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
