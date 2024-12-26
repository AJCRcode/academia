<div>
    <h1>Preguntas para: {{ $materia->nombre }}</h1>
    {{--    <a href="{{ route('materia.questions.create', $materia->id) }}" class="btn btn-primary mb-3">Nueva Pregunta</a>--}}

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Título</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($questions as $question)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $question->titulo }}</td>
                <td>{{ ucfirst($question->tipo) }}</td>
                <td>
                    {{--                    <a href="{{ route('materia.questions.edit', [$materia->id, $question->id]) }}" class="btn btn-warning btn-sm">Editar</a>--}}
                    <button wire:click="deleteQuestion({{ $question->id }})" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
