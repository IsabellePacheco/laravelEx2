<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Lista de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

        h1 {
            color: var(--cor-1);
        }

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
    <div class="col-md-8">

        <h1 class="mb-4 text-center">Lista de Tarefas</h1>

        <!-- Formulário -->
        <form action="{{ route('tasks.store') }}" method="POST" class="input-group mb-4">
            @csrf
            <input type="text" name="title" class="form-control border-2" placeholder="Nova tarefa" required>
            <button type="submit" class="btn btn-custom">Adicionar</button>
        </form>

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

        <!-- Tabela de Tarefas -->
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-striped table-hover mb-0 align-middle text-center">
                    <thead class="table-danger">
                        <tr>
                            <th style="width:60%">Tarefa</th>
                            <th style="width:40%">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tasks as $task)
                        <tr>
                            <!-- Nome da Tarefa -->
                            <td>
                                <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn  p-0 text-black">
                                        <span class="{{ $task->completed ? 'text-decoration-line-through text-muted' : '' }}">
                                            {{ $task->title }}
                                        </span>
                                    </button>
                                </form>
                            </td>

                            <!-- Ações -->
                            <td>
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-custom">Editar</a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-custom">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-muted">Nenhuma tarefa cadastrada.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
