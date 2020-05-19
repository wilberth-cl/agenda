@extends('plantilla.plantilla')
@section('titulo','agenda')

@section('contenido')


<div class="container-fluid registerinicio">
                <div class="row">
                    <div class="col-md-6 register-left register-left1">
                        <img src="{{ asset('images/agendados.png') }}" alt=""/>
                    </div>    
                    <div class="col-md-6 register-left">
                        
                        <h3>Bienvenid@</h3>
                        <p>Por favor llena los datos correctamente en el sistema!</p>
                        
                    </div>    
                </div>
</div>

<br>

<div class="container-fluid ">

  @if( SESSION('guardando') )
      
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ SESSION('guardando') }}
          <button type="button" class="close" data-dismiss="alert" area-label="Close" >
            <span aria-hidden="true">&times;</span>
          </button>
      </div>

  @endif
  @if( SESSION('cancelando') )
      
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ SESSION('cancelando') }}
          <button type="button" class="close" data-dismiss="alert" area-label="Close" >
            <span aria-hidden="true">&times;</span>
          </button>
      </div>

  @endif


 <br>

@include('agenda.navuser')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active"><a href="{{ route('agenda.index') }}">Inicio</a></li>
  </ol>
</nav>

<nav class="navbar navbar-light float-right">
  <form class="form-inline">

    <label class="my-2 mr-2" for="inlineFormCustomSelectPref">Buscar por:</label>
      <select name="tipo" class="form-control my-2 mr-sm-2" id="inlineFormCustomSelectPref" required>
        <option selected>Seleccione...</option>
        <option value="nombres">Nombres</option>
        <option value="apellidos">Apellidos</option>
        <option value="telefono">Telefono</option>
        <option value="celular">Celular</option>
        <option value="email">Email</option>
      </select>

        <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="escriba aquí..." aria-label="Search" >

         <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
  
  </form>
</nav>

   <br>
      <h1 class="text-center">Datos personales</h1>
  <br>
<div class="row float-right">
    <a  href="{{ route('agenda.create') }}" class="btn btn-info btncolorblanco"><i class="fas fa-user-plus"></i> Agregar un nuevo Registro</a>
</div>
   <br>
    <!-- {{ $Agenda }} para ver lo que imprime-->
   <br>
<table class="table-responsive table text-center">
                                              <thead>
                                                <tr>
                                                  <th scope="col">#</th>
                                                  <th scope="col">Nombres y apellidos</th>
                                                  <th scope="col">Télefono</th>
                                                  <th scope="col">Celular</th>
                                                  <th scope="col">Género</th>
                                                  <th scope="col">Email</th>
                                                  <th scope="col">Posición</th>
                                                  <th scope="col">Departamento</th>
                                                  <th scope="col">Salario</th>
                                                  <th scope="col">Fecha de nacimiento</th>
                                                  <th scope="col">Acción</th>
                                              
                                                </tr>
                                              </thead>
                                              <tbody>

                                                @foreach( $Agenda as $Agendaitem )

                                                <tr>
                                                  <th scope="row">{{ $Agendaitem->id }}</th>
                                                  <td> <a href="{{ route('agenda.show',$Agendaitem->id) }}">
                                                    {{ $Agendaitem->nombres }} {{ $Agendaitem->apellidos }}
                                                  </a>
                                                  </td>
                                                  <td>{{ $Agendaitem->telefono }}</td>
                                                  <td>{{ $Agendaitem->celular}}</td>
                                                  <td>{{ $Agendaitem->genero }}</td>
                                                  <td>{{ $Agendaitem->email }}</td>
                                                  <td>{{ $Agendaitem->posicion }}</td>
                                                  <td>{{ $Agendaitem->departamento }}</td>
                                                  <td>{{ $Agendaitem->salario }}</td>
                                                  <td>{{ $Agendaitem->fechanacimiento }}</td>
                                                  <td><a href="{{ route('agenda.edit', $Agendaitem->id ) }}" class="btn btn-success btncolorblanco">
                                                        <i class="fa fa-edit"></i> Editar 
                                                      </a>

                                                      <a href="{{ route('agenda.paraconfirmar', $Agendaitem->id ) }}" class="btn btn-danger btncolorblanco">
                                                        <i class="fa fa-trash-alt"></i> Eliminar 
                                                      </a>
                                                  </td>
                                                </tr>
                                                
                                                @endforeach 

                                              </tbody>
                                            </table>

<!-- {{ $Agenda }} o {{ $Agenda->links() }} para ver paginate() -->
{{ $Agenda }}
</div>

@include('plantilla.footer',['container'=>'container-fluid']);

@endsection