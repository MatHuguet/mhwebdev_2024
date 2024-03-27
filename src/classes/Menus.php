<?php

class Menus
{

    private string $brand_font;
    private string $titles_font;
    private string $texts_font;

    private $dsn;

    public function __construct($dsn)
    {
        $this->dsn = $dsn;
    }

    public function setFonts(string $brand_font, string $titles_font, string $texts_font): void
    {
        $this->brand_font   = $brand_font;
        $this->titles_font  = $titles_font;
        $this->texts_font   = $texts_font;
    }

    public function getFontsInputs(): array
    {
        $fonts = [
            'brandfont'     => $this->brand_font,
            'titlesfont'    => $this->titles_font,
            'textsfont'     => $this->texts_font,
        ];

        return $fonts;
    }

    public function registerFonts(array $menuDatas): void
    {
        $query = "INSERT INTO menus(brand_font, titles_font, texts_font) VALUES (
            :brandfont,
            :titlesfont,
            :textsfont
        )";
        $conn = $this->dsn;
        $conn->query($query, [
            'brandfont'  => $menuDatas['brandfont'],
            'titlesfont' => $menuDatas['titlesfont'],
            'textsfont'  => $menuDatas['textsfont'],
        ]);
    }

    public function getFonts($menuId)
    {
        $query = "SELECT * FROM menus WHERE menu_id = :menuId";
        $conn = $this->dsn;
        return $conn->query($query, ['menuId' => $menuId]);
    }
}
