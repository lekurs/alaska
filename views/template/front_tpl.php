<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 10/11/2017
 * Time: 10:41
 */

use Symfony\Component\HttpFoundation\Session\Session;

$session = new Session();

foreach ($session->getFlashBag()->get('log_success', array()) as $message) {
    echo '<div class="flash-notice_success">'.$message.'</div>';
}

foreach($session->getFlashBag()->get('log_error', array()) as $message)
{
    echo '<div class="flash-notice_error">'.$message.'</div>';
}


foreach($session->getFlashBag()->get('add_comment', array()) as $message)
{
    echo '<div class="flash-notice_success">'.$message.'</div>';
}

foreach($session->getFlashBag()->get('violations_comment', array()) as $message)
{
    echo '<div class="flash-notice_error">'.$message. '</div>';
}

foreach($session->getFlashBag()->get('newUser_succes', array()) as $message)
{
    echo '<div class="flash-notice_success">'.$message.'</div>';
}

foreach ($session->getFlashBag()->get('newUser_badField', array()) as $message)
{
    echo '<div class="flash-notice_error">'.$message.'</div>';
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="/css/style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,700,900" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src ='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#chapitre_area',
            theme: 'modern',
            height: 300,
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'save table contextmenu directionality emoticons template paste textcolor'
            ],
            content_css: 'css/style.css',
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
        });

        tinymce.init({
            selector: '#comments_area',
            theme: 'modern',
            height: 300,
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'save table contextmenu directionality emoticons template paste textcolor'
            ],
            content_css: 'css/style.css',
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
        });
        tinymce.init({
            selector: '#chapitrearea',
            theme: 'modern',
            height: 300,
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'save table contextmenu directionality emoticons template paste textcolor'
            ],
            content_css: 'css/style.css',
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
        });
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Si icone -->
    <link rel="icon" type="image/ico" href="/images/ico-livre.ico" />
    <!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="images/velo-marqueur.png" /><!-->

    <!-- Création des metatags réseaux sociaux -->

    <!-- Metatags FB -->
    <meta property="og:title" content="Blog Jean FORTEROCHE" />
    <meta property="og:type" content="Blog Jean FORTEROCHE" />
    <meta property="og:url" content="alaska.mclwebservices.com" />
    <meta property="og:description" content="Bienvenue sur le blog de Jean FORTEROCHE - Billet simple pour l'Alaska" />
    <meta property="og:image" content="/images/header_image_2.jpg" />

    <!-- Metatag Twitter -->
    <meta name="twitter:card" content="Blog Jean FORTEROCHE" />
    <meta name="twitter:tittle" content="Blog Jean FORTEROCHE" />
    <meta name="twitter:description" content="Bienvenue sur le blog de Jean FORTEROCHE - Billet simple pour l'Alaska" />
    <title><?= $title; ?></title>
</head>
<body>
<?php
    if(!isset($_COOKIE['mention'])) {
        ?>
        <div id="legal-mention">
            <p>Nous utilisons des cookies pour personnaliser le contenu du site internet, proposer des fonctions de
                partage vers les réseaux sociaux et analyser le trafic du site internet.
                En poursuivant la navigation sur le site, vous acceptez l’utilisation des cookies. Pour plus
                d’informations et pour paramétrer les cookies, « cliquez ici »
            </p>
            <span id="check-legal">J'ai compris <i class="fa fa-check-square-o"></i></span>
        </div>
        <?php
    }
