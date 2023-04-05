<link href="/css/formhuesped.css" rel="stylesheet">

<form action="enviar_datos.php" method="post">
  <h2>Datos del huésped</h2>
  <label for="nombre">Nombre:</label>
  <input type="text" id="nombre" name="nombre" required>
  
  <label for="apellidos">Apellidos:</label>
  <input type="text" id="apellidos" name="apellidos" required>
  
  <label for="email">Correo electrónico:</label>
  <input type="email" id="email" name="email" required>
  
  <label for="telefono">Teléfono:</label>
  <input type="tel" id="telefono" name="telefono" required>
  
  <label for="fecha-llegada">Fecha de llegada:</label>
  <input type="date" id="fecha-llegada" name="fecha-llegada" required>
  
  <label for="fecha-salida">Fecha de salida:</label>
  <input type="date" id="fecha-salida" name="fecha-salida" required>
  
  <label for="num-personas">Número de personas:</label>
  <input type="number" id="num-personas" name="num-personas" min="1" required>
  
  <input type="submit" value="Enviar">
</form>
