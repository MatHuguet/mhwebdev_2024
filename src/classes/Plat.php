<?php


class Plat
{
    private int $plat_id;
    private int $menu_id;
    private int $plat_name;
    private int $plat_desc;

    private $dsn;

    public function __construct($dsn)
    {
        $this->dsn = $dsn;
    }

    public function setPlat(int $plat_name, int $plat_desc): void
    {
        $this->plat_name = $plat_name;
        $this->plat_desc = $plat_desc;
    }

    public function getPlatInputs(): array
    {
        $plat = [
            'platName'   => $this->plat_name,
            'platDesc'   => $this->plat_desc,
        ];

        return $plat;
    }

    public function registerPlat($menuId, array $platDatas): void
    {
        $query = "INSERT INTO plats(menu_id, plat_name, plat_desc) VALUES (
            :menuid,
            :platname,
            :platdesc
        )";
        $this->dsn->query($query, ['menuid' => $menuId, 'platname' => $platDatas['platName'], 'platdesc' => $platDatas['platDesc']]);
    }

    public function getPlats($menuId)
    {
        $query = "SELECT * FROM plats WHERE menu_id = $menuId";
        return $this->dsn->query($query);
    }
}