?>
    <div class="container">
        <header>
            <div class="head-contain">
                <h1 id="image-title"><a href="/"><img src="/images/header_image_2.jpg"></a></h1>
                <div class="mobile">
                    <span><i class="fa fa-bars"></i></span>
                </div>
                <div class="menu-mobile">
                    <span class="close-menu-mobile"><i class="fa fa-arrow-right"></i></span>
                    <?php
                    if($session->has('login'))
                    {
                        ?>
                            <p class="login-name"> Bienvenue à
                            <?php
                                if ($session->has('rank') && $session->get('rank') == 1 || $session->get('rank') == 3)
                                {
                            ?>
                                    <a href="/admin"><?= $session->get('login'); ?></a>
                            <?php
                                }
                                else {
                                    echo $session->get('login');
                                }
                            ?>
                            </p>
                        <?php
                        if ($session->has('rank') && $session->get('rank') == 1 || $session->get('rank') == 3)
                        {
                             if($countReport > 0) {
                                 ?>
                                 <p class="badge-comment">Vous avez
                                     <strong><?= $countReport; ?> </strong>Message<?php if ($countReport > 1) {
                                         echo "s";
                                     } ?> reporté<?php if ($countReport > 1) {
                                         echo "s";
                                     } ?>.
                                 </p>
                                 <p class="badge-comment-traitement"><a href="/admin/report" class="btn-badge-comment">Traiter
                                         le<?php if ($countReport > 1) {
                                             echo "s";
                                         } ?> message<?php if ($countReport > 1) {
                                             echo "s";
                                         } ?> reporté<?php if ($countReport > 1) {
                                             echo "s";
                                         } ?></a></p>
                                 <?php
                             }
                        else {
                            ?>
                            <p class="badge-comment">Vous n'avez pas de message reporté</p>
                    <?php
                        }
                    }
                            ?>
                            <p class="disconnect"><a href="/disconnect"><i class="fa fa-times-circle"></i></a></p>
                        <?php
                        }
                        else {
                        ?>
                        <p class="connection-mobile">Connexion</p>
                        <div id="login-mobile-form-container">
                            <?= $formMobile->form_open('post', '/login', 'login-form'); ?>
                            <p class="logo-login"><?= $formMobile->inputLogin(); ?></p>
                            <p class="logo-password"><?= $formMobile->inputPassLogin(); ?></p>
                            <p id="submit-subscribe-mobile"><?= $formMobile->inputSubmit(); ?><i
                                        class="fa fa-arrow-right"></i></p>
                            <p id="password_forget-mobile"><a href="index.php?action=forget">Mot de passe oublié ?</a></p>
                            <?= $form->form_close(); ?>
                        </div>
                        <p class="inscription-mobile">Inscription</p>
                            <div id="suscribe-mobile-form-container">
                                <?= $formMobileSubscribe->form_open('post', '/register', 'suscribe-form'); ?>
                                <div class="form">
                                    <p class="logo-email">
                                        <span class="check_ok"></span>
                                        <span class="regex-mail"></span>
                                        <span class="regex-mail-valide"></span>
                                        <?= $formMobileSubscribe->inputEmailSuscribe(); ?>
                                    </p>
                                    <p class="logo-password"><span class="regex-password"></span><?= $formMobileSubscribe->inputPassSuscribe();?></p>
                                    <p class="logo-login"><?= $formMobileSubscribe->inputTxtSuscribe(); ?></p>
                                    <p id="submit-suscribe-ko"><span class="check_ko"></span></p>
                                    <p id="submit-subscribe-mobile-ok"><?= $formMobileSubscribe->inputSubmitSuscribe(); ?><i class="fa fa-arrow-right"></i></p>
                                    <?= $form->form_close(); ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                </div>
                <div class="connexion-container">
                    <?php
                    if($session->has('login'))
                    {
                        ?>
                        <p class="login-name">Bienvenue à
                            <?php
                                 if($session->has('rank') && $session->get('rank') == 1 || $session->get('rank') == 3)
                                {
                            ?>
                                <a href="/admin"><?= $session->get('login');?></a>
                            <?php
                                }
                            else
                                {
                                    echo $session->get('login');
                                 }
                            ?>
                        </p>
                        <?php
                        if($session->has('rank') && $session->get('rank') == 1 || $session->get('rank') == 3) {

                            ?>
                            <p class="badge-comment"><a href="/admin/report" class="btn-badge-comment"><span
                                            class="nb-comments"><?= $countReport; ?></span> </a></p>
                            <?php
                        }
                            ?>
                        <p class="disconnect"><a href="/disconnect"><i class="fa fa-times-circle"></i></a></p>
                        <?php
                    }
                    else
                    {
                        ?>
                        <p class="sapin"><img src="/images/sapin.png" alt="sapin" /></p>
                        <p class="connection">Connexion</p>
                        <p class="inscription">Inscription</p>

                        <?php
                    }
                    ?>
                </div>
                <div id="login-form-container">
                    <?= $form->form_open('post', '/login', 'login-form'); ?>
                        <div class="form">
                            <p class="logo-login"><i class="fa fa-envelope" id="envelope-login"></i><?= $form->inputLogin(); ?><span class="close-form"  id="close"><i class="fa fa-times-circle fa-2x"></i></span></p>
                            <p class="logo-password"><i class="fa fa-lock"></i>'<?= $form->inputPassLogin(); ?></p>
                            <p id="submit-suscribe"><?= $form->inputSubmit(); ?><i class="fa fa-arrow-right"></i></p>
                            <p id="password_forget"><a href="index.php?action=forget">Mot de passe oublié ?</a></p>
                        </div>
                    <?= $form->form_close();?>
                </div>
                <div id="suscribe-formulaire">
                    <?= $formSuscribe->form_open('post', '/register', 'suscribe-form'); ?>
                        <div class="form">
                            <p class="logo-email"><i class="fa fa-envelope" id="envelope-suscribe"></i>
                                <span class="close-form"  id="close"><i class="fa fa-times-circle fa-2x"></i></span>
                                <span class="check_ok"></span>
                                <span class="regex-mail"></span>
                                <span class="regex-mail-valide"></span>
                                    <?= $formSuscribe->inputEmailSuscribe(); ?>
                            </p>
                            <p class="logo-password"><i class="fa fa-lock"></i><span class="regex-password"></span><?= $formSuscribe->inputPassSuscribe();?></p>
                            <p class="logo-login"><i class="fa fa-user"></i><?= $formSuscribe->inputTxtSuscribe(); ?></p>
                            <p id="submit-suscribe-ko"><span class="check_ko"></span></p>
                            <p id="submit-suscribe-ok"><?= $formSuscribe->inputSubmitSuscribe(); ?><i class="fa fa-arrow-right"></i></p>
                        </div>
                    <?= $formSuscribe->formClose(); ?>
                </div>
                <p class="name">jean forteroche</p>
        </header>


            <?= $content; ?>


        <footer>
            <div class="footer-contain">
                <div class="recap-site">
                    <p class="tree"></p>
                    <div id="author">
                        <p>Billet simple pour l'Alaska </p>
                        <p>jean forteroche</p>
                    </div>
                </div>
                <div class="social">
                    <p>Suivez moi</p>
                    <div class="social-logo">
                        <p><i class="fa fa-twitter"></i> </p>
                        <p><i class="fa fa-google-plus"></i> </p>
                        <p><i class="fa fa-facebook-official"></i></p>
                        <p><i class="fa fa-instagram"></i></p>
                    </div>
                    <div class="contact">
                        <p><i class="fa fa-envelope contact-footer"></i></p>
                        <p>contactez moi</p>
                    </div>
                    <p>Copyright</p>
                </div>
            </div>
        </footer>
    </div>
<script src="/js/jquery-min.js"></script>
<script src="/js/flash.js"></script>
<script src="/js/mobile-menus.js"></script>
<script src="/js/suscribe.js"></script>
<script src="/js/login.js"></script>
<script src="/js/check_login.js"></script>
<script src="/js/inscription.js"></script>
<script src="/js/reportAjax.js"></script>
<script src="/js/forget_password.js"></script>
<script src="/js/update-user.js"></script>
<script src="/js/mentions.js"></script>
</body>
</html>