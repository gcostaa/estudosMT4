 <?php

$id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

$video = [

            'url' => '',
            'title' => ''
];

if (isset($_GET['id'])) {

    $pdo = new PDO('mysql:host=192.168.100.37;dbname=aluraplay',
        'gustavo',
        'mT4SeG@s2s');

    $stmt = $pdo->prepare("SELECT * FROM videos WHERE id=?");
    $stmt->bindValue(1,$_GET['id']);
    $stmt->execute();
    $video = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<?php require_once 'inicioHtml.php' ?>

    <main class="container">

        <form class="container__formulario" method="post">
            <h2 class="formulario__titulo">Envie um vídeo!</h2>
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="url">Link embed</label>
                    <input name="url" class="campo__escrita" required
                        placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" id='url'
                        value="<?php echo $video['url'];?>"/>
                </div>


                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
                    <input name="titulo" class="campo__escrita" required placeholder="Neste campo, dê o nome do vídeo"
                        id='titulo' value="<?php echo $video['title'];?>"/>
                </div>

                <!--SETA O ID PARA O POST-->
                <input type="hidden" name="id" value="<?php if (isset($_GET['id'])) {echo $_GET['id'];}?>">
                <input class="formulario__botao" type="submit" value="Enviar" />
        </form>

    </main>

<?php require_once 'fimHtml.php' ?>