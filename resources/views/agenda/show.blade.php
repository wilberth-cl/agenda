@extends('plantilla.plantilla')

@section ('titulo','Visualizando | Registro')

@section('contenido')
	
   
<div class="container">
     <br>

@include('agenda.navuser')

<nav aria-label="breadcrumb">
 <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item "><a href="{{ route('agenda.index') }}">Inicio</a></li>
    <li class="breadcrumb-item ">Mostrando registro</li>
    <li class="breadcrumb-item active" aria-current="page">{{$Agenda->id}}</li>
  </ol>
</nav>
</nav>
</div>

<form method="POST" action="{{ route('agenda.update', $Agenda->id) }}" >
@method('PUT')
@csrf
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="http://www.idaipqroo.org.mx/wp-content/uploads/2018/06/proteccion-de-datos-personales-791x1024.png" alt=""/>
                        <h3>Bienvenid@</h3>
                        <p>Por favor llena los datos correctamente en el sistema!</p>
                        
                    </div>
                    <div class="col-md-9 register-right">
                 
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                
                                <h3 class="register-heading">Visualizando Registro</h3>
                                                            
                                <div class="row register-form">

                                    <div class="col-md-6">                                        

                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                                </div>
                                            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" required="" value="{{ $Agenda->nombres }}" disabled="true">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-user-edit text-info"></i></div>
                                                </div>
                                            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required="" value="{{ $Agenda->apellidos }}" disabled="true">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-phone text-info"></i></div>
                                                </div>
                                            <input class="form-control" type="number" name="telefono" placeholder="Telefono: 18491115555" id="telefono" value="{{ $Agenda->telefono }}" disabled="true">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-mobile-alt text-info"></i></div>
                                                </div>
                                            <input class="form-control" type="number" name="celular" placeholder="Celular: 18491115555" id="Celular" value="{{ $Agenda->celular }}" disabled="true">
                                            </div>
                                        </div>

                                        @if ($Agenda->genero=='Masculino')
                                            @php ($Masculino = 'checked') 
                                            @php ($Femenino = '')  
                                        @else
                                            @php ($Masculino = '') 
                                            @php ($Femenino = 'checked') 
                                        @endif
                                    
                                     
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="genero" value="Masculino" {{ $Masculino }} disabled="true">
                                                    <span> Masculino </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="genero" value="Femenino" {{ $Femenino }} disabled="true">
                                                    <span>Femenino </span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                         <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa  fa-at text-info"></i></div>
                                                </div>
                                             <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $Agenda->email }}" disabled="true" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-address-card text-info"></i></div>
                                                </div>
                                             <input type="text" name="posicion" class="form-control" placeholder="Posición" value="{{ $Agenda->posicion }}" disabled="true" />
                                            </div>
                                        </div>


                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-map-marker-alt text-info"></i></div>
                                                </div>

                                            @php($departamentos=['Gerencia de TI','Auditoria TI','Contabilidad'])

                                             <select name="departamento" class="form-control" disabled="true">
                                                <option class="hidden" disabled>Departamento</option>
                                                @foreach ($departamentos as $dep)
                                                <option 
                                                @if(($Agenda->departamento)==($dep))
                                                    selected                        
                                                @endif
                                                 >{{$dep}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa  fa-dollar-sign text-info"></i></div>
                                                </div>
                                              <input type="number" class="form-control" name="salario" placeholder="salario *" value="{{ $Agenda->salario }}" disabled="true"/>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label >Fecha de nacimiento</label>
                                           <div class="input-group">
                                                <div class="input-group-prepend">                                                    
                                                    <div class="input-group-text"><i class="fa fa-calendar-alt text-info"></i></div>
                                                </div>
                                                
                                                <input type="date" name="fechadenacimiento" id="fechadenacimiento" min="1000-01-01"
                                                  max="3000-12-31" class="form-control" value="{{ $Agenda->fechanacimiento }}" disabled="true">                                                   
                                            </div>
                                        </div>

                                    <a href="{{ route('agenda.edit', $Agenda->id ) }}" class="btn btn-success redondo btncolorblanco">
                                                        <i class="fa fa-edit"></i> Editar 
                                                      </a>

                                    <a href="{{ route('cancelar') }}" class="redondo btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
                                    </div>
                                </div>
                            </div>
                       
                        </div>
                    </div>
                </div>

            </div>
</form>


@include('plantilla.footer',['container'=>'container'])

@endsection 