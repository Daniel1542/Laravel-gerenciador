@extends('layouts.maindashboard')
@section('title','Editar')
@section('content')

<section class='secao_acoes'>
  <div class="container" id="cima">
    <div class="row justify-content-center">
      <div class="col-md-6 text-center">
          <h1 class="mt-4">Editar</h1>
      </div>
    </div>
    <!-- Formulário de Edição -->
    <div class="container" id="caixa">
      <form action="{{ route('ativos.update', $ativos->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PUT')
        <div class="form-group">
          <label for="tipo">Tipo de ativo:</label>
          <select id="tipo" name="tipo" required>
            <option value="fundo imobiliario" {{ $ativos->tipo == 'fundo imobiliario' ? 'selected' : '' }}>Fundo Imobiliário</option>
            <option value="acao" {{ $ativos->tipo == 'acao' ? 'selected' : '' }}>Ação</option>
          </select>
        </div>
        <div class="form-group">
          <label for="movimento">Tipo de Operação:</label>
          <select id="movimento" name="movimento" value="{{ $ativos->movimento }}" required>
            <option value="compra" {{ $ativos->movimento == 'compra' ? 'selected' : '' }}>Compra</option>
            <option value="venda" {{ $ativos->movimento == 'venda' ? 'selected' : '' }}>Venda</option>
          </select>
        </div>
        <div class="form-group">
          <label for="nome">Ativo:</label>
          <input type="text" id="nome" name="nome"  value="{{ $ativos->nome }}" oninput="this.value = this.value.toUpperCase()" required>
        </div>
        <div class="form-group">
          <label for="data">Data:</label>
          <input type="date" id="data" name="data" value="{{ $ativos->data }}" required>
        </div>
        <div class="form-group"> 
          <label for="corretagem">Corretagem:</label>
          <input type="number" id="corretagem" name="corretagem" value="{{ $ativos->corretagem }}" required>
        </div>
        <div class="form-group"> 
          <label for="quantidade">Quantidade:</label>
          <input type="number" id="quantidade" name="quantidade" value="{{ $ativos->quantidade }}" required>
        </div>
        <div class="form-group">
          <label for="valor">Valor:</label>
          <input type="number" step="0.01" id="valor" name="valor" value="{{ $ativos->valor }}" required>
        </div>
        <div class="form-group mt-2">
          <button type="submit" class="btn btn-primary">Editar</button>
        </div>  
      </form>
    </div>   
  </div>
</section>

@endsection