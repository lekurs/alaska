<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 12/11/2017
 * Time: 14:16
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
                <h3>Messages signalés</h3>
                <?php
                    foreach ($comment as $comm) :
                    ?>
                    <form action="index.php?action=adminreport&update=ok" method="post">
                        <textarea id="comments_area" name="comments_area"><?php echo $comm->comments(); ?></textarea>
                        <p><input type="submit" value="Mettre à jour" class="sub-btn"></p>
                    </form>
                <?php
                    endforeach;
                ?>
            </div>
        </div>
    </div>
</section>
