<?php
if (isset($_GET["ID"])) {
  $file = 'thefile.xml';
  if (file_exists($file))
  {
    $products = simplexml_load_file($file);
    $found = $products->xpath('/products/product/id[.=' . $_GET["ID"] . ']/parent::*');
    $count = 0;
    foreach ($products as $item) {
      if ($item->id == $_GET["ID"])
      {
        unset($products->product[$count]);
        break;
      }
      $count++;
    }
    $products->saveXML();
    $products->asXML($file);
    header("Location: backstore_p11.php");
    exit();
  }
  else{
    echo "not found";
  }


}


?>
