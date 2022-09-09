@extends('base')
@section('content')

    <h1>Lista de Empleados</h1>
    <a href="{{ route('create') }}" class="btn btn-primary float-right"><i class="fas fa-user-plus"></i> Crear</a>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
        <tr>
            <th><i class="fas fa-user"></i> Nombre</th>
            <th><i class="fas fa-at"></i> Email</th>
            <th><i class="fas fa-venus-mars"></i> Sexo</th>
            <th><i class="fas fa-briefcase"></i> Área</th>
            <th><i class="fas fa-envelope"></i> Boletín</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($empleados as $empleado)
            <tr>
                <td>{{$empleado->nombre}}</td>
                <td>{{$empleado->email}}</td>
                <td>{{$empleado->sexo == 'M'?"Masculino":"Femenino"}}</td>
                <td>{{ \App\Areas::find($empleado->areas_id)->nombre }}</td>
                <td>{{ $empleado->boletin?"Sí":"No" }}</td>
                <td class="text-center"><a href="{{ route('edit', $empleado->id)}}"><i class="fas fa-edit"></i></a></td>
                <td class="text-center">
                    <form action="{{ route('destroy', $empleado->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
