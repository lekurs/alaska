<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 02/11/2017
 * Time: 09:09
 */

$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

?>

<section class="chapitre">
    <article class="article-contain">
            <div class="date_pastille">
                <div class="date_pastille_contain">
                    <p><?= substr($showChapter->createDate(), 0, 2); ?></p>
                    <p><?= substr($showChapter->createDate(), 3, 3); ?></p>
                </div>
            </div>
            <div class="chapitre-conteneur">
                <h2 class="titre_chapitre"><?= $showChapter->title(); ?></h2>
                <p class="contenu_chapitre"><?= $showChapter->chapter(); ?></p>
            </div>
    </article>

    <article class="commentaires">

        <h3>Commentaires (<?= $nbComment; ?>)</h3>
        <?php
        $i=1;
        foreach($comments as $comment) :
        ?>
            <div class="liste-commentaires">
                <p class="numero-comment"><?php echo $i++; ?></p>
                <p class="log-comment"><?=  ucfirst($comment->username()); ?></p>
                <p class="detail-comment"><?= htmlentities($comment->comments()); ?></p>
                <p class="warning">
                    <input type="hidden" name="report" class="report" value="<?= $comment->report(); ?>" />
                    <input type="hidden" name="chapterId" class="chapterId" value="<?= $comment->chapterId(); ?>" />
                    <input type="hidden" name="idComments" class="idComments" value="<?= $comment->idComments(); ?>" />
                    <?php
                    if($session->has('login'))
                    {
                        ?>
                        <i class="fa fa-exclamation-triangle" class="black-exclam"></i>
                        <?php
                    }
                    ?>
                </p>
            </div>
        <?php
        endforeach;
        ?>
        <?php
        if($session->has('login'))
        {
            ?>
            <div class="post-comm">
                <h3>Postez votre commentaire :</h3>
                <?= $form->form_open('post', '/postcomm/'.$idChapter); ?>
                <?= $form->input_hidden('chapterId', $idChapter, '', 'chapterId', '', false); ?>
                <?= $form->input_hidden('sessionId', $session->get('id'), '', 'sessionId', '', false); ?>
                <?= $formComment->areaComment(); ?>
                <input type="submit" value="Poster" id="post_comm_sub">
                <?= $form->form_close(); ?>
            </div>
            <?php
        }
        ?>
    </article>
</section>

