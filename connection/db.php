<?php
//Parametros de conexiónde la base de datos 
$HOST = "sql8.freesqldatabase.com";
$DDBB_USER = "sql8526837";
$DDBB_PASSWORD = "NFI4CSexF7";
$DDBB_HOST = "sql8526837";

try {

  //Inicializamos las variables
  $nombre = $_GET ? $_GET['nombre'] : "";
  $codigoPostal = $_GET ? $_GET['codigoPostal'] : "";
  $twoCaractersCode = $codigoPostal ?  $codigoPostal[0] . $codigoPostal[1]: '02';

  // Leermos el archivo JSON con todo su contenido 
  $data = file_get_contents("./municipios.json");
  $resultsJSON = json_decode($data, true);


  // PDO representa la conexión con la base de datos de mysql
  $connection = new PDO("mysql:host=$HOST;dbname=$DDBB_HOST", $DDBB_USER, $DDBB_PASSWORD);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Establece un atributo
  $sql = "SELECT `codigo_postal`, `municipio_id`, `municipio_nombre` FROM `PostalCode` WHERE codigo_postal = ?"; //Sentencia para leer too
  $sentence = $connection->prepare($sql); // La ejecutamos con prepare y la guardamos en una variable
  $sentence->execute(array($codigoPostal)); // Ejecuta la sentencia podemos agregar un array
  $result = $sentence->fetchAll(PDO::FETCH_ASSOC); // Devuelve todo el resultado de la sentencia 
  // PDO::FETCH_ASSOC --- Asocia el nombre de los campos con el de la sentencia SQL



  // Sacamos la informacion por pantalla
  foreach ($result as $R) {
    //Sacamos el provincia_id del JSON
    foreach ($resultsJSON as $r) {
      if ($r['provincia_id'] == $twoCaractersCode) {
        echo "
              <br>
              <h1>
              $nombre tu eres de {$R['municipio_nombre']},
              provincia de {$r['nombre']}
              </h1>";
      }
    }
  }

} catch (PDOException $err) {
  echo "Connection failed. $err";
}

?>

<!DOCTYPE html>
<head>
  <title>Result</title>
  <style>
    .nombre{color:red;}
  </style>
</head>
</html>
