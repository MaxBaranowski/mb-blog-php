<?php
    $config = array(
        'db' => array(
           'server' => 'localhost',
           'username' => 'admin',
           'password' => 'admin',
           'db_name' => 'blog.blog'
            // 'server' => 'mysql.cba.pl',
            // 'username' => 'mb_blog1_php',
            // 'password' => 'core7864a63',
            // 'db_name' => 'mb_blog1_php'
        )
    );
    // Create connection
    $connection = new mysqli(
        $config['db']['server'],
        $config['db']['username'],
        $config['db']['password'],
        $config['db']['db_name']
    );
mysqli_query($connection, "SET NAMES 'utf8';");
mysqli_query($connection, "SET CHARACTER SET 'utf8';");
mysqli_query($connection, "SET SESSION collation_connection = 'utf8_general_ci';");
    // Check connection
    if ($connection->connect_error) {
       echo ("Connection failed: " . $connection->connect_error);
    }
?>