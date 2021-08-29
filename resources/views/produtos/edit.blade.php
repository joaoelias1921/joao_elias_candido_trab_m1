@extends('produtos.layout')

@section('title',__('Editar (Trabalho M1)'))

@push('css')
<style>
    /* Personalizar layout*/
</style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <h5>@lang('Editar Produto')</h5>
                        <a href="{{ url('produtos') }}" class="btn btn-outline-info">
                            <i class="fa fa-arrow-left"></i> @lang('Voltar')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {!! Form::open(['action' => ['ProdutoController@update',$produto->id], 'method' => 'PUT'])!!}

                    <div class="form-group">
                        {!! Form::label(__('Tipo:')) !!}
                        {!! Form::text("tipo", $produto->tipo,["class"=>"form-control","required"=>"required"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Modelo:')) !!}
                        {!! Form::text("modelo", $produto->modelo,["class"=>"form-control","required"=>"required"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Marca:')) !!}
                        {!! Form::text("marca", $produto->marca,["class"=>"form-control","required"=>"required"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Preço de Venda (R$):')) !!}
                        {!! Form::number("precoVenda", $produto->precoVenda,["id" => "precoVenda", "class"=>"form-control mmss","required"=>"required"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Cor:')) !!}
                        {!! Form::text("cor", $produto->cor,["class"=>"form-control","required"=>"required"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Peso (kg):')) !!}
                        {!! Form::number("peso", $produto->peso,["id" => "peso", "class"=>"form-control mmss","required"=>"required"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Descrição:')) !!}
                        {!! Form::textarea("descricao", $produto->descricao,["class"=>"form-control","required"=>"required"]) !!}
                    </div>

                    <div class="well well-sm clearfix">
                        <button class="btn btn-outline-success pull-right" title="@lang('Salvar')"
                            type="submit">@lang('Atualizar')</button>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script language='JavaScript'>
    $(".mmss").focusout(function () {
        var id = $(this).attr('id');
        var vall = $(this).val();
        var regex = /[^0-9]/gm;
        const result = vall.replace(regex, ``);
        $('#' + id).val(result);
    });
</script>
@endpush