<?php

require_once 'inicioHtml.php' ?>

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

<?php require_once 'fimHtml.php';
