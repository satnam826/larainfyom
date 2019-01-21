@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Post Author
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($postAuthor, ['route' => ['postAuthors.update', $postAuthor->id], 'method' => 'patch']) !!}

                        @include('post_authors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection