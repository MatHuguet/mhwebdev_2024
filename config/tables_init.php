<?php

return [
  'sql_tables' => [
    'users'     => "CREATE TABLE if not exists `users` (
            `user_id` VARCHAR(255) PRIMARY KEY,
            `user_email` VARCHAR(255) NOT NULL UNIQUE,
            `user_password` VARCHAR(255) NOT NULL,
            `user_firstname` VARCHAR(255),
            `user_lastname` VARCHAR(255),
            `is_pseudo` TINYINT(1) NOT NULL,
            `is_anonyme` TINYINT(1) NOT NULL,
            `user_pseudo` VARCHAR(255)
          )",

    'users_restaurants' => "CREATE TABLE if not exists `users_restaurants` (
            `restaurant_id` VARCHAR(255) PRIMARY KEY,
            `restaurant_type` INT NOT NULL,
            `created_by` VARCHAR(255) NOT NULL,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (created_by) REFERENCES users(user_id) ON DELETE CASCADE
          )",

    'menus'   => "CREATE TABLE if not exists `menus` (
            `menu_id` INT PRIMARY KEY AUTO_INCREMENT,
            `restaurant_id` VARCHAR(255) NOT NULL,
            `restaurant_name` VARCHAR(255) NOT NULL,
            `welcome_text` TEXT NOT NULL,
            `brand_font` VARCHAR(100) NOT NULL,
            `brand_color` VARCHAR(100) NOT NULL,
            FOREIGN KEY (restaurant_id) REFERENCES users_restaurants(restaurant_id) ON DELETE CASCADE


)",

    'entrees'   => "CREATE TABLE if not exists `entrees` (
            `entree_id` INT PRIMARY KEY AUTO_INCREMENT,
            `menu_id` INT NOT NULL,
            `entree_name` VARCHAR(255) NOT NULL,
            `entree_desc` TEXT,
            `entree_number` VARCHAR(50) NOT NULL,
            FOREIGN KEY (menu_id) REFERENCES menus(menu_id) ON DELETE CASCADE
          )",

    'plats'     => "CREATE TABLE if not exists `plats` (
            `plat_id` INT PRIMARY KEY AUTO_INCREMENT,
            `menu_id` INT NOT NULL,
            `plat_name` VARCHAR(255) NOT NULL,
            `plat_desc` TEXT,
            `plat_number` VARCHAR(50) NOT NULL,
            FOREIGN KEY (menu_id) REFERENCES menus(menu_id) ON DELETE CASCADE
          )",

    'desserts'    => "CREATE TABLE if not exists `desserts` (
            `dessert_id` INT PRIMARY KEY AUTO_INCREMENT,
            `menu_id` INT NOT NULL,
            `dessert_name` VARCHAR(255) NOT NULL,
            `dessert_desc` TEXT,
            `dessert_number` VARCHAR(50) NOT NULL,
            FOREIGN KEY (menu_id) REFERENCES menus(menu_id) ON DELETE CASCADE
          )",


    'restaurants_types' => "CREATE TABLE if not exists `restaurants_types` (
            `type_id` INT PRIMARY KEY,
            `type_name` VARCHAR(255) NOT NULL,
            `type_img_url` VARCHAR(255) NOT NULL
          )",

    'restaurants_colors'    => "CREATE TABLE if not exists `restaurants_colors` (
            `restaurant_palette_id` INT PRIMARY KEY AUTO_INCREMENT,
            `restaurant_id` VARCHAR(255) NOT NULL,
            `main_color` VARCHAR(7) NOT NULL,
            `second_color` VARCHAR(7) NOT NULL,
            `brand_color` VARCHAR(7) NOT NULL,
            `moulures_color` VARCHAR(7) NOT NULL,
            `borders_moulures_color` VARCHAR(7) NOT NULL,
            `door_color` VARCHAR(7) NOT NULL,
            `door_second_color` VARCHAR(7) NOT NULL,
            `poignee_color` VARCHAR(7) NOT NULL,
            FOREIGN KEY (restaurant_id) REFERENCES users_restaurants(restaurant_id) ON DELETE CASCADE

)",




  ],

  'sql_rows'  => [
    'restaurant_types'  => "INSERT IGNORE INTO restaurants_types(type_id, type_name, type_img_url) VALUES (
      1, 'traditionnel', '/public/images/restaurant/rest_0.png'
    ),
    (
      2, 'oriental', '/public/images/restaurant/rest_1.png'
      ),
    (
      3, 'little', '/public/images/restaurant/rest_2.png'
      ),
    (
      4, 'corner', '/public/images/restaurant/rest_3.png'
      )
    "
  ],
];
