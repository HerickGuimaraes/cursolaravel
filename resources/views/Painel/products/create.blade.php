@extends('painel.template.template')
@section('content')
<h1 class="title-pg">{{$title}}</h1>
@if (isset($errors) && count($errors)> 0 )
    <div class = "alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif
    @if ($product)
       <form class="form" method="post" action="{{route('product.update', $product->id)}}">
    @else
       <form class="form" method="post" action="{{route('store')}}">
    @endif
        @csrf
       <div class="input-group mb-3">
           <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1">User Name</span>
           </div>
           <input type="text" name="name" placeholder="Nome:" class="form-control" value="{{$product ? $product->name : ''}}">
       </div>
       <div class="input-group mb-3">
           <input type="checkbox" name="active" value="1" @if($product && $product->active == '1') checked @endif>
       </div>
       <div class="input-group mb-3">
           <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1">Numero</span>
           </div>
           <input type="text" name="number" placeholder="Numero:" class="form-control" value="{{$product ? $product->number : ''}}">
       </div>
       <div class="input-group mb-3">
           <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1">Escolha a categoria</span>
           </div>
           <select class="form-select" name="category" id="category" aria-label="Selecione">
               @foreach ($categorys as $category)
                   <option value="{{$category}}"
                           @if($product && $product->category == $category)
                           selected
                       @endif
                   >{{$category}}</option>
               @endforeach
           </select>
       </div>
       <div class="input-group">
           <span class="input-group-text">Descrição</span>
           <textarea name="descrition" placeholder="Descrição" class="form-control">{{$product ?  $product->descrition : ''}}</textarea>
       </div>
        <br>
        <button class="btn btn-primary">Enviar</button>
    </form>
@endsection
