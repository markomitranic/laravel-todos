@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Todos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($todos, ['route' => ['todos.update', $todos->id], 'method' => 'patch']) !!}

                        @include('todos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection