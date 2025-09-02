<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Producto</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Crear Producto</h1>

        <form action="{{ route('productos.store') }}" method="POST">
            @csrf
            <label>Nombre:</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}">

            <label>Descripción:</label>
            <textarea name="descripcion">{{ old('descripcion') }}</textarea>

            <label>Precio:</label>
            <input type="number" step="0.01" name="precio" value="{{ old('precio') }}">

            <button type="submit">Guardar</button>
        </form>

        <a href="{{ route('productos.index') }}">⬅️ Volver</a>
    </div>
</body>
</html>
