<div class="item" style="margin-bottom: 1em;">
    <div class="item-header" style="display: flex; justify-content: space-between; align-items: center;">
        <div class="header-desc">
            <h2 class="font-weight-normal">Nova categoria</h2>
            <p style="font-size: .8em; margin: 5px 0;"><small>Dashboard &raquo; categorias &raquo; nova</small></p>

        </div>
        <div class="header-item-nav">
            <a href="painel.php?gk=categoria/index" class="btn btn-danger btn-sm btn-border-3">Voltar</a>

        </div>

    </div>

</div>

<div class="item">
    <div class="item-content user-item-content">

        <form method="post" class="formNewCategory">
            <div class="dv-input">
                <input class="gk-input" name="category_title" placeholder="Título da categoria"/>
            </div>
            <div class="dv-input">
                <textarea rows="10" name="category_desc" placeholder="Descrição da categoria" style="width: 100%; border: none; padding: 10px 10px; outline: 1px solid rgba(0,0,0,0.1)"></textarea>
            </div>
            <div class="dv-input">
                <select class="gk-select" name="category_session">
                    <option selected="selected" value="NULL">SELECIONE UMA CATEGORIA OU SESSÃO</option>
                    <?php
                    $readCat = new \database\Read();
                    $readCat->all('categories');
                    foreach ($readCat->getResult() as $resCat):
                    ?>
                    <option value="<?=$resCat->category_id;?>"><?=$resCat->category_title;?></option>
                    <?php
                    endforeach;
                    ?>

                </select>
            </div>
            <input type="submit" value="Cadastrar" class="btn btn-success btn-sm btn-border-3">

        </form>

    </div>

</div>