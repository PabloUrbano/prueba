<!DOCTYPE html>
<html lang="es">  
  <head>    
    <title>Instalar</title>    
    <meta charset="UTF-8">
  </head>  

  <body>
      <form action="app/install.php" method="post">
        <input class="textos" type="text" name="NombreBD" placeholder="Nombre de la base de datos" required /><br>
        <input class="textos" type="text" name="UsuarioBD" placeholder="Usuario de la base de datos" required /><br>
        <input class="textos" type="password" name="PassBD" placeholder="Contraseña de la base de datos" required /><br>
        <input type="submit" value="Instalar" />
      </form>

  </body>

</html>