<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/cabecera.php");
?>


<div class="col-md-8 themed-grid-col">
		<div class="flex-shrink-0 p-3 bg-white">
        <?php

        function subtotal($linea_pedido)
        {

            $ivaS = 0;
            if ($linea_pedido["iva_r"] == 0) {
                $ivaS = $linea_pedido["precio"] * $linea_pedido["cant"] * 1.21;
            } else if ($linea_pedido["iva_r"] == 1) {
                $ivaS = $linea_pedido["precio"] * $linea_pedido["cant"] * 1.1;
            }
            return $ivaS;
        }

        $carrito = array(
            array("id" => 1234, "nombre" => "PS4", "precio" => 349.95, "cant" => 2, "iva_r" => 0),
            array("id" => 1235, "nombre" => "iPhone XS", "precio" => 1249.95, "cant" => 1, "iva_r" => 0),
            array("id" => 1236, "nombre" => "Chocolate", "precio" => 9.95, "cant" => 5, "iva_r" => 1)
        );
        
        
        echo "<table class='table'>";
        echo "<tbody>";
        $total = 0;
        foreach($carrito as $valor) {
            echo "<tr>";
            echo "<td>" . $valor['nombre'] . "</td>";
            echo "<td>" . $valor['precio'] . "</td>";
            echo "<td>" . $valor['cant'] . "</td>";
            
            echo "<td>";
            if ($valor['iva_r'] == 0) 
                echo "21%";
            else 
                echo "10%";
            echo "</td>";
        
            echo "<td>" . subtotal($valor) . " €</td>";
            
            $total += subtotal($valor);
            
            echo "</tr>";
        }
        
        echo "<tr><td>Total</td><td>" . $total . " €</td></tr>"; 
        echo "</tbody>";
        echo "</table>";
        
        ?>
        </div>
    </div>
</div>