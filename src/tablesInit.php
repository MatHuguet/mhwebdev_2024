<?php


    $tables_init_queries = [

    "users" => "CREATE TABLE IF NOT EXISTS users(
    id VARCHAR(255) PRIMARY KEY,
    forename VARCHAR(100) NOT NULL,
    surname VARCHAR(100) NOT NULL,
    usermail VARCHAR(100) NOT NULL,
    userpass VARCHAR(255) NOT NULL 
)",

    "dashboard" => "CREATE TABLE IF NOT EXISTS dashboard(
    dashboard_id VARCHAR(255) PRIMARY KEY,
    dashboard_owner VARCHAR(255) REFERENCES users.id
)"

];