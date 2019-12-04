@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">               
                <h4 class="col-md-6">{{$titlePage}}</h4>                  

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div>
                        <ul>
                            @foreach ($diagnostics as $diagnostic)
                                <li>
                                    <a>
                                        {{$diagnostic->diagnostico}}
                                    </a>
                                </li>    
                            @endforeach
                        </ul>
                    </div>                                       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection