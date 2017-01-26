@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Stickies
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($stickies, ['route' => ['stickies.update', $stickies->id], 'method' => 'patch']) !!}

                        @include('stickies.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection