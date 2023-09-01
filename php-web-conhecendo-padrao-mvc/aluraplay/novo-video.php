<?php

$pdo = new PDO('mysql:host=192.168.100.37;dbname=aluraplay',
    'gustavo',
    'mT4SeG@s2s');

$id = $_POST['id'];

//se vier preenchido, eu quero atualizar
//se viar vazio, é a adição de um novo
if (empty($id)) {
    echo "Novo";
    insert($pdo);
}else{

    update($pdo,$id);
}


function update(PDO $pdo,$id) {

    $url = filter_input(INPUT_POST,'url',FILTER_VALIDATE_URL);
    $title = filter_input(INPUT_POST,'titulo');

    if (($url && $title) === false) {

        header('Location:index.php?status=error');
        exit();
    }

    $update = 'UPDATE videos SET url=?, title=? where id=?';
    $stmt = $pdo->prepare($update);
    $stmt->bindValue(1,$url);
    $stmt->bindValue(2,$title);
    $stmt->bindValue(3,$id);

    if ($stmt->execute() === false) {
        header('Location:index.php?status=error');
    }else{
        header('Location:index.php?status=success');
    }
}

function insert(PDO $pdo) {

    $url = filter_input(INPUT_POST,'url',FILTER_VALIDATE_URL);
    $title = filter_input(INPUT_POST,'titulo');

    if (($url && $title) === false) {

        header('Location:index.php?status=error');
        exit();
    }


    $sql = 'INSERT INTO videos (url,title) VALUES (?,?);';

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1,$_POST['url']);
    $stmt->bindValue(2,$_POST['titulo']);

    if ($stmt->execute() === false) {
        header('Location:index.php?status=error');
    }else{
        header('Location:index.php?status=success');
    }

}



