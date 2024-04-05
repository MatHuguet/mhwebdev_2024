<?php


class Dessert
{
    private int $dessert_id;
    private int $menu_id;
    private string $dessert_name;
    private string $dessert_desc;
    private string $dessert_number;

    private $dsn;

    public function __construct($dsn)
    {
        $this->dsn = $dsn;
    }

    public function setDessert(string $dessert_name, string $dessert_desc, string $dessert_number): void
    {
        $this->dessert_name = $dessert_name;
        $this->dessert_desc = $dessert_desc;
        $this->dessert_number = $dessert_number;
    }

    public function getDessertInputs(): array
    {
        $dessert = [
            'dessertName'   => $this->dessert_name,
            'dessertDesc'   => $this->dessert_desc,
            'dessertNumber'   => $this->dessert_number,
        ];

        return $dessert;
    }

    public function registerDessert($menuId, array $dessertDatas): void
    {
        $query = "INSERT INTO desserts(menu_id, dessert_name, dessert_desc, dessert_number) VALUES (
            :menuid,
            :dessertname,
            :dessertdesc,
            :dessertnumber
        )";
        $this->dsn->query($query, ['menuid' => $menuId, 'dessertname' => $dessertDatas['dessertName'], 'dessertdesc' => $dessertDatas['dessertDesc'], 'dessertnumber' => $dessertDatas['dessertNumber']]);
    }

    public function getDesserts($menuId)
    {
        $query = "SELECT * FROM desserts WHERE menu_id = $menuId";
        return $this->dsn->query($query);
    }

    public function updateDessert($menuId, array $dessertDatas): void
    {
        $query = "UPDATE desserts 
        SET dessert_name = :dessertname, 
            dessert_desc = :dessertdesc
            WHERE menu_id = :menuid AND dessert_number = :dessertnumber
        ";
        $this->dsn->query($query, ['menuid' => $menuId, 'dessertname' => $dessertDatas['dessertName'], 'dessertdesc' => $dessertDatas['dessertDesc'], 'dessertnumber' => $dessertDatas['dessertNumber']]);
    }

    public function getDessertFromId($dessertNumber)
    {
        $query = "SELECT * FROM desserts WHERE dessert_number = :dessertnumber";
        return $this->dsn->query($query, [
                'dessertnumber' => $dessertNumber
            ]);
    }
}
