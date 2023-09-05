<?php

namespace Alura\Mvc\Repository;

use Alura\Mvc\Entity\Video;
use PDO;

class VideoRepository
{

    public function __construct(private \PDO $pdo)
    {
    }

    public function add (Video $video): bool

    {

        $sql = 'INSERT INTO videos (url,title) VALUES (?,?);';

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1,$video->url);
        $stmt->bindValue(2,$video->title);

        $status = $stmt->execute();

        if ($status === false) {

            throw new \PDOException("Falha ao inserir vídeo");
        }

        $video->setId($this->pdo->lastInsertId());

        return $status;

    }

    public function remove(int $id): bool
    {
        $sql = 'DELETE FROM videos WHERE id = ?';

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1,$id);

        $status = $stmt->execute();

        if ($status === false) {

            throw new \PDOException("Falha ao excluir vídeo");
        }

        return $status;
    }

    public function update(Video $video): bool
    {

        $update = 'UPDATE videos SET url=?, title=? where id=?';
        $stmt = $this->pdo->prepare($update);
        $stmt->bindValue(1,$video->url);
        $stmt->bindValue(2,$video->title);
        $stmt->bindValue(3,$video->id);

        $status = $stmt->execute();

        if ($status === false) {

            throw new \PDOException("Falha ao excluir vídeo");
        }

        return $status;

    }

    /**
     * @return Video[]
     */
    public function all(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM videos");
        $stmt->execute();
        $videoList = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //ele ira retornar um array de videos. O arraymap fara com que para cada
        //valor dentro do array a função seja aplicada. Função essa que instancia um
        //novo video com base nos dados
        return array_map(
            function (array $videoData) {
                $video = new Video($videoData['url'], $videoData['title']);
                $video->setId($videoData['id']);
                return $video;
            },
            $videoList
        );
    }


    public function single(int $id): Video
    {

        $stmt = $this->pdo->prepare("SELECT * FROM videos WHERE id = :id");
        $stmt->bindValue('id',$id);
        $stmt->execute();
        $videoList = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->hidrataUmVideo($videoList);

    }

    private function hidrataUmVideo(array $videosList): Video
    {
        $video = 0;

        foreach ($videosList as $videoData) {

            $video = new Video($videoData['url'],$videoData['title']);
            $video->setId($videoData['id']);

        }

        return $video;

    }


}