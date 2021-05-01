@extends('painel.template.template')

@section('title')
lista de produtos
@endsection

@section('content')
<h1 class="title-pg">{{$title}}</h1>
<a href="{{'/painel/produtos/create'}}" type="button" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
<hr>
@if (isset($msg) && count($msg) > 0 )
    <div class = "alert alert-primary">aaaaa
      {{$msg[0]}}
    </div>
@endif
<table class="table table-striped">
    <tr>
        <th>Nome</th>
         <th>Descrição</th>
         <th width="150px">Ações</th>
    </tr>
    @foreach($products as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->descrition}}</td>
            <td>
                <a class="btn btn-info" href="{{route('product.edit', ['id'=>$product->id])}}" style="color: #fff">
                    <span class="glyphicon glyphicon-pencil"></span> Edit
                </a>
                &nbsp
                <a class="btn btn-success" href="{{route('product.view', ['id'=>$product->id])}}">
                    <span class="glyphicon glyphicon-eye-open"></span> View
                </a>
            </td>
        </tr>
    @endforeach()
</table>

@endsection
