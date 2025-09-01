<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>

    <form action="{{ route('productos.update', $producto) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}"><br><br>

        <label>Descripción:</label><br>
        <textarea name="descripcion">{{ old('descripcion', $producto->descripcion) }}</textarea><br><br>

        <label>Precio:</label><br>
        <input type="number" step="0.01" name="precio" value="{{ old('precio', $producto->precio) }}"><br><br>

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('productos.index') }}">⬅️ Volver</a>
</body>
</html>
