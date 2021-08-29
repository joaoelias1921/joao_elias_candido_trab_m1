@extends('produtos.layout')    <!-- herda o layout do layout.blade -->

@section('title',__('(Trabalho M1 - CRUD)'))  <!-- modifica o titulo para essa tela em especifico -->

@push('css')    <!-- posso ter definições css proprias para essa tela, tag style abaixo -->
<style>
    /* Personalizar layout*/
</style>
@endpush

@section('content')   <!-- vem do @yield('content') dentro do layout.blade -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <span>@lang('Listagem de Produtos')</span>   <!-- criar uma tela -->
                        <a href="{{ url('produtos/create') }}" class="btn-primary btn-sm"> <!-- caminho do arquivo para esta tela, rota em web.php -> ProdutoController.php -> create; Laravel -->
                            <i class="fa fa-plus"></i> @lang('Novo Produto')  <!-- criar um botão -->
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success')) <!-- vem do ProdutoController.php, função store -->
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>@lang('Tipo')</td>
                                <td>@lang('Modelo')</td>
                                <td>@lang('Marca')</td>
                                <td>@lang('Preço de Venda')</td>
                                <td>@lang('Cor')</td>
                                <td>@lang('Peso')</td>
                                <td>@lang('Descrição')</td>
                                <td colspan="8" class="text-center">@lang('Ações')</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produtos as $produto) <!-- vem da function index no ProdutoController -->
                            <tr>
                                <td>{{$produto->id}}</td>
                                <td>{{$produto->tipo}}</td>
                                <td>{{$produto->modelo}}</td>
                                <td>{{$produto->marca}}</td>
                                <td>{{$produto->precoVenda}}</td>
                                <td>{{$produto->cor}}</td>
                                <td>{{$produto->peso}}</td>
                                <td>{{$produto->descricao}}</td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('produtos.show', $produto->id)}}" 
                                        class="btn btn-info btn-sm">@lang('Abrir') <!-- outra forma de mostrar caminho do arquivo -->
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('produtos.edit', $produto->id)}}"
                                        class="btn btn-primary btn-sm">@lang('Editar')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <form action="{{ route('produtos.destroy', $produto->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js') <!-- igual ao push css, script js personalizado para esta tela -->
<script>
    // Script personalizado
</script>
@endpush