<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 12/11/2017
 * Time: 13:37
 */

foreach($session->getFlashBag()->get('delChapter_success', array()) as $message)
{
    echo '<div class="flash-notice_success">'.$message.'</div>';
}

?>
<section>
    <div class="menus-mobile">
        <?php
        foreach($menu as $menus) :
            ?>
            <p><a href="<?= $menus->lien(); ?>" class="menus-btn"><?= $menus->menus(); ?></a></p>
        <?php
        endforeach;
        ?>
    </div>
    <div class="admin-container">
        <div class="menus">
            <?php
                foreach($menu as $menus) :
            ?>
                <p><a href="<?= $menus->lien(); ?>" class="menus-btn"><?= $menus->menus(); ?></a></p>
            <?php
                endforeach;
            ?>
        </div>
        <div class="admin">
            <h2>Bienvenue dans l'administration du blog</h2>
            <div class="recap-admin">
                <div class="admin-chapters">
                    <h3>Vos chapitres diffusés</h3>
                    <div class="admin-chapters-post">
                        <table>
                            <thead>
                            <tr>
                                <th class="admin-title-chapter-table">Titre</th>
                                <th class="admin-resume-chapter-table">Résumé</th>
                                <th class="admin-comm-table"><i class="fa fa-commenting"></i></th>
                                <th class="admin-report-table"><i class="fa fa-commenting"></i>  <i class="fa fa-warning"></i> </th>
                                <th class="admin-chapter-update">Modif</th>
                                <th class="admin-chapter-delete">Suppr</th>
                            </tr>
                            </thead>
                            <?php
                            foreach($chapters as $chapter) :
                                ?>
                                <tbody>
                                <tr class="inter-chapter-table">
                                    <td class="admin-title-chapter-table"><?= $chapter->title(); ?></td>
                                    <td class="admin-resume-chapter-table"><?= substr($chapter->chapter(), 0, 200); ?></td>
                                    <td class="admin-comm-table"><?= $commentManager->nb_comment($chapter->idChapter());?></td>
                                    <td class="admin-report-table"><?= $commentManager->countReportByChapter($chapter->idChapter()); ?></td>
                                    <td class="admin-chapter-update"><a href="/admin/update/<?=$chapter->idChapter(); ?>" ><i class="fa fa-pencil"></i></a></td>
                                    <td class="admin-chapter-delete"><a href="/admin/del/<?= $chapter->idChapter(); ?>"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                </tbody>
                                <?php
                            endforeach;
                            ?>
                        </table>
                    </div>
                    <p>Total chapitres en ligne : <?= $countChapter; ?></p>
                    <p>Total messages signalés : <?= $countReport; ?></p>
                </div>
                <div class="admin-chapter-offline">
                    <h3>Vos chapitres à finaliser</h3>
                    <div class="admin-chapters-offline">
                        <table>
                            <thead>
                            <tr>
                                <th class="admin-title-chapter-table">Titre</th>
                                <th class="admin-resume-chapter-table">Résumé</th>
                                <th class="admin-comm-table"><i class="fa fa-commenting"></i></th>
                                <th class="admin-report-table"><i class="fa fa-commenting"></i>  <i class="fa fa-warning"></i> </th>
                                <th class="admin-chapter-update">Modif</th>
                                <th class="admin-chapter-delete">Suppr</th>
                            </tr>
                            </thead>
                            <?php
                            foreach($chapterOffline as $chapOff) :
                                ?>
                                <tbody>
                                    <tr class="inter-chapter-table">
                                        <td class="admin-title-chapter-table"><?= $chapOff->title(); ?></td>
                                        <td class="admin-resume-chapter-table"><?= substr($chapOff->chapter(), 0, 200); ?></td>
                                        <td class="admin-comm-table"><?= $commentManager->nb_comment($chapOff->idChapter());?></td>
                                        <td class="admin-report-table"><?= $commentManager->countReportByChapter($chapOff->idChapter()); ?></td>
                                        <td class="admin-chapter-update"><a href="/admin/update/<?=$chapOff->idChapter(); ?>" ><i class="fa fa-pencil"></i></a></td>
                                        <td class="admin-chapter-delete"><a href="/admin/del/<?= $chapOff->idChapter(); ?>"><i class="fa fa-trash"></i></a> </td>
                                    </tr>
                                </tbody>
                                <?php
                            endforeach;
                            ?>
                        </table>
                    </div>
                </div>
                <div class="admin-user">
                    <h3>Utilisateurs</h3>
                    <?php foreach ($lastUsers as $lastUser) :
                    ?>
                    <p>Dernier utilisateur enregistré : <?= $lastUser->username(); ?></p>
                    <?php
                    endforeach;
                    ?>
                    <p>Nombre d'utilisateurs : <?= $maxUser; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
