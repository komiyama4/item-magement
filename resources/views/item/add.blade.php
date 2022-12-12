@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>商品登録</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <form method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="名前">
                        </div>

                    <div class="form-group">
                        <label for="type">種別</label>
                        <select name="type" id="type" class="form-control">
                        <option value="1">飲料</option>
                        <option value="2">本</option>
                        <option value="3">家電</option>
                        <option value="4">ゲーム</option>
                        <option value="5">服</option>
                        <option value="6">スポーツ用品</option>
                        </select>
	                </div>
                        
                        <!-- <div class="form-group">
                            <label for="type">種別</label>
                            <input type="number" class="form-control" id="type" name="type" placeholder="1, 2, 3, ...">
                        </div> -->

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明">
                        </div>

                        <div class="form-group">
                            <label for="value">価格</label>
                            <input type="number"  min="0" class="form-control" id="value" name="value" placeholder="価格">
                        </div>

                        <div class="form-group">
                            <label for="product_quantity">商品個数</label>
                        <input type="number"  min="0" class="form-control" id="product_quantity" name="product_quantity" placeholder="個数">
                        </div>

                        <div class="form-group">
                        <label for="date" class="col-form-label">購入日</label>
                        <input type="date" class="form-control" id="date" name="date">
                        </div>
                       
                        
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
