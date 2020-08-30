<?php
$readCatId = filter_input(INPUT_GET, 'catId', FILTER_VALIDATE_INT);
if (!is_int($readCatId)){
    header('Location: painel.php?gk=categoria/index');
}
?>
<div class="item" style="margin-bottom: 1em;">
    <div class="item-header" style="display: flex; justify-content: space-between; align-items: center;">
        <div class="header-desc">
            <h2 class="font-weight-normal">Editar categoria</h2>
            <p style="font-size: .8em; margin: 5px 0;"><small>Dashboard &raquo; categorias &raquo; editar </small></p>

        </div>
        <div class="header-item-nav">
            <a href="painel.php?gk=categoria/index" class="btn btn-danger btn-sm btn-border-3">Voltar</a>

        </div>

    </div>

</div>

<div class="item">
    <div class="item-content user-item-content">

        <form method="post" class="formupdateCategory" id="updateCategory">
            <?php
            $readAtual = new \database\Read();
            $readAtual->find('categories', 'WHERE category_id = :catId', "catId={$readCatId}");
            foreach ($readAtual->getResult() as $lerCat):
            ?>
            <div class="dv-input">
                <input class="gk-input" type="hidden" name="category_id" value="<?=$lerCat->category_id;?>">

            </div>
            <div class="dv-input">
                <input class="gk-input" value="<?=$lerCat->category_title;?>" name="category_title" placeholder="Título da categoria"/>
            </div>
            <div class="dv-input">
                <textarea rows="10" name="category_desc" placeholder="Descrição da categoria" style="width: 100%; border: none; padding: 10px 10px; outline: 1px solid rgba(0,0,0,0.1)"><?=$lerCat->category_desc;?></textarea>
            </div>
            <div class="dv-input">
                <select class="gk-select" name="category_session">
                    <option selected="selected" value="NULL">SELECIONE UMA CATEGORIA OU SESSÃO</option>
                    <?php
                    $readCat = new \database\Read();
                    $readCat->find('categories', 'WHERE category_session = :findSes', "findSes=NULL");
                    foreach ($readCat->getResult() as $resCat):
                        ?>
                        <option value="<?=$resCat->category_id;?>"><?=$resCat->category_title;?></option>
                    <?php
                    endforeach;
                    ?>

                </select>
            </div>
            <?php
                endforeach;
            ?>
            <input type="submit" value="Atualizar" class="btn btn-primary btn-sm btn-border-3">

        </form>

    </div>

</div>