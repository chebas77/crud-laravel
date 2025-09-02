<!DOCTYPE html>
<html>
<head>
    <title>Detalle del Producto</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /* Estilos para el contenedor principal */
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Estilos para los encabezados */
        h1, h2, h3 {
            color: #333;
        }

        /* Estilos para los enlaces */
        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Estilos para los párrafos */
        p {
            line-height: 1.6;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalle del Producto</h1>

        <p><strong>ID:</strong> {{ $producto->id }}</p>
        <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
        <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
        <p><strong>Precio:</strong> ${{ $producto->precio }}</p>

        <a href="{{ route('productos.edit', $producto) }}">✏️ Editar</a>
        <a href="{{ route('productos.index') }}">⬅️ Volver</a>
    </div>
</body>
</html>
