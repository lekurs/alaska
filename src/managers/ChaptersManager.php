<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 24/11/2017
 * Time: 13:54
 */

namespace src\managers;
use app\classes\Database;
use app\lib\QueryBuilder;
use \PDO;
use src\models\Chapters;


class ChaptersManager extends Database
{
    private $data = [];

    /**
     * Retourne tous les chapitres online
     * @return array
     */
    public function getChapters()
    {
        $db = new QueryBuilder($this->Connect());
        $select = [
           'id_chapter' => 'idChapter',
           'title' => 'title',
           'chapter' => 'chapter',
           'DATE_FORMAT(create_date, \'%d/%M/%y\')' => 'create_date',
           'online' => 'online',
        ];

        $req = $db
                             ->type('select')
                            ->select($select)
                            ->from('chapter')
                            ->where('online = 1')
                            ->orderBy('id_chapter', 'ASC');

        $result = $req->fetchAll();

        foreach($result as $data)
        {
            $chapters= $this->buildChapters($data);
            $this->data[] = $chapters;
        }
        return $this->data;
    }

    /**
     * Retourne le chapitre complet à afficher
     * @param $idChapter
     * @return Chapters
     */
    public function getChapter($idChapter)
    {
        $db = new QueryBuilder($this->Connect());
        $select = [
                'id_chapter' => 'idChapter',
                'title' => 'title',
                'chapter' => 'chapter',
                'DATE_FORMAT(create_date, \'%d/%M/%Y\')' => 'create_date',
                'online' => 'online',
        ];

        $req = $db->type('select')
                                ->select($select)
                                ->from('chapter')
                                ->where('id_chapter = :idChapter');

        $req->bind(':idChapter', $idChapter);
        $result = $req->fetch();
        return $this->dataChapter[] = $this->buildChapters($result);
    }

    /**
     * Renvoie les chapitres offline
     * @return mixed
     */
    public function chapterOffline()
    {
        $db = new QueryBuilder($this->Connect());

        $select = [
            'id_chapter' => 'idChapter',
            'title' => 'title',
            'chapter' => 'chapter',
            'DATE_FORMAT(create_date, \'%d/%m/%Y\')' => 'create_date',
            'online' => 'online'
            ];

        $req = $db->type('select')
                            ->select($select)
                            ->from('chapter')
                            ->where('online = 0')
                            ->orderBy('id_chapter', 'ASC');

        $result = $req->fetchAll();

        foreach($result as $data)
        {
            $chapters= $this->buildChapters($data);
            $this->dataOffline[] = $chapters;
        }
        return $this->dataOffline;
    }

    /**
     * Renvoie le nombre de chapitres diffusés
     * @return mixed => Nombre de chapitres total
     */
    public function countChapter()
    {
        $db = new QueryBuilder($this->Connect());

        $select = [
           'id_chapter' =>'idChapter',
           'title' => 'title',
           'chapter' => 'chapter',
            'DATE_FORMAT(create_date, \'%d/%m/%Y\')' => 'date_creation',
            'online' => 'online',
        ];

        $req = $db->type('select')
                            ->select($select)
                            ->from('chapter')
                            ->where('online = 1');

        return $req->rowCount();
    }

    /**
     * Ajout Chapitre
     * @param Chapters $chapter
     */
    public function addChapter(Chapters $chapter)
    {
        $db = new QueryBuilder($this->Connect());

        $req = $db->type('insert')
                            ->from('chapter')
                            ->insert('title, chapter, create_date, online')
                            ->values(':title, :chapter, NOW(), :online');

        $req->bind(':title', $chapter->title());
        $req->bind(':chapter', $chapter->chapter());
        $req->bind(':online', $chapter->online());

        $req->exec();
    }


    /**
     * Suppression d'un chapitre
     * @param Chapters $chapters
     */
    public function delChapter(Chapters $chapters)
    {
        $db = new QueryBuilder($this->Connect());

        $req = $db->type('delete')
                            ->from('chapter')
                            ->where('id_chapter = :chapter');
        $req->bind(':chapter', $chapters->idChapter());
        $req->exec();
    }

    /**
     * Mise à jour d'un Chapitre
     * @param Chapters $chapter
     */
    public function updateChapter(Chapters $chapter)
    {
        $db = new QueryBuilder($this->Connect());

        $req = $db->type('update')
                            ->from('chapter')
                            ->values('title = :title, chapter = :chapter, create_date = NOW(), online = :online')
                            ->where('id_Chapter = :chapterId');

        $req->bind(':title', $chapter->title());
        $req->bind(':chapter', $chapter->chapter());
        $req->bind(':online', $chapter->online());
        $req->bind('chapterId', $chapter->idChapter());
        $req->exec();
    }

    /**
     * Renvoie les id des chapitres avec des messages reportés
     * @return mixed
     */
    public function getChaptersWithReport()
    {
        $db = new QueryBuilder($this->Connect());

        $select = [
           'chap.id_chapter' => 'idChapter',
           'chap.title' => 'title',
            'chap.create_date' => 'create_date',
            'online' => 'online',
            'chap.chapter' => 'chapter',
            'comm.chapter_id' => 'chapterId',
            'comm.report' => 'report',
        ];

        $req = $db->type('select')
                            ->select($select)
                            ->from('chapter AS chap')
                            ->innerJoin('comments AS comm')
                            ->where('chap.id_chapter = comm.chapter_id')
                            ->andWhere('comm.report = 1');

        $result = $req->fetchAll();

        foreach($result as $data)
        {
            $chapters= $this->buildChapters($data);
            $this->dataReport[] = $chapters;
        }
        return $this->dataReport;
    }

    /**
     * Hydrate Chapters
     * @param array $data
     * @return Chapters
     */
    public function buildChapters(array $data)
    {
        $model = new Chapters();

        $model->setTitle($data['title']);
        $model->setIdChapter($data['idChapter']);
        $model->setCreate_date($data['create_date']);
        $model->setOnline($data['online']);
        $model->setChapter($data['chapter']);

        return $model;
    }
}