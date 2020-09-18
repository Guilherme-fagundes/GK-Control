<div class="item" style="margin-bottom: 1em;">
    <div class="item-header" style="display: flex; justify-content: space-between; align-items: center;">
        <div class="header-desc">
            <h2 class="font-weight-normal">Movimentações financeiras</h2>
            <p style="font-size: .8em; margin: 5px 0;"><small>Dashboard &raquo; financeiro</small></p>

        </div>
        <div class="header-item-nav">
            <a href="#" class="btn btn-warning btn-sm btn-border-3" id="despesa">Despesas</a>
            <a href="#" class="btn btn-success btn-sm btn-border-3" id="receita">Receitas</a>

        </div>


    </div>

</div>

<div class="item" id="despesas" style="margin-bottom: 1em;">
    <div class="despesasNav">
        <a href="#" >Despesas fixas</a>
        <a href="#">Despesas Pessoais</a>
        <a href="#">Despesas variais</a>
        <a href="#" id="novaDespesa">Adicionar nova despesa</a>
    </div>

</div>

<div class="item novadespesaBox" id="novaDespesaBox" style="margin-bottom: 1em;">
    <div class="novadespesa-header">
        <h3 class="font-weight-normal">Adicionar nova despesa</h3>
    </div>
    <div class="novadespesa-content">
        <form method="post">
            <div class="dv-input">
                <span><small>Descrição ou nome da despesa</small></span>
                <input class="gk-input" name="despesa-desc" type="text" placeholder="Descrição / Nome">

            </div>
            <article style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px;">
                <div class="dv-input">
                    <span><small>Valor da despesa</small></span>
                    <input name="despesa-valor" placeholder="Valor" class="gk-input">
                </div>
                <div class="dv-input">
                    <span><small>Tipo de despesa</small></span>
                    <select class="gk-select" name="despesa-tipo">
                        <option value="Fixa">Fixa</option>
                        <option value="Pessoal">Pessoal</option>
                        <option value="Variável">Variável</option>
                    </select>
                </div>
                <div class="dv-input">
                    <span><small>Data da despesa</small></span>
                    <input name="despesa-data" type="date" class="gk-input">
                </div>
            </article>
            <button class="btn btn-primary btn-border-3" type="submit">Salvar</button>
        </form>

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