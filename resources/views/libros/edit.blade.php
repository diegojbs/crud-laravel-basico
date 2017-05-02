@extends('layouts.master')

@section('title','Editar libro' . $libro->name)

@section('content')

<ol class="breadcrumb">
     <li><a href="{{url('dashboard')}}">Escritorio</a></li>
     <li><a href="{{url('libro')}}"> Libros</a></li>
     <li class="active">Editar libro</li>
   </ol>
 

   <div class="row">
     <div class="col-md-8">

        <div class="panel panel-default">
          <div class="panel-heading">
             Editar Libro: {{$libro->name}}
           </div>
          <div class="panel-body">


            {!!Form::open(['route'=>['libro.update',$libro],'method'=>'PUT'])!!}
            
	      <div class="form-group">
              {!!form::label('Nombre')!!}
              {!!form::text('name',$libro->name,['id'=>'name','class'=>'form-control','placeholder'=>'Digite nombre'])!!}
         </div>

         <div class="form-group">
              {!!form::label('Nombre')!!}
              {!!form::number('price',$libro->prize,['id'=>'name','class'=>'form-control','placeholder'=>'Digite valor'])!!}
         </div>

         <div class="form-group">
              {!!form::label('Categoria')!!}
              {!!form::select('categoria_id', $categorias, $libro->categoria->id,['class' => 'form-control selector', 'required'])!!}
         </div>

         <div class="form-group">
              {!!form::label('Autor')!!}
              {!!form::select('autor_id', $autores, $libro->autor->id,['class' => 'form-control selector', 'required'])!!}
         </div>
             

                

             </div>
                 {!!form::submit('Grabar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Grabar</span>','class'=>'btn btn-warning btn-sm m-t-10'])!!}
              <button type="button" id='cancelar'  name='cancelar' class="btn btn-info btn-sm m-t-10" >Cancelar</button>             
          {!!Form::close()!!}




           </div>
        </div>


     </div>
   </div>

<script>
  $("#cancelar").click(function(event)
  {
      document.location.href = "{{ route('libro.index')}}";
  });

</script>
  

@endsection


@section('js')
<script>
    $(".selector").chosen({
      // disable_search_threshold: 10,
      search_contains: true,
      no_results_text: 'No hay resultados',
      placeholder_text_single: 'Seleccion una opcion'
    });
  </script>
@endsection

