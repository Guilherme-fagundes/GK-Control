<div class="item" style="margin-bottom: 1em;">
    <div class="item-header" style="display: flex; justify-content: space-between; align-items: center;">
        <div class="header-desc">
            <h2 class="font-weight-normal">movimentações financeiras</h2>
            <p style="font-size: .8em; margin: 5px 0;"><small>Dashboard &raquo; financeiro</small></p>

        </div>
        <div class="header-item-nav">
            <a href="#" class="btn btn-warning btn-sm btn-border-3" id="despesa">Despesas</a>
            <a href="#" class="btn btn-success btn-sm btn-border-3" id="receita">Receitas</a>

        </div>


    </div>

</div>

<div class="item" id="despesas">
    <div class="despesasNav">
        <a href="#" class="btn btn-primary">Despesas fixas</a>
        <a href="#" class="btn btn-primary">Despesas Pessoais</a>
        <a href="#" class="btn btn-primary">Despesas variais</a>


    </div>

</div>

<script>
    $(".header-item-nav a").click(function (e){
        e.preventDefault();
        var itemNav = this;
        var target = $(this).attr('id');

        switch (target){
            case 'despesa':


                if (!$(this).hasClass('active')){
                    $(this).addClass('active');
                    $(".item#despesas").fadeIn(500);
                }else{
                    $(this).removeClass('active');
                    $(".item#despesas").fadeOut(500);
                }
                break;
        }

    });
</script>