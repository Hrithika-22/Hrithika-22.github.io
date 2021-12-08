<?php
    header('Location: backstore_p7.php');

    $name = $_GET["name"];
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

        $contents = file_get_contents($filename);
        $contents = str_replace($line, '', $contents);
        file_put_contents($filename, $contents);

        fclose($file);
    }
?>
