@extends('layouts.master')

@section('title','Lista de Productos')

@section('content')

   <!-- Main component for a primary marketing message or call to action -->

  <ol class="breadcrumb">
     <li><a href="{{url('dashboard')}}">Escritorio</a></li>
     <li class="active">Libros</li>
   </ol>
 

   <div class="page-header">
     <h1>Libros <small>Actualizados hasta hoy</small></h1>
   </div>

   <div class="row">
     <div class="col-md-120">

        <div class="panel panel-default">
          <div class="panel-heading">
             Lista
             <p class="navbar-text navbar-right" style=" margin-top: 1px;">
                <button type="button" id='nuevo'  name='nuevo' class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;">Nuevo</button>
             </p>
           </div>
          <div class="panel-body">

             <table class="table table-bordered">
               <thead>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>Categoria</th>
                  <th>Autor</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
               </thead>
               <tbody>
               @foreach($libros as $libro)
                    <tr>
                         <td>{{$libro->name}}</td>
                         <td style="text-align: right;">$ {{number_format($libro->prize, 2, ',', '.')}}</td>
                         <td>{{$libro->categoria->name_categoria}}</td>
                         <td>{{$libro->autor->name_autor}}</td>
                         <td>
                              <a href="{{route('libro.edit',$libro->id)}}">
                                <button class="btn btn-warning"><i class="fa fa-cog" aria-hidden="true"></i></button>
                              </a> 
                              <!-- <a href="{{route('libro.destroy', $libro->id)}}" onclick="return confirm('¿Seguro que deseas eliminarlo?')" style="color: red;">[Eliminar]</a> -->  
                        </td>
                        <td>
                            {{ Form::open(['method' => 'DELETE', 'route' => ['libro.destroy', $libro->id]]) }}
                                <!-- {{ Form::submit('X', ['class' => 'btn btn-danger']) }} -->
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            {{ Form::close() }}
                        </td>
                    </tr>
               @endforeach
               </tbody>


             </table>


          </div>
        </div>


     </div>
   </div>

<script>
  $("#nuevo").click(function(event)
  {
      document.location.href = "{{ route('libro.create')}}";
  });

</script>
  
@endsection
