<?php

class Menus
{


    private string $restaurant_id;
    private string $restaurant_name;
    private string $welcome_text;
    private string $brand_font;
    private string $brand_color;

    private $dsn;

    public function __construct($dsn)
    {
        $this->dsn = $dsn;
    }

    public function setMenu(array $brand): void
    {
        $this->restaurant_id    = $brand['restaurant_id'];
        $this->restaurant_name  = $brand['name'];
        $this->welcome_text     = $brand['welcome'];
        $this->brand_font       = $brand['brand_font'];
        $this->brand_color      = $brand['brand_color'];
    }

    public function getMenuInputs(): array
    {
        return [
            'restaurant_id' => $this->restaurant_id,
            'name'          => $this->restaurant_name,
            'welcome'       => $this->welcome_text,
            'brandfont'     => $this->brand_font,
            'brandcolor'    => $this->brand_color,
        ];
    }

    public function registerMenu(array $menuDatas): void
    {
        $query = "INSERT INTO menus(restaurant_id, restaurant_name, welcome_text, brand_font, brand_color) VALUES (
            :restaurantid,
            :name,
            :welcome,
            :brandfont,
            :brandcolor
        )";
        $conn = $this->dsn;
        $conn->query($query, [
            'restaurantid'  => $menuDatas['restaurant_id'],
            'name'          => $menuDatas['name'],
            'welcome'       => $menuDatas['welcome'],
            'brandfont'     => $menuDatas['brandfont'],
            'brandcolor'    => $menuDatas['brandcolor'],
        ]);
    }

    public function updateMenu(array $menuDatas): void
    {
        $query = "UPDATE menus
        SET restaurant_name = :name, 
            welcome_text = :welcome, 
            brand_font = :brandfont, 
            brand_color = :brandcolor
            WHERE restaurant_id = :restaurantid
        ";
        $conn = $this->dsn;
        $conn->query($query, [
            'restaurantid'  => $menuDatas['restaurant_id'],
            'name'          => $menuDatas['name'],
            'welcome'       => $menuDatas['welcome'],
            'brandfont'     => $menuDatas['brandfont'],
            'brandcolor'    => $menuDatas['brandcolor'],
        ]);
    }

    public function getMenu($restaurantId)
    {
        $query = "SELECT * FROM menus WHERE restaurant_id = :restaurantId";
        $conn = $this->dsn;
        return $conn->query($query, ['restaurantId' => $restaurantId]);
    }
}
