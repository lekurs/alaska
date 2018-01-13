<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 27/11/2017
 * Time: 09:57
 */

namespace src\managers;
use app\classes\Database;
use app\lib\QueryBuilder;
use \PDO;
use src\models\Comments;


class CommentsManager extends Database
{
    private $data = [];

    /**
     * Retourne tous les commentaires par chapitre
     * @param $idChapter
     * @return array
     */
    public function getComments($idChapter)
    {
        $db = new QueryBuilder($this->Connect());

        $select = [
           'c.id_comments' => 'idComments',
           'c.comments' => 'comments',
           'c.report' => 'report',
           'c.user_id' => 'userId',
           'c.chapter_id' => 'chapterId',
           'u.username' => 'username',
        ];

        $req = $db->type('select')
                            ->select($select)
                            ->from('comments AS c')
                            ->innerJoin('user AS u')
                            ->where('c.user_id = u.id_user')
                            ->andWhere('c.chapter_id = :idChapter')
                            ->orderBy('idComments', 'ASC');

        $req->bind(':idChapter', $idChapter);

        $result = $req->fetchAll();

        foreach ($result as $data)
        {
            $comment = $this->buildComments($data);
            $this->data[] = $comment;
        }
        return $this->data;
    }

    /**
     * Retourne le nombre de commentaire par chapitre
     * @param $idChapter
     * @return int
     */

    public function nb_comment($idChapter)
    {
        $db = new QueryBuilder($this->Connect());

        $select = [
           'id_comments' => 'comments',
           'comments' => 'comments',
           'report' => 'report',
           'user_id' => 'userId',
           'chapter_id' => 'chapterId',
        ];

        $req = $db->type('select')
                            ->select($select)
                            ->from('comments')
                            ->where('chapter_id = :idChapter');

        $req->bind(':idChapter', $idChapter);
        $result = $req->fetchAll();

        return count($result);
    }

    /**
     * Ajoute un commentaire sur le chapitre en cours
     * @param Comments $comments
     */
    public function addComment(Comments $comments)
    {
        $db = new QueryBuilder($this->Connect());

        $req = $db->type('insert')
                            ->from('comments')
                            ->insert('comments, user_id, chapter_id')
                            ->values(':comments, :userId, :chapterId');

        $req->bind('comments', $comments->comments());
        $req->bind('userId', $comments->userId());
        $req->bind('chapterId', $comments->chapterId());
        $req->exec();
    }


    /**
     * Retourne le nombre de commentaires total reportés
     * @return int
     */
    public function countAllReport()
    {
        $db = new QueryBuilder($this->Connect());

        $req = $db->type('select')
                            ->select('*')
                            ->from('comments')
                            ->where('report = 1');

        return $req->rowCount();
    }


    /**
     * @param $idChapter
     * @return int
     */

    public function countReportByChapter($idChapter)
    {
        $db = $this->Connect();

        $req = $db->prepare('SELECT * FROM comments WHERE chapter_id = :idChapter AND report = 1');
        $req->bindValue('idChapter', $idChapter, PDO::PARAM_INT);
        $req->execute();

        return $req->rowCount();
    }

    /**
     * Retourne les reports par chapitre
     * @return mixed
     */
    public function getReportByChapter()
    {
        $db = new QueryBuilder($this->Connect());

        $select = [
            'ch.id_chapter' => 'idChapter',
            'comm.chapter_id' => 'chapterId',
            'comm.id_comments' => 'idComments',
            'title' => 'title',
            'comm.comments' => 'comments',
            'comm.user_id' => 'userId',
            'comm.report' => 'report',
            'u.username' => 'username',
            'u.id_user' => 'idUser',
        ];

        $req = $db->type('select')
                            ->select($select)
                            ->from('user AS u, comments AS comm')
                            ->innerJoin('chapter AS ch')
                            ->where('ch.id_chapter = comm.chapter_id')
                            ->andWhere('comm.report = 1')
                            ->andWhere('u.id_user = comm.user_id')
                            ->orderBy('comm.chapter_id', 'ASC');

        $result = $req->fetchAll();

        foreach ($result as $data)
        {
            $comment = $this->buildComments($data);
            $this->dataReport[] = $comment;
        }
        return $this->dataReport;
    }

    /**
     * Retourne le commentaire reporté par user
     * @param $idComments
     * @return mixed
     */
    public function getReportComment($idComments)
    {
        $db = new QueryBuilder($this->Connect());

        $select = [
           'id_comments' => 'idComments',
           'comments' => 'comments',
           'report' => 'report',
           'user_id' => 'userId',
           'chapter_id' => 'chapterId',
           'u.username' => 'username',
           'u.id_user' => 'idUser',
        ];

        $req = $db->type('select')
                            ->select($select)
                            ->from('comments')
                            ->andFrom('user AS u')
                            ->where('id_comments = :idComm')
                            ->andWhere('report = 1')
                            ->andWhere('user_id = id_user');

        $req->bind(':idComm', $idComments);

        $result = $req->fetchAll();

        foreach($result as $data)
        {
            $report = $this->buildComments($data);
            $this->dataCommReport[] = $report;
        }
        return $this->dataCommReport;
    }

    public function updateComment(Comments $comments)
    {
        $db = new QueryBuilder($this->Connect());

        $req = $db->type('update')
                            ->from('comments')
                            ->andFrom('user as u')
                            ->values('id_comments = :idComments , comments = :comments, report = :report, user_id = :userId, chapter_id = :chapterId,  u.username = :username')
                            ->where('id_comments = :idComments');

        $req->bind(':idComments', $comments->idComments());
        $req->bind(':comments', $comments->comments());
        $req->bind(':report', $comments->report());
        $req->bind(':userId', $comments->userId());
        $req->bind(':username', $comments->username());
        $req->bind(':chapterId', $comments->chapterId());

        $req->exec();
    }

    public function buildComments(array $data)
    {
        $model = new Comments();

        $model->setIdComments($data['idComments']);
        $model->setComments($data['comments']);
        $model->setReport($data['report']);
        $model->setChapterId($data['chapterId']);
        $model->setUserId($data['userId']);
        $model->setUsername($data['username']);

        return $model;
    }
}