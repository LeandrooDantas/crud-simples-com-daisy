@extends('layouts.app')
@section('title', 'Contagens')
@section('content')
    <div class="flex h-full items-center justify-center">
    <div class="w-full max-w-xl mt-10 mb-10 border border-base-300 rounded-xl p-8 bg-white shadow-lg">
        <form action="{{route('savecount')}}" method="POST">
            @csrf
            <label>Nome do Produto</label>
            <input class="input w-full" type="text" name="product_name"> <br>

            <label>Categoria</label>
            <input type="text" name="category" class="input w-full"> <br>

            <label>Setor</label>
            <input type="text" name="sector" class="input w-full"> <br>

            <label>Quantidade</label>
            <input type="number" name="quantity" class="input w-full"><br>

            <button type="submit" class="btn btn-primary w-full mt-4">Enviar</button>
        </form>
            <a href="{{route('listcount')}}" class="btn btn-primary w-full mt-4">Lista</a>
    </div>
    </div>
    @error('product_name')
        {{ $message }}
    @enderror
    @error('quantity')
    {{ $message }}
    @enderror
    @error('sector')
    {{ $message }}
    @enderror
    @error('category')
    {{ $message }}
    @enderror

@endsection
