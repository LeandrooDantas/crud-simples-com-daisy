@extends('layouts.app')
@section('content')
<div>
    <div class="flex justify-center">
        <div class="w-full max-w-xl mt-10 mb-10 border border-base-300 rounded-xl p-8 bg-white shadow-lg">
            <div class="w-full flex justify-end">
            <a href="{{route('counts')}}" class="btn btn-primary justify-end">Adicionar Novo </a>
            </div>
        <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Setor</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($counts as $count)
            <tr>
                <td>
                    {{$count->product_name}}
                </td>
                <td>
                    {{$count->quantity}}
                </td>
                <td>
                    {{$count->sector}}
                </td>
                <td>
                    {{$count->category}}
                </td>
                <td>
                    <div class="flex gap-2">
                    <a class="btn btn-sm btn-primary text-white" href="{{route('updatecount',['id'=>$count->id])}}">Editar</a>
                    <a class="btn btn-sm btn-error text-white" href="{{route('deletecount',['id'=>$count->id])}}">Excluir</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection

