@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{$titlePage}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form method="post" action="{{ route('diagnostics.store') }}">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nome</label>
                          <input name="nome" type="text" class="form-control" id="inputTitle" placeholder="Insira aqui o nome">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Peso</label>
                            <input name="peso" type="text" class="form-control" id="inputTitle" placeholder="Insira aqui o peso">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Altura</label>
                            <input name="altura" type="text" class="form-control" id="inputTitle" placeholder="Insira aqui a altura">
                        </div>
                                              
                        <button type="submit" class="btn btn-primary">Calcular</button>
                    </form>                                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection