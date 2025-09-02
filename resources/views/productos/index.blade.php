<!DOCTYPE html>
<html>
<head>
    <title>Productos</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            padding: 32px;
        }
        h1 {
            margin-top: 0;
            color: #333;
            font-size: 2rem;
            letter-spacing: 1px;
        }
        .nuevo-btn {
            display: inline-block;
            margin-bottom: 18px;
            padding: 10px 18px;
            background: #2d8cf0;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1rem;
            transition: background 0.2s;
        }
        .nuevo-btn:hover {
            background: #1766c3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fafbfc;
            border-radius: 6px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 10px;
            text-align: left;
        }
        th {
            background: #e9ecef;
            color: #444;
            font-weight: 600;
        }
        tr {
            border-bottom: 1px solid #e3e3e3;
        }
        tr:last-child {
            border-bottom: none;
        }
        td {
            color: #555;
        }
        .acciones a, .acciones button {
            margin-right: 8px;
            padding: 6px 12px;
            border-radius: 4px;
            border: none;
            font-size: 0.95rem;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s;
        }
        .acciones a {
            background: #f0f4fa;
            color: #2d8cf0;
            border: 1px solid #dbeafe;
        }
        .acciones a:hover {
            background: #e0e7ff;
        }
        .acciones .edit-btn {
            color: #f59e42;
            border-color: #fdebd0;
        }
        .acciones .edit-btn:hover {
            background: #fff7e6;
        }
        .acciones .delete-btn {
            background: #ffe5e5;
            color: #e53e3e;
            border: 1px solid #fecaca;
        }
        .acciones .delete-btn:hover {
            background: #ffd6d6;
        }
        @media (max-width: 600px) {
            .container {
                padding: 10px;
            }
            table, th, td {
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Productos</h1>

        <a href="{{ route('productos.create') }}" class="nuevo-btn">➕ Nuevo Producto</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>${{ $producto->precio }}</td>
                        <td class="acciones">
                            <a href="{{ route('productos.show', $producto) }}">👁️ Ver</a>
                            <a href="{{ route('productos.edit', $producto) }}" class="edit-btn">✏️ Editar</a>
                            <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('¿Seguro que deseas eliminar este producto?')">🗑️ Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No hay productos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
