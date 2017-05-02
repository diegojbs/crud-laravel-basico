@extends('layouts.master')

@section('title','Libro Nuevo')

@section('content')

<ol class="breadcrumb">
     <li><a href="{{route('libro.index')}}">Listado</a></li>
     <li class="active">Nuevo Libro</li>
   </ol>
 

   <div class="page-header">
     <h1>Libro Nuevo </h1>
   </div>

   <div class="row">
     <div class="col-md-8">

        <div class="panel panel-default">
          <div class="panel-heading">
             Nuevo Libro
           </div>
          <div class="panel-body">



            {!!Form::open(['route'=>'libro.store','method'=>'POST'])!!}
            
	      <div class="form-group">
                  {!!form::label('Nombre')!!}
                  {!!form::text('name',null,['id'=>'name','class'=>'form-control','placeholder'=>'Digite Producto'])!!}
             </div>
             <div class="form-group">
               <label for="exampleInputPassword1">Precio</label>
                  {!!form::label('Precio')!!}
                  {!!form::text('price',null,['id'=>'price','class'=>'form-control','placeholder'=>'Digite el Precio'])!!}
             </div>
             <div class="form-group">
                  {!!form::label('Categoria')!!}
                  {!!form::select('categoria_id', $categorias, null,['class' => 'form-control selector', 'required'])!!}
             </div>

             <div class="form-group">
                  {!!form::label('Autor')!!}
                  {!!form::select('autor_id', $autores, null,['class' => 'form-control selector', 'required'])!!}
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