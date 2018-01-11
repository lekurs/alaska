<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 13/11/2017
 * Time: 11:47
 */

foreach($session->getFlashBag()->get('update_user_success', array()) as $message)
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
            <h2>Gestion des Utilisateurs</h2>
            <form action="/ajax/users/update" id="update-user" method="post">
                <input type="hidden"  id="idUser" name="idUser">
                <input type="hidden"  id="rankUser" name="rankUser">
                <table class="admin-comments-table">
                <?php
                    foreach ($users as $idRank => $user) :
                ?>
                    <thead>
                        <tr>
                            <th><?= $ranks[$idRank];?></th>
                            <th>Modif</th>
                            <th>Suppr</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                        foreach ($user as $account) :
                ?>
                            <tr class="inter-chapter-table">
                                <td class="admin-number-comment-table"><?= $account['username']; ?></td>
                                <td class="admin-comment-update">
                                        <div class="select-contain">
                                            <input type="hidden" class="hidd-id" value="<?= $account['idUser']; ?>">
                                            <div class="select">
                                                <select name="rank" class="select-rank">
                                                    <?php
                                                    foreach ($ranks as $idRanks => $rank) :
                                                    ?>
                                                    <option value="<?= $idRanks; ?>" name="opt-rank" class="option-rank" <?php if($account['idRole'] == $idRanks) {echo "selected=selected";} ?>><?= strtoupper($rank); ?></option>
                                                    <?php
                                                        endforeach;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                </td>
                                <td class="admin-comment-delete"><a href="/admin/users/del/<?= $account['idUser'];?>"><i class="fa fa-trash"></i></a></td>
                            </tr>
                <?php
                      endforeach;
                endforeach;
                    ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</section>