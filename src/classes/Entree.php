<?php


class Entree
{
    private int $entree_id;
    private int $menu_id;
    private int $entree_name;
    private int $entree_desc;

    private $dsn;

    public function __construct($dsn)
    {
        $this->dsn = $dsn;
    }

    public function setEntree(int $entree_name, int $entree_desc): void
    {
        $this->entree_name = $entree_name;
        $this->entree_desc = $entree_desc;
    }

    public function getEntreeInputs(): array
    {
        $entree = [
            'entreeName'   => $this->entree_name,
            'entreeDesc'   => $this->entree_desc,
        ];

        return $entree;
    }

    public function registerEntree($menuId, array $entreeDatas): void
    {
        $query = "INSERT INTO entree(menu_id, entree_name, entree_desc) VALUES (
            :menuid,
            :entreename,
            :entreedesc
        )";
        $this->dsn->query($query, ['menuid' => $menuId, 'entreename' => $entreeDatas['entreeName'], 'entreedesc' => $entreeDatas['entreeDesc']]);
    }

    public function getEntrees($menuId)
    {
        $query = "SELECT * FROM entrees WHERE menu_id = $menuId";
        return $this->dsn->query($query);
    }
}
