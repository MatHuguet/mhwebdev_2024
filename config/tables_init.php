<?php

return [
  'sql_tables' => [
    'users'     => "CREATE TABLE if not exists `users` (
            `user_id` VARCHAR(255) PRIMARY KEY,
            `user_email` VARCHAR(255) NOT NULL,
            `user_password` VARCHAR(255) NOT NULL,
            `user_firstname` VARCHAR(255),
            `user_lastname` VARCHAR(255),
            `is_pseudo` TINYINT(1) NOT NULL,
            `is_anonyme` TINYINT(1) NOT NULL,
            `user_pseudo` VARCHAR(255)
          )",

    'menus'   => "CREATE TABLE if not exists `menus` (
            `menu_id` INT PRIMARY KEY,
            `titles_colors` VARCHAR(7),
            `texts_colors` VARCHAR(7)

)",

    'entrees'   => "CREATE TABLE if not exists `entrees` (
            `entree_id` INT PRIMARY KEY,
            `menu_id` INT,
            `entree_name` VARCHAR(255) NOT NULL,
            `entree_desc` TEXT NOT NULL,
            FOREIGN KEY (menu_id) REFERENCES menus(menu_id)
          )",

    'plats'     => "CREATE TABLE if not exists `plats` (
            `plat_id` INT PRIMARY KEY,
            `menu_id` INT,
            `plat_name` VARCHAR(255) NOT NULL,
            `plat_desc` TEXT NOT NULL,
            FOREIGN KEY (menu_id) REFERENCES menus(menu_id)
          )",

    'desserts'    => "CREATE TABLE if not exists `desserts` (
            `dessert_id` INT PRIMARY KEY,
            `menu_id` INT,
            `dessert_name` VARCHAR(255) NOT NULL,
            `dessert_desc` TEXT NOT NULL,
            FOREIGN KEY (menu_id) REFERENCES menus(menu_id)
          )",


    'restaurants_types' => "CREATE TABLE if not exists `restaurants_types` (
            `type_id` INT PRIMARY KEY,
            `type_name` VARCHAR(255) NOT NULL,
            `type_img_url` VARCHAR(255) NOT NULL
          )",

    'restaurants_colors'    => "CREATE TABLE if not exists `restaurants_colors` (
            `restaurant_palette_id` INT PRIMARY KEY,
            `main_color` VARCHAR(7) NOT NULL,
            `second_color` VARCHAR(7) NOT NULL,
            `brand_color` VARCHAR(7) NOT NULL,
            `moulures_color` VARCHAR(7) NOT NULL,
            `borders_moulures_color` VARCHAR(7) NOT NULL,
            `door_color` VARCHAR(7) NOT NULL,
            `door_second_color` VARCHAR(7) NOT NULL,
            `poignee_color` VARCHAR(7) NOT NULL,
            `name_font_color` VARCHAR(7) NOT NULL,
            `welcome_text_color` VARCHAR(7) NOT NULL
)",

    'users_restaurants' => "CREATE TABLE if not exists `users_restaurants` (
            `restaurant_id` VARCHAR(255) PRIMARY KEY,
            `restaurant_name` VARCHAR(255) NOT NULL,
            `restaurant_type` INT,
            `menu` INT,
            `restaurant_colors` INT,
            `created_by` VARCHAR(255),
            `created_at` DATE NOT NULL,
            `welcome_text` TEXT NOT NULL,
            FOREIGN KEY (restaurant_type) REFERENCES restaurants_types(type_id),
            FOREIGN KEY (menu) REFERENCES menus(menu_id),
            FOREIGN KEY (restaurant_colors) REFERENCES restaurants_colors(restaurant_palette_id),
            FOREIGN KEY (created_by) REFERENCES users(user_id)
          )"


  ],

  'sql_rows'  => [],
];
