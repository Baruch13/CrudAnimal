<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crud</title>
</head>
<body>
  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
   
 <div>
     <div class="">
                                 <!-- Button trigger modal -->
             <button style="position: relative; margin: 15px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
             Ingresar nuevo animal
             </button>
                    <button class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Cerrar Sesion') }}
              </button>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
              <form method="get" action="{{url('dashboard')}}">
                            <input type="text" class="form-control" placeholder="Busca aqui..." style="width: 600px; float:left;" name="texto" aria-label="Username" aria-describedby="basic-addon1">
                            <button style="float: right; position: relative; left: -690px;" class="btn btn-primary" type="submit">Buscar</button>
                        </form>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Nuevo Animal</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form method="POST" action="{{url('dashboard')}}" >
 @csrf
<input type="text" placeholder="Nombre" class="input-group" name="nombre">
<select name="tipo" id="">
 <option value="Escotera">Escotera</option>
 <option value="Parida">Parida</option>
 <option value="Novilla">Novilla</option>
 <option value="Escotera">Escotera</option>
 <option value="Ternero">Ternero</option>
</select>
<input type="date" name="dateregister" id="">
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>
     </div>
     <table class="table table-striped table-inverse table-responsive">
         <thead class="thead-inverse">
             <tr>
                 <th>#</th>
                 <th>Nombre</th>
                 <th>Tipo</th>
                 <th>Fecha de registro</th>
             </tr>
             </thead>
             @foreach($ganado as $Ganado)
             <tbody>
                 <tr>
                     <td scope="row">{{$Ganado->id}}</td>
                     <td>{{$Ganado->nombre}}</td>
                     <td>{{$Ganado->tipo}}</td>
                     <td>{{$Ganado->dateregister}}</td>
                     <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editCategoria{{$Ganado->id}}">
                         Editar
                         </button>
                       </td>
                     <td>
                     <form action="{{url('dashboard',$Ganado->id)}}" method="post">
                       @csrf
                       {{ method_field('DELETE') }}
                       <button onclick="return confirm('¿Seguro Que quieres borrar este registro?')" class="btn btn-danger">Borrar</button>
                     </form>
                     </td>
                   
                 </tr>
             </tbody>
             
     <!-- Modal -->
     <div class="modal fade" id="editCategoria{{$Ganado->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Editar Ganado</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             <form action="{{url('dashboard',$Ganado->id)}}" method="post">
               @csrf
               @method('PUT')
               <input type="text" value="{{$Ganado->nombre}}" class="form-control" name="nombre" id="recipient-name">
               <select name="tipo" id="" value="{{$Ganado->tipo}}">
               <option>Escotera</option>
               <option >Parida</option>
               <option>Novilla</option>
               <option>Escotera</option>
               <option>Ternero</option>
           </select>
               <br>
               <input type="submit" class="btn btn-success" value="Guardar">
             </form>
           </div>
           <div class="modal-footer">

           </div>
         </div>
       </div>
     </div>
              @endforeach
     </table>
 </div>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>