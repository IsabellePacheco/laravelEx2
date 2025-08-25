<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Lista de Tarefas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Paleta de cores */
        :root {
            --cor-1: #CC4852;
            --cor-2: #E5515C;
            --cor-3: #FF585D;
            --cor-4: #FF737D;
            --cor-5: #FF8D95;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: var(--cor-5);
            color: #2a2a2a;
        }

        /* Cabeçalho */
        h1 {
            color: var(--cor-1);
            margin-bottom: 30px;
        }

        /* Formulário de nova tarefa */
        .task-form input[type="text"] {
            border: 2px solid var(--cor-2);
            border-radius: 5px 0 0 5px;
            padding: 10px;
            width: 70%;
            max-width: 400px;
            color: #333;
        }

        .task-form button {
            background-color: var(--cor-3);
            border: 2px solid var(--cor-3);
            color: white;
            border-radius: 0 5px 5px 0;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }

        .task-form button:hover {
            background-color: var(--cor-4);
            border-color: var(--cor-4);
        }

        /* Lista de tarefas */
        ul {
            list-style: none;
            padding-left: 0;
            max-width: 600px;
        }

        ul li {
            background: white;
            margin-bottom: 10px;
            padding: 12px 15px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        /* Título da tarefa */
        ul li span.completed {
            text-decoration: line-through;
            color: gray;
        }

        /* Botões dentro da lista */
        ul li form button {
            border: none;
            background: none;
            cursor: pointer;
            font-size: 1.2rem;
            padding: 5px 10px;
            color: var(--cor-1);
            transition: color 0.3s;
        }

        ul li form button:hover {
            color: var(--cor-3);
        }

        /* Link de editar */
        ul li a {
            margin-left: 10px;
            color: var(--cor-2);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        ul li a:hover {
            color: var(--cor-4);
            text-decoration: underline;
        }

        /* Mensagens de erro */
        .alert-danger {
            background-color: var(--cor-1);
            color: white;
            padding: 15px;
            border-radius: 8px;
            max-width: 600px;
            margin-bottom: 20px;
        }

    </style>
</head>
<body class="container">

    <h1>Lista de Tarefas</h1>

    <!-- Formulário para adicionar nova tarefa -->
    <form action="{{ route('tasks.store') }}" method="POST" class="task-form d-flex mb-4">
        @csrf
        <input type="text" name="title" placeholder="Nova tarefa" required />
        <button type="submit">Adicionar</button>
    </form>

    <!-- Exibe erros de validação -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Lista de tarefas -->
    <ul>
        @foreach ($tasks as $task)
            <li>
                <!-- Botão para alternar status concluído -->
                <form action="{{ route('tasks.toggle', $task) }}" method="POST" style="display:inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" style="border:none; background:none; cursor:pointer;">
                        <span class="{{ $task->completed ? 'completed' : '' }}">{{ $task->title }}</span>
                    </button>
                </form>

                <!-- Botão para apagar tarefa -->
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="color:red; cursor:pointer;">[x]</button>
                </form>
               
                <a href="{{ route('tasks.edit', $task) }}">Editar</a>

            </li>
        @endforeach
    </ul>

    <!-- Bootstrap JS Bundle (opcional, para componentes Bootstrap que usam JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
