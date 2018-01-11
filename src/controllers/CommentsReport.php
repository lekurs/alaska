<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 13/11/2017
 * Time: 15:44
 */

namespace src\controllers;

use app\classes\Database;
use Symfony\Component\HttpFoundation\Request;

class CommentsReport extends Database
{
  public function __invoke()
  {
      $request = Request::createFromGlobals();
          $connect = new Database();
          $db = $connect->Connect();

          $report = htmlspecialchars($request->get('report'));
          $chapterId = htmlspecialchars($request->get('chapterId'));
          $idComments = htmlspecialchars($request->get('idComments'));

          $reportReplace = 0;

          if($report == 0)
          {
              $report = $reportReplace+1;
          }
          else
          {
              $report = $reportReplace;
          }

          $upReport = $db->prepare('UPDATE comments SET report = :report WHERE chapter_id = :chapterId AND id_comments = :idComments');
          $upReport->execute(array(
              'report' => $report,
              'chapterId' => $chapterId,
              'idComments' => $idComments
          ));

          if($upReport->rowCount() > 0)
          {
              $statut = 'success';
              $message = 'Votre message a été signalé';
              $data = array('status' => $statut, 'message' => $message);
              echo json_encode($data);
          }
    }
}