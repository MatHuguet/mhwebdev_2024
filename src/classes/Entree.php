<?php


class Entree
{
    private int $entree_id;
    private int $menu_id;
    private string $entree_name;
    private string $entree_desc;
    private string $entree_number;

    private $dsn;

    public function __construct($dsn)
    {
        $this->dsn = $dsn;
    }

    public function setEntree(string $entree_name, string $entree_desc, string $entree_number): void
    {
        $this->entree_name      = $entree_name;
        $this->entree_desc      = $entree_desc;
        $this->entree_number    = $entree_number;
    }

    public function getEntreeInputs(): array
    {
        $entree = [
            'entreeName'   => $this->entree_name,
            'entreeDesc'   => $this->entree_desc,
            'entreeNumber'   => $this->entree_number,
        ];

        return $entree;
    }

    public function registerEntree($menuId, array $entreeDatas): void
    {
        $query = "INSERT INTO entrees(menu_id, entree_name, entree_desc, entree_number) VALUES (
            :menuid,
            :entreename,
            :entreedesc,
            :entreenumber
        )";
        $this->dsn->query($query, 
            [
                'menuid'        => $menuId,
                'entreename'    => $entreeDatas['entreeName'], 
                'entreedesc'    => $entreeDatas['entreeDesc'], 
                'entreenumber'  => $entreeDatas['entreeNumber']
            ]);
    }

    public function updateEntree($menuId, array $entreeDatas): void
    {
        $query = "UPDATE entrees 
        SET entree_name = :entreename, 
            entree_desc = :entreedesc
            WHERE menu_id = :menuid AND entree_number = :entreenumber
        ";
        $this->dsn->query($query, ['menuid' => $menuId, 'entreename' => $entreeDatas['entreeName'], 'entreedesc' => $entreeDatas['entreeDesc'], 'entreenumber' => $entreeDatas['entreeNumber']]);
    }

    public function getEntrees($menuId)
    {
        $query = "SELECT * FROM entrees WHERE menu_id = $menuId";
        return $this->dsn->query($query);
    }

    
    public function getEntreeFromId($entreeNumber)
    {
        $query = "SELECT * FROM entrees WHERE entree_number = :entreenumber";
        return $this->dsn->query($query, [
                'entreenumber' => $entreeNumber
            ]);
    }
}
