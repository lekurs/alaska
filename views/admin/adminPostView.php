<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 13/11/2017
 * Time: 09:39
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
            <h2>Votre nouveau chapitre</h2>
            <?= $form->form_open('post', '/admin/addchapter'); ?>
<!--            <form action="index.php?action=adminpost&amp;post=ok" method="post">-->
                <?= $formPost->input_title();?>
                <?= $formPost->area_chapter(); ?>
                <div class="check">
                    <div><p>Souhaitez vous mettre en ligne ce chapitre ?</p></div>
                    <div class="contain-checkbox">
                        <label class="switch">
                            <?= $formPost->check_chapter(); ?>
                            <div class="slider round"></label>
                    </div>
                </div>
        </div>
        <?= $formPost->submit_chapter(); ?>
        <?= $form->form_close(); ?>
    </div>
    </div>
</section>
