<?php

    header('Location: backstore_p7.php');

    $name = $_GET["name"];
    $brand = $_GET["brand"];
    $origin = $_GET["origin"];
    $category = $_GET["category"];
    $price = $_GET["price"];
    $qty = $_GET["qty"];

    $filename = "products.txt";
    $done = false;
    $line;
    if ($file = fopen($filename, "r"))
    {
        while(!feof($file) && !$done)
        {
            $line = fgets($file);
            $fields = explode("    ", $line);

            if ($fields[0] == $name)
              $done = true;
        }
    }

    $data = $name . "    " . $brand . "    " . $origin . "    " . $category . "    " . $price . "    " . $qty . "\n";

    // if done is true, the item already exists and so we will replace it ("update" it)
    if ($done == true)
    {
        $contents = file_get_contents($filename);
        $contents = str_replace($line, $data, $contents);
        file_put_contents($filename, $contents);
    }
    else
    {
        fclose($file);

        $file = fopen($filename, "a+");
        fwrite($file, $data);
    }

    fclose($file);
?>
