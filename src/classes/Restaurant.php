<?php

class Restaurant
{
    private string $restaurantId;
    private int $restaurantType;
    private string $createdBy;


    private $dsn;

    public function __construct($dsn)
    {
        $this->dsn = $dsn;
    }

    public function setRestaurant(array $restaurantDatas = []): void
    {
        $this->restaurantId   = $restaurantDatas['id'];
        $this->restaurantType   = $restaurantDatas['type'];
        $this->createdBy        = $restaurantDatas['userid'];
    }

    public function getRestaurantObject(): array
    {
        $restaurantDatas['id'] = $this->restaurantId;
        $restaurantDatas['type'] = $this->restaurantType;
        $restaurantDatas['userid'] = $this->createdBy;

        return $restaurantDatas;
    }

    public function createRestaurant(array $restaurantDatas)
    {
        $query = "INSERT INTO users_restaurants(restaurant_id, restaurant_type, created_by) VALUES (
            :id,
            :type,
            :createdby
            )";

        $conn = $this->dsn;
        $conn->query($query, [
            'id'        => $restaurantDatas['id'],
            'type'      => $restaurantDatas['type'],
            'createdby' => $restaurantDatas['userid']
        ]);
    }

    public function getRestaurant($id)
    {
        $pdo = $this->dsn;
        $query = "SELECT * FROM users_restaurants WHERE created_by = :id";
        return $pdo->query($query, ['id' => $id]);
    }

    public function getAll($id)
    {
        $query = "";
    }

    public function deleteRestaurant($restaurantId) {

    $query = "DELETE FROM users_restaurants WHERE restaurant_id = :id";
    $conn = $this->dsn;
    $conn->query($query, [
                    'id' => $restaurantId
                ]);
}
}
