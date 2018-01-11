<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 13/11/2017
 * Time: 10:13
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
            <h2>Chapitre à modifier :</h2>
            <?= $form->form_open('post', '/admin/updating'); ?>
                <?= $form->input_hidden('idChapter', $chapter->idChapter(), '', 'idChapter', '', false); ?>
                <?= $form->input_txt('title', "" , $chapter->title(), '', 'title', '', false); ?>
                <?= $form->input_area('chapitrearea', "", $chapter->chapter(), '', 'chapitrearea', false); ?>
                <div class="check">
                    <div><p>Souhaitez vous mettre en ligne ce chapitre ?</p></div>
                    <div class="contain-checkbox">
                        <label class="switch">
                            <?= $formUpdate->check_chapter(); ?>
                            <div class="slider round">
                        </label>
                    </div>
                </div>
        </div>
        <p>
            <input type="submit" value="Mettre à jour" class="sub-btn" name="update_chapter" id="reccord_chapter">
        </p>
        <?= $form->form_close(); ?>
    </div>
</section>
