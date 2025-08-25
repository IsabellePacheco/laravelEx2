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
            color: #2a2a2a;
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        h1 {
            color: var(--cor-1);
            margin-bottom: 30px;
        }

        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;
        }

        label {
            font-weight: 600;
            color: var(--cor-2);
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 2px solid var(--cor-3);
            border-radius: 5px;
            margin: 10px 0 20px 0;
        }

        button[type="submit"] {
            background-color: var(--cor-3);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: var(--cor-4);
        }

        a {
            display: inline-block;
            margin-top: 15px;
            color: var(--cor-1);
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: var(--cor-3);
            text-decoration: underline;
        }

        .alert-danger {
            background-color: var(--cor-1);
            color: white;
            padding: 15px;
            border-radius: 8px;
            max-width: 400px;
            margin-bottom: 20px;
        }

    </style>
</head>
<body class="container">

    <h1>Editar Tarefa</h1>

    <!-- Exibe erros -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulário de edição -->
    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Título:</label>
        <input type="text" name="title" value="{{ $task->title }}" required>
        <button type="submit">Salvar</button>
    </form>

    <p><a href="{{ route('tasks.index') }}">← Voltar para lista</a></p>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
