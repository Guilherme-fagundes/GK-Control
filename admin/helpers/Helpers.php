<?php


class Helpers
{
    private $getUri;
    private $title;

    public function __construct($param)
    {
        $this->getUri = $param;

        switch ($this->getUri) {
            case 'usuarios/perfil':
                $this->title = "GK Control | Meu perfil";
                break;
            case "configuracoes/todas-configuracoes":
                $this->title = "GK Control | Todas configurações";
                break;

            case "usuarios/index":
                $this->title = "GK Control | Todos os usuários";
                break;
            case "usuarios/novo":
                $this->title = "GK Control | Cadastrar novo usuário";
                break;
            case "categoria/index":
                $this->title = "GK Control | Categorias";
                break;
            case "categoria/nova":
                $this->title = "GK Control | Nova Categoria";
                break;

            default:
                $this->title = 'GK Control | Dahboard';
                break;

        }
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}