<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function generarPDF(){
            //Load Composer's autoloader
            require '../vendor/autoload.php';

            // create new PDF document

            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // set document information
            $pdf->setCreator(PDF_CREATOR);
            $pdf->setAuthor('Luis Jimenez');
            $pdf->setTitle('Proyectos');
            $pdf->setSubject('TCPDF Tutorial');
            $pdf->setKeywords('TCPDF, PDF, example, test, guide');

            // set default header data
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
            $html .= "<td> Fecha Inicio </td>";
            $html .= "<td> Fecha Fin Previsto </td>";
            $html .= "<td> Dias Transcurridos </td>";
            $html .= "<td> Porcentaje Completado </td>";
            $html .= "<td> Importancia </td>";
            $html .= "</tr>";
            $html .= "</thead>";

            $html .= "<tbody>";

            foreach ($_SESSION['proyectos'] as   $valor) {
                $html .= "<tr>";
                $html .= "<td>" . $valor["nombre"] . "</td>";
                $html .= "<td>" . $valor["fechaInicio"] . "</td>";
                $html .= "<td>" . $valor["fechaFinPrevisto"] . "</td>";
                $html .= "<td>" . $valor["diasTranscurridos"] . "</td>";
                $html .= "<td>" . $valor["porcentajeCompletado"] . "</td>";
                $html .="<td>" . $valor["importancia"] . " </td>";
                
                $html .= "</tr>";
            }
            $html .= "</tbody>";
            
            $html .= "</table>";




            // Print text using writeHTMLCell()
            $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

            // ---------------------------------------------------------

            // Close and output PDF document
            // This method has several options, check the source code documentation for more information.
            $flujo = $pdf->Output('ejemplo.pdf', 'S');
            file_put_contents("ejemplo.pdf", $flujo);


            //============================================================+
            // END OF FILE
            //============================================================+

}

function enviarEmail(){
        //Load Composer's autoloader
        require '../../vendor/autoload.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'luisjmnz122@gmail.com';                     //SMTP username
            $mail->Password   = 'dfpywnqurycdvyrw';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('luisjmnz122@gmail.com', 'Emisor');
            $mail->addAddress($_SESSION['email'], 'Usuario');     //Add a recipient
            //$mail->addAddress('ellen@example.com');               //Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            $mail->addAttachment('./ejemplo.pdf', 'ejemplo.pdf');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Proyectos';
            $mail->Body    = 'Prueba Email';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

}