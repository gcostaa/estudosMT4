<?php

use Alura\Mvc\Repository\VideoRepository;

$pdo = new PDO('mysql:host=192.168.100.37;dbname=aluraplay',
    'gustavo',
    'mT4SeG@s2s');

$repository = new VideoRepository($pdo);
$videoList = $repository->all();

?>

<?php require_once 'inicioHtml.php'?>

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

<?php require_once 'fimHtml.php'?>