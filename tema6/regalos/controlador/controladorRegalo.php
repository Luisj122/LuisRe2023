<?php

    class controladorRegalo {


        public static function mostrarRegalos() {
            //LLamar al modelo para obtener todas las películas en un array de Pelicula
            $regalos = regaloBD::getRegalo();

            //Llamar a una vista para pintar esas películas
            VistaRegalo::render($regalos);
        }


        public static function borrarRegalo($id) {
            //LLamar al modelo para obtener todas las películas en un array de Pelicula
            regaloBD::borrarRegalo($id);  
            echo "<script>window.location='enrutador.php?accion=regaloU'</script>";       

        }

       

        public static function insertarRegalos($regalo) {
            $regalo = new Regalo($regalo["nombre"], $regalo["destinatario"], $regalo["precio"],
            $regalo["estado"], $regalo["anio"], $regalo["usuario"]);
            regaloBD::insertarREGALO($regalo);
            echo "<script>window.location='enrutador.php?accion=regaloU'</script>";
      
        }

        public static function editarRegalo($id,$nombre,$destinatario, $precio, $estado, $anio, $idUsuario) {
            
            regaloBD::editarRegalo($id,$nombre,$destinatario, $precio, $estado, $anio, $idUsuario);
            echo "<script>window.location='enrutador.php?accion=regaloU'</script>";
            
            
        }

        public static function buscarAnio($anio) {
            
            $anioB = regaloBD::buscarAnios($anio);
            RegaloAnio::renderAnio($anioB);

            
        }

        public static function mostrarLogin(){

            VistaLogin::mostrarLogin();
        }

        public static function login($email, $password){
            $usuario = null;
            $codigo = usuarioBD::chequearLogin($email,$password, $usuario);

            if ($codigo == 1) {
                echo "<script>window.location='enrutador.php?accion=error&codigo=1'</script>";
            } else {
                //Usuario correcto 
                $_SESSION['usuario'] = serialize($usuario);
                echo "<script>window.location='enrutador.php?accion=regaloU'</script>";

            }
        }

        public static function mostrarRegalosU($id) {
            
            $regalos = regaloBD::getRegaloUsuario($id);        
            VistaRegalo::render($regalos);
        }

        public static function mostrarEnlace($id) {
            
            $enlaces = enlaceBD::getEnlace($id);           
            VistaEnlace::render($enlaces);
        }

        public static function GenerarPdf($id) {
            require './vendor/autoload.php';
            $regalos = regaloBD::getRegaloUsuario($id);

            // create new PDF document
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // set document information
            $pdf->setCreator(PDF_CREATOR);
            $pdf->setAuthor('Luis Jimenez');
            $pdf->setTitle('Proyectos');
            $pdf->setSubject('TCPDF Tutorial');
            $pdf->setKeywords('TCPDF, PDF, example, test, guide');

            // set default header data
            $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
            $pdf->setFooterData(array(0,64,0), array(0,64,128));

            // set header and footer fonts
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

            // set default monospaced font
            $pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
            $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->setFooterMargin(PDF_MARGIN_FOOTER);

            // set auto page breaks
            $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // set some language-dependent strings (optional)
            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            // ---------------------------------------------------------

            // set default font subsetting mode
            $pdf->setFontSubsetting(true);

            // Set font
            // dejavusans is a UTF-8 Unicode font, if you only need to
            // print standard ASCII chars, you can use core fonts like
            // helvetica or times to reduce file size.
            $pdf->setFont('dejavusans', '', 14, '', true);

            // Add a page
            // This method has several options, check the source code documentation for more information.
            $pdf->AddPage();

            // set text shadow effect
            $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

            // Set some content to print
            $html ="<h1>Proyectos</h1>";


            $html .= "<table class='table'>";
            $html .= "<thead>";
            $html .= "<tr>";
            $html .= "<td> Nombre </td>";
            $html .= "<td> Destinatario </td>";
            $html .= "<td> Estado </td>";
            $html .= "<td> Anio </td>";
            $html .= "<td> Precio </td>";
            $html .= "<td> Nombre </td>";
            $html .= "<td> Enlaces </td>";
            $html .= "<td> Precio </td>";
            $html .= "<td> Prioridad </td>";
            $html .= "</tr>";
            $html .= "</thead>";

            $html .= "<tbody>";

            foreach ($regalos as   $regalo) {
                $enlaces = enlaceBD::getEnlace($regalo->getId());
                foreach ($enlaces as $enlace){
                    $html .= "<tr>";
                    $html .= "<td>" . $regalo->getNombre() . "</td>";
                    $html .= "<td>" . $regalo->getDestinatario() . "</td>";
                    $html .= "<td>" . $regalo->getEstado() . "</td>";
                    $html .= "<td>" . $regalo->getAnio() . "</td>";
                    $html .= "<td>" . $regalo->getPrecio() . "</td>";
                    $html .= "<td>" . $enlace->getNombre() . "</td>";
                    $html .= "<td>" . $enlace->getEnlaces() . "</td>";
                    $html .= "<td>" . $enlace->getPrecio() . "</td>";
                    $html .= "<td>" . $enlace->getPrioridad() . "</td>";
                    $html .= "</tr>";
                }
                
            }
            $html .= "</tbody>";
            
            $html .= "</table>";




            // Print text using writeHTMLCell()
            $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

            // ---------------------------------------------------------

            echo "Generando ...";

            // Close and output PDF document
            // This method has several options, check the source code documentation for more information.
            $flujo = $pdf->Output('regalo.pdf', 'S');
            file_put_contents("regalo.pdf", $flujo);

            echo "Generado.";
            //============================================================+
            // END OF FILE
            //============================================================+
            echo '<script>window.location="' . "enrutador.php?accion=regaloU" . '"</script>';
    
                
            }

        
    }
