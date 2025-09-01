<!DOCTYPE html>
<html>
<head>
    <title>Detalle del Producto</title>
</head>
<body>
    <h1>Producto: {{ $producto->nombre }}</h1>

    <p><strong>ID:</strong> {{ $producto->id }}</p>
    <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
    <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
    <p><strong>Precio:</strong> ${{ $producto->precio }}</p>

    <a href="{{ route('productos.edit', $producto) }}">✏️ Editar</a>
    <a href="{{ route('productos.index') }}">⬅️ Volver</a>
</body>
</html>
