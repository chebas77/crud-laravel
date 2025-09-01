<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Producto</title>
</head>
<body>
    <h1>Crear Producto</h1>

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="{{ old('nombre') }}"><br><br>

        <label>Descripción:</label><br>
        <textarea name="descripcion">{{ old('descripcion') }}</textarea><br><br>

        <label>Precio:</label><br>
        <input type="number" step="0.01" name="precio" value="{{ old('precio') }}"><br><br>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('productos.index') }}">⬅️ Volver</a>
</body>
</html>
