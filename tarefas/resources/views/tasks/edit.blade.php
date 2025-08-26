<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Editar Tarefa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        :root {
            --cor-1: #CC4852;
            --cor-2: #E5515C;
            --cor-3: #FF585D;
            --cor-4: #FF737D;
            --cor-5: #FF8D95;
        }

        body {
            background: var(--cor-5);
            font-family: Arial, sans-serif;
        }

        h1 { color: var(--cor-1); }

        .btn-custom {
            background-color: #CC4852;
            border: none;
            color: #fff;
        }
        .btn-custom:hover { background-color: #E5515C; }
        .alert-danger {
            background-color: var(--cor-1);
            color: #fff;
            border: none;
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-6">

        <h1 class="mb-4 text-center">Editar Tarefa</h1>

        <!-- Erros -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulário -->
        <div class="card shadow-sm p-4">
            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label fw-bold text-danger">Título</label>
                    <input type="text" name="title" id="title" class="form-control border-2" value="{{ $task->title }}" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('tasks.index') }}" class="btn btn-custom">← Voltar</a>
                    <button type="submit" class="btn btn-custom">Salvar</button>
                </div>
            </form>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

