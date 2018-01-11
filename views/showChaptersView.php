<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 10/11/2017
 * Time: 11:26
 */

?>

<section>
    <?php
    foreach ($chapters as $chapter) :
        ?>
        <article>
            <div class="date_pastille">
                <div class="date_pastille_contain">
                    <p><?= substr($chapter->createDate(), 0,2); ?></p>
                    <p><?= substr($chapter->createDate(), 3,3); ?></p>
                </div>
            </div>
            <div class="chapitre-conteneur">
                <h2 class="titre_chapitre"><a href="/chapter/<?=$chapter->idChapter(); ?>"><?= $chapter->title(); ?></a></h2>
                <p class="contenu_chapitre"><?= substr($chapter->chapter(), 0, 600); ?></p>
                <p class="commentaires">
                    <i class="fa fa-commenting"></i>
                    <span class="count_comment">
                        <?= $commentManager->nb_comment($chapter->idChapter()); ?>
                    </span>
                    <span> Commentaires</span>
                </p>
            </div>
        </article>
        <?php
    endforeach;
    ?>
</section>