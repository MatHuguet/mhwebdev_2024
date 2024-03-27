<?php

class Colors
{
    private string $main_color;
    private string $second_color;
    private string $brand;
    private string $moulures;
    private string $borders_moulures;
    private string $door;
    private string $door_second_color;
    private string $poignee;
    private string $name_font_color;
    private string $welcome_font_color;
    private string $menu_titles_colors;
    private string $menu_texts_colors;

    private $dsn;

    public function __construct($dsn)
    {
        $this->dsn = $dsn;
    }

    public function setColors(string $main_color, string $second_color, string $brand, string $moulures, string $borders_moulures, string $door, string $door_second_color, string $poignee, string $name_font_color, string $welcome_font_color, $menu_titles_colors, $menu_texts_colors): void
    {
        $this->main_color           = $main_color;
        $this->second_color         = $second_color;
        $this->brand                = $brand;
        $this->moulures             = $moulures;
        $this->borders_moulures     = $borders_moulures;
        $this->door                 = $door;
        $this->door_second_color    = $door_second_color;
        $this->poignee              = $poignee;
        $this->name_font_color      = $name_font_color;
        $this->welcome_font_color   = $welcome_font_color;
        $this->menu_titles_colors   = $menu_titles_colors;
        $this->menu_texts_colors   = $menu_texts_colors;
    }

    public function registerColors(array $colorsDatas): void
    {
        $query = "INSERT INTO restaurants_colors(main_color, second_color, brand_color, moulures_color, borders_moulures_color, door_color, door_second_color, poignee_color, name_font_color, welcome_text_color, menu_titles_colors, menu_texts_colors) VALUES (
            :maincolor,
            :secondcolor,
            :brand,
            :moulures,
            :bordersmoulures,
            :door,
            :doorsecondcolor,
            :poignee,
            :namefontcolor,
            :welcomefontcolor,
            :menutitlescolors,
            :menutextscolors,
        )";
        $conn = $this->dsn;
        $conn->query($query, [
            'maincolor'         => $colorsDatas['mainColor'],
            'secondcolor'       => $colorsDatas['secondColor'],
            'brand'             => $colorsDatas['brand'],
            'moulures'          => $colorsDatas['moulures'],
            'bordersmoulures'   => $colorsDatas['bordersMoulures'],
            'door'              => $colorsDatas['door'],
            'doorsecondcolor'   => $colorsDatas['doorSecondColor'],
            'poignee'           => $colorsDatas['poignee'],
            'namefontcolor'     => $colorsDatas['nameFontColor'],
            'welcomefontcolor'  => $colorsDatas['welcomeFontColor'],
            'menutitlescolors'  => $colorsDatas['menuTitlesColors'],
            'menutextscolors'   => $colorsDatas['menuTextsColors'],
        ]);
    }

    public function getColorsInputs(): array
    {
        $colorsDatas = [
            'mainColor'         => $this->main_color,
            'secondColor'       => $this->second_color,
            'brand'             => $this->brand,
            'moulures'          => $this->moulures,
            'bordersMoulures'   => $this->borders_moulures,
            'door'              => $this->door,
            'doorSecondColor'   => $this->door_second_color,
            'poignee'           => $this->poignee,
            'nameFontColor'     => $this->name_font_color,
            'welcomeTextColor'  => $this->welcome_font_color,
            'menuTitlesColors'  => $this->menu_titles_colors,
            'menuTextsColors'   => $this->menu_texts_colors,
        ];
        return $colorsDatas;
    }

    public function getColors($colorsId): array
    {
        $query = "SELECT * FROM restaurants_colors WHERE restaurant_palette_id = :restaurantColors";
        $conn = $this->dsn;
        return $conn->query($query, ['restaurantColors' => $colorsId]);
    }
}
