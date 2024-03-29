<?php

class Restaurant
{

    private string $restaurantName;
    private int $restaurantType;
    private int $restaurantMenu;
    private int $restaurantColors;
    private string $welcomeText;
    private string $createdBy;
    private string $createdAt;


    private $dsn;

    public function __construct($dsn)
    {
        $this->dsn = $dsn;
    }

    public function setRestaurant(array $restaurantDatas = []): void
    {
        $this->restaurantName   = $restaurantDatas['name'];
        $this->restaurantType   = $restaurantDatas['type'];
        $this->restaurantMenu   = $restaurantDatas['menu'];
        $this->restaurantColors = $restaurantDatas['colors'];
        $this->welcomeText      = $restaurantDatas['welcome'];
        $this->createdBy        = $restaurantDatas['userid'];
        $this->createdAt        = strtotime(date('d-m-Y'));
    }

    public function getRestaurantObject(): array
    {
        $restaurantDatas['name'] = $this->restaurantName;
        $restaurantDatas['type'] = $this->restaurantType;
        $restaurantDatas['menu'] = $this->restaurantMenu;
        $restaurantDatas['colors'] = $this->restaurantColors;
        $restaurantDatas['welcome'] = $this->welcomeText;
        $restaurantDatas['userid'] = $this->createdBy;
        $restaurantDatas['createdat'] = $this->createdAt;

        return $restaurantDatas;
    }

    public function createRestaurant(array $restaurantDatas, array $restaurantColors, array $restaurantMenu, array $entrees, array $plats, array $desserts)
    {
        $query = "";
    }
}
