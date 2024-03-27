<?php


class Dessert
{
    private int $dessert_id;
    private int $menu_id;
    private int $dessert_name;
    private int $dessert_desc;

    private $dsn;

    public function __construct($dsn)
    {
        $this->dsn = $dsn;
    }

    public function setDessert(int $dessert_name, int $dessert_desc): void
    {
        $this->dessert_name = $dessert_name;
        $this->dessert_desc = $dessert_desc;
    }

    public function getDessertInputs(): array
    {
        $dessert = [
            'dessertName'   => $this->dessert_name,
            'dessertDesc'   => $this->dessert_desc,
        ];

        return $dessert;
    }

    public function registerDessert($menuId, array $dessertDatas): void
    {
        $query = "INSERT INTO desserts(menu_id, dessert_name, dessert_desc) VALUES (
            :menuid,
            :dessertname,
            :dessertdesc
        )";
        $this->dsn->query($query, ['menuid' => $menuId, 'dessertname' => $dessertDatas['dessertName'], 'dessertdesc' => $dessertDatas['dessertDesc']]);
    }

    public function getDesserts($menuId)
    {
        $query = "SELECT * FROM desserts WHERE menu_id = $menuId";
        return $this->dsn->query($query);
    }
}
