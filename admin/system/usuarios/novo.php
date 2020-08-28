<div class="item" style="margin-bottom: 1em;">
    <div class="item-header" style="display: flex; justify-content: space-between; align-items: center;">
        <div class="header-desc">
            <h2 class="font-weight-normal">Novo usuário</h2>
            <p style="font-size: .8em; margin: 5px 0;"><small>Dashboard &raquo; usuários &raquo; novo</small></p>

        </div>
        <div class="header-item-nav">
            <a href="painel.php?gk=usuarios/index" class="btn btn-success btn-sm btn-border-3">Voltar</a>

        </div>


    </div>

</div>
<div class="item">
    <div class="item-content">
        <form name="formNewUser" method="post">
            <article class="name" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
                <div class="dv-input">
                    <input type="text" name="adm_user_name" placeholder="Nome" class="gk-input" autocomplete="off">
                </div>
                <div class="dv-input">
                    <input type="text" name="adm_user_lastname" placeholder="Sobrenome" class="gk-input" autocomplete="off">
                </div>

            </article>
            <div class="dv-input">
                <input type="text" name="adm_user_email" placeholder="Informe o e-mail" class="gk-input" autocomplete="off">
                <p><small>Será enviado uma senha de acesso para o e-mail deste usuário</small></p>
            </div>
            <div class="dv-input">
                <select name="adm_user_level" class="gk-select">
                    <option disabled="disabled">SELECIONE O NÍVEL DE ACESSO</option>
                <?php
                $readLevel = new \database\Read();
                $readLevel->all('config_level');
                foreach ($readLevel->getResult() as $level):
                ?>
                    <option value="<?=$level->config_level?>"><?=$level->config_level?></option>
                <?php
                 endforeach;
                ?>
                </select>

            </div>
            <input type="submit" name="admNewUser" value="Cadastrar" class="btn btn-success btn-border-3">

        </form>

    </div>

</div>