<?php
class ApiChatgpt
{
    public static function render($texto)
    {
        require_once('vendor/autoload.php');

        $client = new \GuzzleHttp\Client();

        //Vendría del textarea
        $textoArticulo = "Escribe un artículo sobre " . $texto;

        $response = $client->request('POST', 'https://api.openai.com/v1/completions', [
            'body' => '{"model": "text-davinci-003", "prompt": "' . $textoArticulo . '", "temperature": 0, "max_tokens": 1000, "n": 1}',
            'headers' => [
                'Authorization' => 'Bearer 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',
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);

        $respuesta = $response->getBody();

        $respuestaJSON = json_decode($respuesta);

        $textos = $respuestaJSON->choices[0]->text;

        echo "<br>";

        $textoImagen = $texto;
        $response = $client->request('POST', 'https://api.openai.com/v1/images/generations', [
            'body' => '{"prompt": "' . $textoImagen . '", "size": "1024x1024", "n": 1}',
            'headers' => [
                'Authorization' => 'Bearer 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',
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);

        $respuesta = $response->getBody();

        $respuestaJSON = json_decode($respuesta);

        $imagenes = $respuestaJSON->data[0]->url;

        echo '
        <center>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row justify-content-around p-3 m-4">
            
                        <div class="col-md-3 position-relative">
                            <div class="card" style="width: 65rem;">
                                <img src="'.$imagenes.'" class="img-fluid " widht="550" height="450" />
                                <div class="card-body">
                                <p class="card-text">'.$textos.'</p>
                                </div>
                            </div>
                        </div>
            
                    </div>
                </div>
                <a href="enrutador.php?accion=guardar&imagen='.urlencode($imagenes).'&titulo='.$texto.'&texto='.$textos.'" class="btn btn-info">Guardar</a>
                <a href="enrutador.php?accion=Chatgpt" class="btn btn-info">Generar Otro</a>
            </div>
        </center>';

    }
}
