<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <link href="materialize/css/materialize.min.css" rel="stylesheet" type="text/css">
        <script src="materialize/js/jquery.min.js"></script>
        <script src="materialize/js/materialize.min.js"></script>
    <?php
        class noticiaRss {
            public function __construct(){
                //Aqui colocar as URL dos Feeds de notícia que serão usados.
                //Sempre dentro de aspas e separados por vírgula para formar um vetor (array)
                $this->URL = ["http://rss.uol.com.br/feed/noticias.xml",
            'https://www.uol.com.br/esporte/ultimas/index.xml', 'http://rss.uol.com.br/feed/cinema.xml'
            ];
            }

            //Método responsável por paginas o conteúdo e escolher o RSS correto
            public function paginacao(){
                $totalAssuntos = count($this->URL);
                $paginaAtual = (!empty($_GET['assunto'])) ? $_GET['assunto'] : 0;
                return [$totalAssuntos, $paginaAtual];
            }

            //Método responsável por capturar o conteúdo do feed
            public function getFeed(){                
                $assunto = (!empty($_GET['assunto'])) ? $_GET['assunto'] : 0;
                
                $xmldata = file_get_contents(utf8_encode($this->URL[$assunto])) or die("Failed to load");
                $xml = simplexml_load_string(utf8_encode($xmldata));

                return $xml->channel;
                
            }

            //Método
            public function returnJson(){
                $itens = self::getFeed();
                $totalNoticias = count($itens->item);
                $array = [];
                $array["totalNoticias"] = $totalNoticias;
                $array["noticias"]= [];
                
                foreach($itens->item as $chave=>$valor){                    
                    $noticia = [];
                    
                    $noticia["titulo"] = strVal($valor->title);
                    $noticia["link"] = strVal($valor->link);
                    $noticia["descricao"] = strVal($valor->description);

                    array_push($array["noticias"], $noticia);
                }
                
                $json = json_encode($array);
                //var_dump($json);
                return $json;
            }

        }    
        ?>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col s12 md12">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title"  id="titulo"></span>
                            <p id="noticia"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script>
        <?php $objeto = new noticiaRss(); ?>
        
        noticia = 0; //Número da primeira notícia
        tempo = 4000; // tempo entre as transições de notícias em milisegundos

        //Função responsável por rotacionar as notícias de um mesmo feed
        setInterval(function(){
            let json = <?=$objeto->returnJson(); ?>;

            if(noticia < json.totalNoticias){
                noticia ++;
            }else{
                noticia = 0;
            }

            $('#titulo').html(json.noticias[noticia].titulo);
            $('#noticia').html(json.noticias[noticia].descricao);
            $('#noticia img').hide();

        }, tempo);

        //Função responsável por carregar o próximo feed de notícias por assunto
        setInterval(function(){
            <?php $paginacao = $objeto->paginacao(); ?>
            let totalAssuntos = parseInt(<?=$paginacao[0] ?>);
            let paginaAtual = parseInt(<?=$paginacao[1] ?>);

            if(parseInt(paginaAtual+1) == totalAssuntos){
                document.location = 'rss.php';
            }else{
                document.location = 'rss.php?assunto=' + (paginaAtual+1);
            }
            
        },12000)

    </script>
</html>
