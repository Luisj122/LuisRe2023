<?php
    class Textart{
        public static function texto(){
            echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
           
            <form action="enrutador.php" method="post"> 
                    <div class="input-group">
                        <span class="input-group-text">CHATGPT</span>
                        <textarea class="form-control" aria-label="With textarea" rows="20" cols="50" name="articulo"></textarea>
                    </div>
                <input type="hidden" name="accion" value="verArticulo">
                <center> 
                    <button type="submit" class="btn btn-primary mt-2 mb-3">GENERAR</button>
                </center>
            </form>
            </body>
            </html>';
        }
    }
?>