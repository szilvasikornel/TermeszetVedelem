<?php
header("Content-type: text/css; charset: UTF-8");
?>

    /* Alap stílusok */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
        background-image: url('../images/hatter.jpg'); /* Szövetmintás háttér */
        background-size: cover;
        background-attachment: fixed;
    }

    header {
        background-color: rgba(44, 107, 47, 0.85); /* Félig átlátszó zöld */
        color: white;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: sticky;
        top: 0;
        z-index: 1000;
        width: 100%;
    }

    header .logo {
        display: flex;
        align-items: center;
    }

    header .logo img {
        width: 60px;
        height: 60px;
        margin-right: 10px;
    }

    header .logo h1 {
        font-size: 24px;
    }

    nav ul {
        list-style: none;
        display: flex;
        gap: 15px;
    }

    nav ul li {
        position: relative;
    }

    nav a {
        color: white;
        text-decoration: none;
        font-size: 18px;
        padding: 5px 10px;
        display: block;
    }

    nav a:hover {
        background-color: #1f4f1c;
    }

    .container {
        display: flex;
        justify-content: center; /* Középre igazítás vízszintesen */
        padding: 20px;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #2c6b2f;
        min-width: 160px;
        z-index: 1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown-content a {
        padding: 10px;
        text-align: left;
    }

    .felkover{
        font-weight: bold;
    }

    /* Footer stílus */
    footer {
        background-color: rgb(44, 107, 47);
        color: white;
        text-align: center;
        padding: 15px;
        bottom: 0;
        width: 100%;
        margin-top: 30px;
        position: fixed;
        font-weight: bold;
    }
