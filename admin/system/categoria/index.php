<?php

use database\Delete;
use database\Read;

?>
<div class="item" style="margin-bottom: 1em;">
    <div class="item-header" style="display: flex; justify-content: space-between; align-items: center;">
        <div class="header-desc">
            <h2 class="font-weight-normal">Todas as categorias</h2>
            <p style="font-size: .8em; margin: 5px 0;"><small>Dashboard &raquo; categorias</small></p>

        </div>
        <div class="header-item-nav">
            <a href="painel.php?gk=categoria/nova" class="btn btn-success btn-sm btn-border-3">Nova categoria</a>

        </div>

    </div>

</div>

<div class="item">
    <div class="category-item-content">
        <?php
        $catId = filter_input(INPUT_GET, 'catId', FILTER_VALIDATE_INT);
        if (isset($catId) && is_int($catId)) {
            $delete = new Delete();
            $delete->delete('categories', 'WHERE category_id = :catId', "catId={$catId}");
            if ($delete->getResult()) {
                header('location: painel.php?gk=categoria/index');

            }
        }

        $readSes = new Read;


        $readSes->find('categories', 'WHERE category_session = :catSes', "catSes=NULL");
        if ($readSes->getRowCount() >= 1) {

            foreach ($readSes->getResult() as $ses):
                ?>
                <div class="ses-box">
                <div class="ses-box-header">
                    <h2 class="font-weight-normal"><?= $ses->category_title ?></h2>
                    <div class="ses-detals">
                        <span><small style="color: #333"><i class="fas fa-clock" style="margin-right: 5px;"></i><?= date('d/m/Y H:i', strtotime($ses->created_at)) ?></small></span>
                        <span><small style="color: #333"><i class="fas fa-hourglass-half" style="margin-right: 5px;"></i><?= ($ses->updated_at ? date('d/m/Y H:i', strtotime($ses->updated_at)) : date('d/m/Y H:i', strtotime($ses->created_at))) ?></small></span>
                        <ul>

                            <li><a href="painel.php?gk=categoria/index&catId=<?= $ses->category_id; ?>" style="background-color: var(--danger)" title="Excluir"><i class="fas fa-trash"></i></a></li>
                            <li><a href="painel.php?gk=categoria/update&catId=<?= $ses->category_id ?>" style="background-color: var(--primary)" title="Editar"><i class="fas fa-edit"></i></a></li>

                        </ul>
                    </div>

                </div>

                <div class="ses-box-body">
                <?php
                $readCatParent = new Read();
                $readCatParent->find('categories', "WHERE category_session = :parent", "parent={$ses->category_id}");

                foreach ($readCatParent->getResult() as $parent):
                    ?>
                    <div class="cat-parent-box">
                        <div class="cat-parent-header" style="margin-bottom: 5px;">
                            <h3><?=$parent->category_title;?></h3>

                        </div>
                        <div class="cat-parent-body">
                            <p><small>Total de posts: (0)</small></p>

                        </div>
                        <div class="cat-parent-footer">
                            <a href="painel.php?gk=categoria/update&catId=<?=$parent->category_id;?>"><span><i class="fas fa-edit"></i></span></a>
                            <a href="painel.php?gk=categoria/index&catId=<?=$parent->category_id?>"><span><i class="fas fa-trash"></i></span></a>

                        </div>

                    </div>
                    <?php
                        endforeach;
                    ?>

                    </div>


                    </div>
                <?php
                endforeach;
            }else {
            ?>
            <div>
                <p class="message warning">Nenhuma sessão casdastrada no momento</p>

            </div>
            <?php
        }
        ?>

    </div>

</div>