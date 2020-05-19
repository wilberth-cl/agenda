@extends('plantilla.plantilla')

@section('titulo','Confirmar Eliminación')

@section('contenido')

<div class="container text-center p-5">
	
	<h1> ¿Desea eliminar el registro para: {{$Agenda->nombres}}? </h1>
	<form method="POST" action="{{route('agenda.destroy', $Agenda->id)}}">
		@method('DELETE')
		@csrf
		<button type="submit" class="rounded-bottom btn btn-danger">
			<i class="fas fa-trash-alt"> Eliminar</i>
		</button>
		<a class="rounded-bottom btn btn-dark" href="{{ route('cancelar') }}">
			<i class="fas fa-ban"> Cancelar</i>
		</a>
	</form>

</div>