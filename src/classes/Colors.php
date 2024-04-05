<?php

class Colors
{
    private string $restaurant_id;
    private string $main_color;
    private string $second_color;
    private string $brand;
    private string $moulures;
    private string $borders_moulures;
    private string $door;
    private string $door_second_color;
    private string $poignee;


    private $dsn;

    public function __construct($dsn)
    {
        $this->dsn = $dsn;
    }

    public function setColors(array $restaurantColors): void
    {
        $this->restaurant_id        = $restaurantColors['restaurant_id'];
        $this->main_color           = $restaurantColors['mainColor'];
        $this->second_color         = $restaurantColors['secondColor'];
        $this->brand                = $restaurantColors['brandColor'];
        $this->moulures             = $restaurantColors['mouluresColor'];
        $this->borders_moulures     = $restaurantColors['bordersMouluresColor'];
        $this->door                 = $restaurantColors['doorColor'];
        $this->door_second_color    = $restaurantColors['secondDoorColor'];
        $this->poignee              = $restaurantColors['poigneeColor'];
    }

    public function registerColors(array $colorsDatas): void
    {
        $query = "INSERT INTO restaurants_colors(restaurant_id, main_color, second_color, brand_color, moulures_color, borders_moulures_color, door_color, door_second_color, poignee_color) VALUES (
            :restaurantid,
            :maincolor,
            :secondcolor,
            :brand,
            :moulures,
            :bordersmoulures,
            :door,
            :doorsecondcolor,
            :poignee
        )";
        $conn = $this->dsn;
        $conn->query($query, [
            'restaurantid'      => $colorsDatas['restaurantId'],
            'maincolor'         => $colorsDatas['mainColor'],
            'secondcolor'       => $colorsDatas['secondColor'],
            'brand'             => $colorsDatas['brand'],
            'moulures'          => $colorsDatas['moulures'],
            'bordersmoulures'   => $colorsDatas['bordersMoulures'],
            'door'              => $colorsDatas['door'],
            'doorsecondcolor'   => $colorsDatas['doorSecondColor'],
            'poignee'           => $colorsDatas['poignee'],
        ]);
    }

    public function getColorsInputs(): array
    {
        $colorsDatas = [
            'restaurantId'      => $this->restaurant_id,
            'mainColor'         => $this->main_color,
            'secondColor'       => $this->second_color,
            'brand'             => $this->brand,
            'moulures'          => $this->moulures,
            'bordersMoulures'   => $this->borders_moulures,
            'door'              => $this->door,
            'doorSecondColor'   => $this->door_second_color,
            'poignee'           => $this->poignee,
        ];
        return $colorsDatas;
    }

    public function getColors($restId): array
    {
        $query = "SELECT * FROM restaurants_colors WHERE restaurant_id = :restid";
        $conn = $this->dsn;
        return $conn->query($query, ['restid' => $restId]);
    }

    public function updateColors($colorsDatas)
    {
        $query = "UPDATE restaurants_colors 
        SET main_color              = :maincolor, 
            second_color            = :secondcolor, 
            brand_color             = :brand, 
            moulures_color          = :moulures, 
            borders_moulures_color  = :bordersmoulures, 
            door_color              = :door, 
            door_second_color       = :doorsecondcolor, 
            poignee_color           = :poignee
            WHERE restaurant_id = :restaurantid
        ";
        $conn = $this->dsn;
        $conn->query($query, [
            'restaurantid'      => $colorsDatas['restaurantId'],
            'maincolor'         => $colorsDatas['mainColor'],
            'secondcolor'       => $colorsDatas['secondColor'],
            'brand'             => $colorsDatas['brand'],
            'moulures'          => $colorsDatas['moulures'],
            'bordersmoulures'   => $colorsDatas['bordersMoulures'],
            'door'              => $colorsDatas['door'],
            'doorsecondcolor'   => $colorsDatas['doorSecondColor'],
            'poignee'           => $colorsDatas['poignee'],
        ]);
    }
}
