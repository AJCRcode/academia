<div>
    <h1>Resultados para {{ $materia->nombre }}</h1>

    <p>Has respondido {{ $correctAnswers }} de {{ $totalQuestions }} preguntas correctamente.</p>

    <table class="table">
        <thead>
        <tr>
            <th>Pregunta</th>
            <th>Tu Respuesta</th>
            <th>Respuesta Correcta</th>
            <th>Resultado</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($answers as $answer)
            <tr>
                <td>{{ $answer->question->titulo }}</td>
                <td>{{ $answer->answer }}</td>
                <td>{{ $answer->question->respuesta_correcta }}</td>
                <td>
                    @if ($answer->answer == $answer->question->respuesta_correcta)
                        <span class="text-success">Correcto</span>
                    @else
                        <span class="text-danger">Incorrecto</span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
