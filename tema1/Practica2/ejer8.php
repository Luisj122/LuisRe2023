<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>
<div class="col-md-10 themed-grid-col p-3 bg-dark p-3">
  <div class="p-3 bg-dark p-3">


    <?php


    function pintarPj($personajes)
    {
      foreach ($personajes as $valor) {
        echo "<div>";
        echo "<div class='card mb-3 p-3 bg-dark p-3' style='max-width: 100%';>
<div class='row g-0'>
  <div class='col-md-4'>
    <img width='290' src='" . $valor["foto"] . "' class='img-fluid rounded-start' alt='...'>
  </div>
  <div class='col-md-8'>
    <div class='card-body'>
      <h5 class='card-title text-white '>" . $valor["Nombre"] . "</h5>
      <p class='card-text text-white'>" . $valor["descripcion"] . "</p>";

        echo "<table class='table border-dark'>";
        echo "<tr>";
        foreach ($valor['fotos'] as $imagenMini) {
          echo "<td>";
          echo "<img righy src='" . $imagenMini . "'  width='90'  height='100'>";
          echo "</td>";
        }
        echo "</tr>";
        echo "</table>";
        echo "</div>
  </div>
</div>
</div>
</div>";
      }
    }

    $personajes = array(
      array("Nombre" => "Moira", "descripcion" => "Moira, brillante y controvertida a partes iguales, es una científica que domina el poder del recrecimiento y la descomposición. Está a la última en ingeniería genética y busca una forma de sobrescribir los componentes fundamentales que dan forma a la vida.", "foto" => "./img8/moira.png", "fotos" => array("./img8/moira1.png", "./img8/moira2.png", "./img8/moira3.png")),

      array("Nombre" => "Reinhardt", "descripcion" => "Reinhardt es un campeón que se rige por los códigos caballerescos del valor, la justicia y el coraje. Ataviado con una armadura potenciada y blandiendo un martillo, lidera la carga mediante una propulsión con cohetes a través del campo de batalla y defiende a sus camaradas con una enorme barrera de energía.", "foto" => "./img8/reinhardt.png", "fotos" => array("./img8/reinhardt1.png", "./img8/reinhardt2.png", "./img8/reinhardt3.png")),

      array("Nombre" => "TORBJÖRN", "descripcion" => "Gracias a Torbjörn, Overwatch disponía de uno de los arsenales más avanzados del planeta. Entre sus armas se encuentran una remachadora, un martillo y una forja personal que usa para construir torretas.", "foto" => "./img8/torb.png", "fotos" => array("./img8/torb1.png", "./img8/torb2.png", "./img8/torb3.png")),

      array("Nombre" => "Mei", "descripcion" => "Mei es una científica con un arsenal de dispositivos capaces de alterar el clima. Fue investigadora, pero ha decidido unirse a Winston para ayudar a Overwatch a lidiar con las nuevas amenazas que acechan al mundo.", "foto" => "./img8/mei.png", "fotos" => array("./img8/mei1.png", "./img8/mei2.png", "./img8/mei3.png")),

      array("Nombre" => "Reaper", "descripcion" => "Reaper es un peligroso asesino equipado con dos escopetas que dispone la habilidad de moverse por el campo de batalla como un fantasma. Siempre que aparece, la muerte lo sigue.", "foto" => "./img8/re.png", "fotos" => array("./img8/re1.png", "./img8/re2.png", "./img8/re3.png")),

      array("Nombre" => "Lucio", "descripcion" => "Lúcio es una celebridad conocida internacionalmente que inspira el cambio social a través de su música y sus actos. En el campo de batalla, hace uso de su amplificador sónico de última generación y canciones únicas para avasallar a los enemigos, sanar aliados y potenciar la velocidad de sus compañeros de equipo.", "foto" => "./img8/lu.png", "fotos" => array("./img8/lu1.png", "./img8/lu2.png", "./img8/lu3.png")),

      array("Nombre" => "Tracer", "descripcion" => "La agente de Overwatch conocida como Tracer es una aventurera del espacio y el tiempo, y una fuerza irrefrenable del bien. Equipada con dos pistolas de pulsos y bombas temporales, Tracer es capaz de «trasladarse» a través del espacio y rebobinar su línea temporal personal mientras lucha contra el mal por todo el mundo.", "foto" => "./img8/tr.png", "fotos" => array("./img8/tr1.png", "./img8/tr2.png", "./img8/tr3.png"))
    );


    pintarPj($personajes);


    ?>
  </div>
</div>