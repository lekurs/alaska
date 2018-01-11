<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 12/11/2017
 * Time: 14:05
 */

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
                    <h3>Messages signalés</h3>
                    <table class="admin-comments-table">
                        <thead>
                        <tr>
                            <th class="admin-number-comment-table">Chapitre</th>
                            <th class="admin-comment">Message</th>
                            <th class="admin-comment-update">Modif</th>
                            <th class="admin-comment-delete">Suppr</th>
                        </tr>
                        </thead>
                    <?php
                        foreach ($report as $reports) :
                        ?>
                            <tbody>
                            <tr class="inter-chapter-table">
                                <td class="admin-number-comment-table"><?= $reports->chapterId(); ?></td>
                                <td class="admin-comment"><?= $reports->comments() ;?></td>
                                <td class="admin-comment-update"><a href="report/<?= $reports->idComments(); ?>"><i class="fa fa-pencil popin-comment"></i></a></td>
                                <td class="admin-comment-delete"><a href="delreport/<?= $reports->idComments();?>"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            </tbody>
                        <?php
                    endforeach;
                    ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>