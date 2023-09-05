<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;
use PDO;

class VideoListController
{

    public function __construct( private VideoRepository $videoRepository)
    {


    }

    public function processaRequisicaoListagemGeral(): void
    {

        $videoList = $this->videoRepository->all();

       require_once __DIR__.'/../../inicioHtml.php'

    //Fechando a tag pois tudo abaixo sera php
    ?>

    <ul class="videos__container" alt="videos alura">

        <?php
            foreach ($videoList as $video):
        ?>

        <li class="videos__item">
            <iframe width="100%" height="72%" src="<?php echo $video->url;?>"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            <div class="descricao-video">
                <img src="img/logo.png" alt="logo canal alura">
                <h3><?php echo $video->title?></h3>
                <div class="acoes-video">
                    <a href="/editar-video?id=<?php echo $video->id;?>">Editar</a>
                    <a href="/remover-video?id=<?php echo $video->id;?>">Excluir</a>
                </div>
            </div>
        </li>
        <?php endforeach;?>
    </ul>

<?php require_once  __DIR__.'/../../fimHtml.php';
//abrindo a tag pois tudo acima será php
    }
    
    public function processaRequisicaoDoformularioParaEditarUmVideo(): void
    {

        $video = $this->videoRepository->single(intval($_GET['id']));

        require_once __DIR__.'/../../inicioHtml.php'?>

    <main class="container">

        <form class="container__formulario" method="post">
            <h2 class="formulario__titulo">Envie um vídeo!</h2>
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="url">Link embed</label>
                    <input name="url" class="campo__escrita" required
                        placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" id='url'
                        value="<?php echo $video->url;?>"/>
                </div>


                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
                    <input name="titulo" class="campo__escrita" required placeholder="Neste campo, dê o nome do vídeo"
                        id='titulo' value="<?php echo $video->title;?>"/>
                </div>
                <input type="hidden" name="id" value="<?php if (isset($_GET['id'])) {echo $_GET['id'];}?>">
                <input class="formulario__botao" type="submit" value="Enviar" />
        </form>

    </main>

        <?php require_once __DIR__.'/../../fimHtml.php';

    }

    public function processaRequisicaoParaUmNovoVideo(): void
    {
        require_once __DIR__.'/../../inicioHtml.php'?>

        <main class="container">

            <form class="container__formulario" method="post">
                <h2 class="formulario__titulo">Envie um vídeo!</h2>
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="url">Link embed</label>
                    <input name="url" class="campo__escrita" required
                           placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" id='url'
                           value=""/>
                </div>


                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
                    <input name="titulo" class="campo__escrita" required placeholder="Neste campo, dê o nome do vídeo"
                           id='titulo' value=""/>
                </div>

                <input class="formulario__botao" type="submit" value="Enviar" />
            </form>

        </main>

        <?php require_once __DIR__.'/../../fimHtml.php';
    }

    public function processaRequisicaoParaAdicionarUmNovoVideo(): void
    {

        $url = filter_input(INPUT_POST,'url',FILTER_VALIDATE_URL);
        $title = filter_input(INPUT_POST,'titulo');

        if (($url && $title) === false) {

            header('Location:/?status=error');
            exit();
        }

        $status = $this->videoRepository->add(new Video($url,$title));

        if ($status === false) {
            header('Location:/?status=error');
        }else{
            header('Location:/?status=success');
        }
    }

    public function processaRequisicaoParaEditarUmVideoExistente():void
    {
        $id = $_GET['id'];

        $url = filter_input(INPUT_POST,'url',FILTER_VALIDATE_URL);
        $title = filter_input(INPUT_POST,'titulo');

        if (($url && $title) === false) {

            header('Location:/?status=error');
            exit();
        }

        $video = new Video($url,$title);
        $video->setId($id);
        $status = $this->videoRepository->update($video);

        if ($status === false) {
            header('Location:/?status=error');
        }else{
            header('Location:/?status=success');
        }
    }

    public function processaRequisicaoParaExcluirUmVideo()
    {
        $id = $_GET['id'];

        $status = $this->videoRepository->remove($id);
        if ($status === false) {
            header('Location:/?sucesso=0');
        }else{
            header('Location:/?sucesso=1');
        }
    }
}