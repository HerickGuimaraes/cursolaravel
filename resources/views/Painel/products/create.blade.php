@extends('painel.template.template')

@section('content')

<h1 class="title-pg">Gestao Produto</h1>

@if (isset($errors) && count($errors)> 0 )
    <div class = "alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif
@if (isset($produt))
    <form class="form" method="post" action="{{route('product.edit', $product->$id)}}">
        {{!! method_field('PUT') !!}}
@else

@endif
<form class="form" method="post" action="{{route('store')}}">
    @csrf
    <div class="form-group">
        <input type="text" name="name" placeholder="Nome:"class="form-control" value="{{$product->name or old('name')}}">
    </div>

    <div class="form-group">
        <input type="checkbox" name="active" value="1" @if(isset($product) && $product->active == '1') checked @endif>
    </div>

    <div class="form-group">

        <input type="text" name="number" placeholder="Numero:" class="form-control" value="{{$product->number or old('name')}}">
    </div>

    <div class="form-group">
        <br>
        <select name="category" class="form-control">
            <option> Escolha a categoria</option>
            @foreach ($categorys as $category)
                <option value="{{$category}}"
                @if (isset($product) && $product->category == $category)
                    selected
                @endif
                >{{$category}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <br>
        <textarea name="descrition" placeholder="Descrição" class="form-control" value ="{{$product->descrition or old('name')}}"></textarea>
    </div>
    <br>
    <button class="btn btn-primary">Enviar</button>

</form>

@endsection
