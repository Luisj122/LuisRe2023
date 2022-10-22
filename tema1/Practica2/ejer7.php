<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>

<h1>Libreria</h1>;
<?php


$libreria = array(
  array("ISBN" => 1, "titulo" => "La lengua de los secretos", "descripcion" => "Martintxo nació en un queso: su Arrigorriaga natal estaba perforada por las minas que llevaron a tanta gente a trabajar a una tierra donde sus habitantes aún cuidaban vacas y hablaban «la lengua de los secretos»", "categoria" => "Novela Historica", "editorial" => "editoria1", "foto" => "./img/Lsecretos.jpg", "precio" => 9.95),


  array("ISBN" => 2, "titulo" => "El invierno más largo", "descripcion" => "Así como la nieve oculta la tierra, los habitantes del monte Blackåsen esconden los más temibles secretos. UN BEST SELLER INTERNACIONAL TRADUCIDO A MÁS DE 10 IDIOMAS. UN THRILLER OSCURO COMO LA NOCHE, FRÍO COMO EL HIELO, AMBIENTADO EN LA SUECIA DEL SIGLO xviii", "categoria" => "Novela Historica", "editorial" => "editoria1", "foto" => "./img/inviernoMasLargo.jpg", "precio" => 9.95),

  array("ISBN" => 3, "titulo" => "Donde aullan las colinas", "descripcion" => "Un grupo de legionarios fieles a Julio César se hacen pasar por alimañeros y se ofrecen a una tribu de la ancestral Galicia para acabar con los lobos que están mermando sus ganados. Quieren hacerse con
    su favor y que les desvelen la ubicación de las míticas minas de oro", "categoria" => "Novela Historica", "editorial" => "editoria1", "foto" => "./img/dondeAullan.jpg", "precio" => 8.52),

  array("ISBN" => 4, "titulo" => "La joven de la perla", "descripcion" => "La relación secreta entre el pintor holandés Johannes Vermeer y su sirvienta convertida en musa. A principios del siglo XVII la ciudad de Delft vio nacer y crecer a uno de los pintores más fascinantes y misteriosos de la historia.", "categoria" => "Novela Historica", "editorial" => "editoria1", "foto" => "./img/jovePerla.jpg", "precio" => 14.95),


  array("ISBN" => 5, "titulo" => "La llama de focea", "descripcion" => "Queralt Bonmartí, una joven barcelonesa de familia acomodada, aparece asesinada en un paraje idílico del Camino de Santiago. Había salido tres semanas antes de Roncesvalles, donde tuvo un incidente con un desconocido.", "categoria" => "Novela Negra", "editorial" => "editoria1", "foto" => "./img/llamaFocea.jpg", "precio" => 20.83),

  array("ISBN" => 6, "titulo" => "Los muertos no saben nadar", "descripcion" => "La tercera novela de la autora de Lo que callan los muertos, ambientada entre Oviedo y Gijón. Una nueva investigación de Gracia San Sebastián, que ahora colabora con la policía.", "categoria" => "Novela Negra", "editorial" => "editoria1", "foto" => "./img/losMuertosNoSabenNadar.jpg", "precio" => 11.35),

  array("ISBN" => 7, "titulo" => "Los huesos ocultos", "descripcion" => "La inspectora Lottie Parker se enfrenta al caso más difícil de su carrera Cuando el cadáver de Isabel Gallagher aparece con cortes y puñaladas por todo el cuerpo, Lottie Parker se hace cargo de la investigación. ", "categoria" => "Novela Negra", "editorial" => "editoria1", "foto" => "./img/huesosOcultos.jpg", "precio" => 18.94),

  array("ISBN" => 8, "titulo" => "El libro del sepulturero", "descripcion" => "Leopold von Herzfeldt, un joven inspector de policía, será el encargado del caso, a pesar de no contar con el favor de sus colegas, que no quieren saber nada de sus novedosos métodos de investigación, como la inspección de la escena del crimen, la obtención de pruebas o la toma de fotografías.", "categoria" => "Novela Negra", "editorial" => "editoria1", "foto" => "./img/lSepulturero.jpg", "precio" => 20.81),

  array("ISBN" => 9, "titulo" => "Nos crecen los enanos", "descripcion" => "Dos cadáveres han aparecido en un pinar de Valladolid. Según la autopsia uno de ellos es el principal sospechoso de unos crímenes acaecidos en el municipio de Urueña varios años atrás. ", "categoria" => "Novela Negra", "editorial" => "editoria1", "foto" => "./img/nosCrecenLosEnano.jpg", "precio" => 18.99),


  array("ISBN" => 10, "titulo" => "Metro 2033", "descripcion" => "Año 2033. Tras una guerra nuclear devastadora, amplias zonas del mundo han quedado sepultadas bajo escombros y cenizas debido a la radiación. También Moscú se ha transformado en una ciudad fantasma. ", "categoria" => "Ciencia Ficcion", "editorial" => "editoria1", "foto" => "./img/metro2033.jpg", "precio" => 10.49),

  array("ISBN" => 11, "titulo" => "El mundo perdido", "descripcion" => "La pesadilla empieza en la isla de Costa Rica, donde se encuentran varios cadáveres de dinosaurios. El paleontólogo Richard Levine organiza una expedición y, gracias a sus peculiares ayudantes -dos niños superdotados-, consigue que Ian Malcolm", "categoria" => "Ciencia Ficcion", "editorial" => "editoria1", "foto" => "./img/elMundoPerdido.jpg", "precio" => 10.99),

  array("ISBN" => 12, "titulo" => "El arbol de las brujas", "descripcion" => "La pesadilla empieza en la isla de Costa Rica, donde se encuentran varios cadáveres de dinosaurios. El paleontólogo Richard Levine organiza una expedición y, gracias a sus peculiares ayudantes -dos niños superdotados-, consigue que Ian Malcolm", "categoria" => "Ciencia Ficcion", "editorial" => "editoria1", "foto" => "./img/arbolDeLasBrujas.jpg", "precio" => 12.35),

  array("ISBN" => 13, "titulo" => "La naranja mecanica", "descripcion" => "La naranja mecánica, publicada en 1962, sitúa la acción en el futuro cercano de la década de 1970. Burgess narra la historia de cuatro adolescentes, o nadsats, tal como se llaman en la jerga creada por el autor. ", "categoria" => "Ciencia Ficcion", "editorial" => "editoria1", "foto" => "./img/naranjaMecanica.jpg", "precio" => 8.59),

  array("ISBN" => 14, "titulo" => "El fin de la eternidad", "descripcion" => "Siglo XXVII. La Eternidad domina el mundo. Formada por las mentes más brillantes de cada época, se trata de una organización que envía a sus integrantes a viajar en el tiempo. Su objetivo es alterar la historia de la humanidad para protegerla de cualquier catástrofe.", "categoria" => "Ciencia Ficcion", "editorial" => "editoria1", "foto" => "./img/finEternidad.jpg", "precio" => 11.35),
);


function pintar($libreria, $categoria)
{ 
  $cont = 0;


  foreach ($libreria as $valor) {

 
    if ($valor["categoria"] == $categoria && $cont < 4) {
      $cont++;
      echo  "<div class='card' style='width: 18rem;'>
      <img width='100' height='350' src='" . $valor["foto"] . "' class='card-img-top' alt='...'>
      <div class='card-body'>
        <h5 class='card-title'>" . $valor["titulo"] . "</h5>
        <p class='card-text'>" . $valor["descripcion"] . "</p>
        <a href='#' class='btn btn-primary'>" . $valor["precio"] . " € </a>
      </div>
    </div>";
      
    }
    
  }
}

  //Me quedo con los valores de la columna categoría, y los valores los meto en un array
  $categorias = array_column($libreria, "categoria");
  //Quito repetidos
  $categorias = array_unique($categorias);

      foreach($categorias as $valor){
        echo "<h1>".$valor . "</h1>";
        pintar($libreria,$valor);
      }

?>
<h1> Hecho por Luis Jimenez Jerez</h1>