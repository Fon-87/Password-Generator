

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Contraseñas</title>
    <style>
        body {
          font-family: Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;     /* centra horizontalmente */
            background-color: #012039eb;
            padding-top: 60px;       /* empuja el título y formulario hacia arriba */

            /* Fondo con imagen */
        background-image: url('{{ asset('images/fondo-password.jpeg') }}');
        background-size: cover;       /* hace que la imagen cubra toda la pantalla */
        background-position: center;  /* centra la imagen */
        background-repeat: no-repeat; /* evita que se repita */


        }

        h1 {
            color: #fff;
            margin-bottom: 20px;
        }

        
        h2 {
            color: #fff;
            margin-bottom: 20px;
        }

        p{

            color: #fff;
            font-size: 1.2em;
        }


        form {
            background: #0c0b0bff;
            padding: 20px;
            border-radius: 8px;
            width: 40%;
            min-height: 250px;
            max-width: 600px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #fff;
        }
        input, select, button {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #0078d7;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background-color: #005fa3;
        }
    </style>
</head>
<body>
    <h1>Generador de Contraseñas</h1>
    <form action="{{ route('password.generate') }}" method="POST">
        @csrf
        <label>Longitud:</label>
        <input type="number" name="length" min="4" max="64" required>

        <label>Tipo de caracteres:</label>
        <select name="type" required>
            <option value="letters">Solo letras</option>
            <option value="numbers">Solo números</option>
            <option value="alphanumeric">Letras y números</option>
        </select>
        <button type="submit">Generar</button>
    </form>
     @isset($password)
            <h2>Contraseña Generada:</h2>
            <p><strong>{{ $password }}</strong></p>
    @endisset
</body>
</html>