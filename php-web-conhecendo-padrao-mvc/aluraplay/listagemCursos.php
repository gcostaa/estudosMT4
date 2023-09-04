<?php

$pdo = new PDO('mysql:host=192.168.100.37;dbname=aluraplay',
    'gustavo',
    'mT4SeG@s2s');

 $stmt = $pdo->prepare("SELECT * FROM videos");
 $stmt->execute();
 $videoList = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php require_once 'inicioHtml.php'?>

    <ul class="videos__container" alt="videos alura">

        <?php
            foreach ($videoList as $video):
        ?>
        <?php
                if (!str_starts_with($video['url'],'http')) {

                    $video['url'] = 'https://www.youtube.com/embed/AWVQVtaV9Oo?si=pYoXobY1E5giDc-h';
                }
        ?>
        <li class="videos__item">
            <iframe width="100%" height="72%" src="<?php echo $video['url'];?>"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            <div class="descricao-video">
                <img src="./img/logo.png" alt="logo canal alura">
                <h3><?php echo $video['title']?></h3>
                <div class="acoes-video">
                    <a href="/editar-video?id=<?php echo $video['id'];?>">Editar</a>
                    <a href="/remover-video?id=<?php echo $video['id'];?>">Excluir</a>
                </div>
            </div>
        </li>
        <?php endforeach;?>
    </ul>

<?php require_once 'fimHtml.php'?>