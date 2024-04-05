<?php


class Plat
{
    private int $plat_id;
    private int $menu_id;
    private string $plat_name;
    private string $plat_desc;
    private string $plat_number;

    private $dsn;

    public function __construct($dsn)
    {
        $this->dsn = $dsn;
    }

    public function setPlat(string $plat_name, string $plat_desc, string $plat_number): void
    {
        $this->plat_name = $plat_name;
        $this->plat_desc = $plat_desc;
        $this->plat_number = $plat_number;
    }

    public function getPlatInputs(): array
    {
        $plat = [
            'platName'   => $this->plat_name,
            'platDesc'   => $this->plat_desc,
            'platNumber'   => $this->plat_number,
        ];

        return $plat;
    }

    public function registerPlat($menuId, array $platDatas): void
    {
        $query = "INSERT INTO plats(menu_id, plat_name, plat_desc, plat_number) VALUES (
            :menuid,
            :platname,
            :platdesc,
            :platnumber
        )";
        $this->dsn->query($query, ['menuid' => $menuId, 'platname' => $platDatas['platName'], 'platdesc' => $platDatas['platDesc'], 'platnumber' => $platDatas['platNumber']]);
    }

    public function getPlats($menuId)
    {
        $query = "SELECT * FROM plats WHERE menu_id = $menuId";
        return $this->dsn->query($query);
    }

    public function updatePlat($menuId, array $platDatas): void
    {
        $query = "UPDATE plats 
        SET plat_name = :platname, 
            plat_desc = :platdesc
            WHERE menu_id = :menuid AND plat_number = :platnumber
        ";
        $this->dsn->query($query, ['menuid' => $menuId, 'platname' => $platDatas['platName'], 'platdesc' => $platDatas['platDesc'], 'platnumber' => $platDatas['platNumber']]);
    }

    public function getPlatFromId($platNumber)
    {
        $query = "SELECT * FROM plats WHERE plat_number = :platnumber";
        return $this->dsn->query($query, [
                'platnumber' => $platNumber
            ]);
    }
}
