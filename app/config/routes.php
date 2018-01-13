<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 30/11/2017
 * Time: 16:41
 */


return [
   'index' => [
       'path' =>  '/',
       'controller' => src\controllers\ChaptersController::class,
       'method' => 'GET'
   ],
    'chapter' => [
        'path' => '/chapter/:id',
        'controller' => src\controllers\ChapterController::class,
        'method' => 'GET'
    ],
    'connection' => [
        'path' => '/login',
        'controller' => src\controllers\UserController::class,
        'method' => 'POST'
    ],
    'disconnect' => [
        'path' => '/disconnect',
        'controller' => src\controllers\UserDisconnect::class,
        'method' => 'POST'
    ],
    'suscribe' => [
       'path' => '/register',
       'controller' => src\controllers\SuscribeUserController::class,
       'method' => 'POST'
    ],
    'postComment' => [
        'path' => '/postcomm/:id',
        'controller' => src\controllers\PostCommentController::class,
        'method' => 'POST'
    ],
    'admin' => [
       'path' => '/admin',
       'controller' =>  src\controllers\AdminIndexController::class,
        'method' => 'GET'
    ],
    'addChapter' => [
       'path' => '/admin/post',
       'controller' => src\controllers\AdminPostController::class,
        'method' => 'GET'
    ],
    'sendChapter' => [
       'path' => '/admin/addchapter',
       'controller' => src\controllers\AddChapterController::class,
        'method' => 'POST'
    ],
    'updateChapter' => [
        'path' => '/admin/update/:id',
        'controller' => src\controllers\UpdateChapterController::class,
        'method' => 'POST'
    ],
    'valideUpdateChapter' => [
        'path' => '/admin/updating',
        'controller' => src\controllers\UpdatingChapterController::class,
        'method' => 'POST'
    ],
    'deleteChapter' => [
       'path' => '/admin/del/:id',
       'controller' => src\controllers\AdminDeleteChapterController::class,
       'method' => 'POST'
    ],
    'adminReport' => [
        'path' => '/admin/report',
        'controller' => src\controllers\AdminReportController::class,
        'method' => 'GET'
    ],
    'adminUpdateReportComment' => [
       'path' => '/admin/report/:id',
       'controller' => src\controllers\AdminUpdateReportComment::class,
        'method' => 'GET'
    ],
    'adminUpdatingReportComment' => [
        'path' => '/admin/update/message/:id',
        'controller' => src\controllers\AdminUpdatingReportComment::class,
        'method' => 'POST',
    ],
    'adminUsers' => [
       'path' => '/admin/users',
       'controller' => src\controllers\AdminUsersController::class,
        'method' => 'GET'
    ],
    'adminDelUsers' => [
       'path' => '/admin/users/del/:id',
        'controller' => src\controllers\AdminUsersDeleteController::class,
        'method' => 'POST'
    ],
    'adminUpdateRankUser' => [
       'path' => '/ajax/users/update',
       'controller' => src\controllers\AdminUsersUpdateRankController::class,
       'method' => 'POST'
    ],
    'controle_email' => [
        'path' => '/ajax/email',
        'controller' => src\controllers\SubscribeUser::class,
        'method' => 'POST'
    ],
    'reportComment' => [
        'path' => '/ajax/report',
        'controller' => src\controllers\CommentsReport::class,
        'method' => 'POST'
    ],
    'delMention' => [
        'path' =>'/ajax/mention',
        'controller' => src\controllers\MentionsController::class,
        'method' =>'POST',
    ]
];