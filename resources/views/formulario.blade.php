<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password Generator</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <div class="container">
    <h1><strong>Password Generator</strong></h1>
    <form action="{{ route('password.generate') }}" method="POST">
      @csrf
 
      <label>Longitud de la contraseña:</label>
      <input type="number" name="length" min="4" max="64" required>
      <label>Tipo de caracteres:</label>
      <select name="type" required>
        <option value="" disabled selected>Seleccione un tipo</option>
        <option value="letters">Solo letras</option>
        <option value="numbers">Solo números</option>
        <option value="alphanumeric">Letras y números</option>
      </select>
      <button type="submit">Generar</button>
    </form>
    @session('password')
      <h2>Contraseña Generada:</h2>
      <p><strong id="generatedPassword">{{session ('password') }}</strong></p>
      <button class="copy-btn" onclick="copyPassword()">Copiar</button>
    @endsession
  </div>
  <script>
    function copyPassword() {
      const password = document.getElementById('generatedPassword').innerText;
      navigator.clipboard.writeText(password).then(function() {
        alert('Contraseña copiada al portapapeles');
      }).catch(function(err) {
        alert('Error al copiar la contraseña: ' + err);
      });
    }
  </script>
</body>
</html>
