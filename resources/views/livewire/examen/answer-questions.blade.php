<div>
    <h1>Responde las preguntas de {{ $materia->nombre }}</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submitAnswers">
        @foreach ($questions as $question)
            <div class="mb-3">
                <h5>{{ $question->titulo }}</h5>
                <p>{{ $question->descripcion }}</p>

                @if ($question->tipo == 'radio')
                    @foreach (range(0, 4) as $i)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" wire:model="answers.{{ $question->id }}" value="{{ chr(65 + $i) }}">
                            <label class="form-check-label">
                                {{ $question->opciones[$i] ?? 'Opción ' . chr(65 + $i) }}
                            </label>
                        </div>
                    @endforeach
                @elseif ($question->tipo == 'checkbox')
                    @foreach (range(0, 4) as $i)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" wire:model="answers.{{ $question->id }}[]" value="{{ chr(65 + $i) }}">
                            <label class="form-check-label">
                                {{ $question->opciones[$i] ?? 'Opción ' . chr(65 + $i) }}
                            </label>
                        </div>
                    @endforeach
                @endif
            </div>
        @endforeach

        <button type="submit" class="btn btn-success">Enviar Respuestas</button>
    </form>
</div>
