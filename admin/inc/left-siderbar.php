<div class="left-siderbar">
    <header class="left-siderbar-header">
        <h4 class="text-white font-weight-normal">Gk Control</h4>
        <img src="<?=SITE['base']?>/assets/boot/img/image-empty.jpg" width="100" height="100">


    </header>
    <div class="left-siderbar-content">
        <ul>
            <li><a href="painel.php">
                    <span class="icon"><i class="fas fa-desktop"></i></span>
                    <span class="title">Dashboard</span>
                </a></li>
            <li><a href="painel.php?gk=usuarios/perfil&admId=<?=$admOn->adm_user_id;?>">
                    <span class="icon"><i class="fas fa-user-alt"></i></span>
                    <span class="title">Perfil</span>
                </a></li>
            <li><a href="painel.php?gk=usuarios/index">
                    <span class="icon"><i class="fas fa-users"></i></span>
                    <span class="title">Usuários</span>
                </a></li>
            <li><a href="painel.php?gk=categoria/index">
                    <span class="icon"><i class="fas fa-book"></i></span>
                    <span class="title">Categorias</span>
                </a></li>
            <li><a href="?gk=configuracoes/todas-configuracoes">
                    <span class="icon"><i class="fas fa-cog"></i></span>
                    <span class="title">Configurações</span>
                </a></li>
        </ul>

    </div>

</div>