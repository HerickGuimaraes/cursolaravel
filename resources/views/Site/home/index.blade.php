@extends('site.templade.templade1')

@section('content')

<h1>Home Page</h1>
{!! $xss !!}

@if($var1 == '143' )
    <p>É igual</p>
@else
    <p>É diferente</p>
@endif


@unless($var1 == 143)
    <p>Não é igual... unless</p>
@endunless
{{--
@for($i = 0; $i < 10; $i++)
    <p>valor:{{$i}}</p>
@endfor
--}}
{{--
@if(count ($arrayData) > 0)
    @foreach($arrayData as $array)
        <p>valor:{{$array}}</p>
    @endforeach
@endif
--}}

@forelse($arrayData as $array)
        <p>valor:{{$array}}</p>
    @empty
        <p>Não existe itens</p>
@endforelse

@include('site.includes.sidebar', compact('var1'))

@endsection

@push ('scripts')

@endpush
