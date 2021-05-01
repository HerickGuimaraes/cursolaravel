@extends('painel.template.template')

@section('title')
    View produtos
    @endsection

@section('content')
    <h1 class ="Title-pg">Produto: <b>{{$product->name}}</b></h1>
    <p><b>Categoria: </b>{{$product->category}}</p>
    <p><b>Descrição: </b>{{$product->descrition}}</p>
    <p><b>Modelo: </b>{{$product->model}}</p>
    <p><b>marca: </b>{{$product->brand}}</p>
    <a href="{{route('index')}}" type="button" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"></span> Voltar</a>
    <a href="{{route('product.delete', ['id'=>$product->id])}}" type="button " class="btn btn-add btn-danger"><span class="glyphicon glyphicon-plus"></span> Deletar</a>
@endsection
