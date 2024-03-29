<?php

session_start();

$session = new Auth($_SESSION);
$session->logout($_SESSION);
