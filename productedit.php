<?php
  $action = "";
  if(isset($_POST["saveproduct"]))
  {
    if (isset($_POST["name"]) && isset($_POST["brand"]) && isset($_POST["category"]) && isset($_POST["inventory"]))
    {
      $file = 'thefile.xml';

      $id = $_POST["id"];
      $name = $_POST["name"];
      $brand = $_POST["brand"];
      $cat = $_POST["category"];
      $price = $_POST["price"];
      $weight = $_POST["weight"];
      $inv = $_POST["inventory"];

      $products = simplexml_load_file($file);
      $found = $products->xpath('/products/product/id[.=' . $id . ']/parent::*');

      $found[0]->shortname = $name;
      $found[0]->brand = $brand;
      $found[0]->category = $cat;
      $found[0]->inventory = $inv;
      $found[0]->price = $price;
      $found[0]->weight = $weight;

      $products->saveXML();
      $products->asXML($file);

      header("Location: backstore_p11.php");
      exit();
    }
  }
  elseif (isset($_POST["addproduct"])) {
    if (isset($_POST["name"]) && isset($_POST["brand"]) && isset($_POST["category"]) && isset($_POST["inventory"]))
    {
      $file = 'thefile.xml';
      $xml = simplexml_load_file($file);

      $id = $_POST["id"];
      $name = $_POST["name"];
      $brand = $_POST["brand"];
      $cat = $_POST["category"];
      $price = $_POST["price"];
      $weight = $_POST["weight"];
      $inv = $_POST["inventory"];
      $img = "nopicture.jpg";

      $newproduct = $xml->addChild('product');
      $newproduct->addChild('id', $id);
      $newproduct->addChild('shortname',$name);
      $newproduct->addChild('brand',$brand);
      $newproduct->addChild('category',$cat);
      $newproduct->addChild('price',$price);
      $newproduct->addChild('weight',$weight);
      $newproduct->addChild('inventory',$inv);
      $newproduct->addChild('imgpath',$img);
      $xml->saveXML();
      $xml->asXML($file);

      header("Location: backstore_p11.php");
      exit();

    }
  }
  else {
    $file = 'thefile.xml';
    $products = simplexml_load_file($file);
    $id = 0;
    foreach ($products as $product) {
      if ($id < (int)$product->id)
      {
        $id = (int)$product->id;
      }
    }
    $id++;
    $name = "";
    $brand = "";
    $category = "";
    $inventory = "";
    $price = 0.0;
    $weight = 0.0;
    $img = "nopicture.jpg";
      if(isset($_GET["ID"]))
    {
      $action = "saveproduct";
      if (file_exists($file))
      {
        $found = $products->xpath('/products/product/id[.=' . $_GET["ID"] . ']/parent::*');
        $id = $found[0]->id;
        $name = $found[0]->shortname;
        $brand = $found[0]->brand;
        $category = $found[0]->category;
        $inventory = $found[0]->inventory;
        $price = $found[0]->price;
        $weight = $found[0]->weight;
        $img = $found[0]->imgpath;
      }
      else{
        echo "not found";
      }

      $path;
    }
    elseif (isset($_POST["add"])) {
      $action = "addproduct";
    }
    else
    {
      header("Location: backstore_p11.php");
      exit();
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Backstore - Products list</title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Montserrat:wght@100&family=Sacramento&display=swap" rel="stylesheet">
    <style>
      [class*="col-"] {
        float: left;
        padding: 15px;
      }

      /* For mobile phones: */
      [class*="col-"] {
        width: 100%;
      }

      @media only screen and (max-width: 750px) {
        .navbar-phone {text-align: center;}
        .content-phone {padding: 5px;}
        .topContent-phone {margin-top: 10px;}
      }

      @media only screen and (min-width: 750px) {
        /* For tablets: */
        .col-s-1 {width: 8.33%;}
        .col-s-2 {width: 16.66%;}
        .col-s-3 {width: 25%;}
        .col-s-4 {width: 33.33%;}
        .col-s-5 {width: 41.66%;}
        .col-s-6 {width: 50%;}
        .col-s-7 {width: 58.33%;}
        .col-s-8 {width: 66.66%;}
        .col-s-9 {width: 75%;}
        .col-s-10 {width: 83.33%;}
        .col-s-11 {width: 91.66%;}
        .col-s-12 {width: 100%;}

        .content-tablet {
          margin-left: 15%;
          padding-left: 15px;
        }

        .col-navbar-tablet {width: 15%;}
        .topContent-tablet {margin-top: 100px;}
      }

      @media only screen and (min-width: 968px) {
        /* For desktop: */
        .col-1 {width: 8.33%;}
        .col-2 {width: 16.66%;}
        .col-3 {width: 25%;}
        .col-4 {width: 33.33%;}
        .col-5 {width: 41.66%;}
        .col-6 {width: 50%;}
        .col-7 {width: 58.33%;}
        .col-8 {width: 66.66%;}
        .col-9 {width: 75%;}
        .col-10 {width: 83.33%;}
        .col-11 {width: 91.66%;}
        .col-12 {width: 100%;}

        .content-desktop {
          margin-left: 15%;
          padding-left: 15px;
        }

        .col-navbar-desktop {width: 15%;}
        .topContent-desktop {margin-top: 100px;}
      }

      * {
        box-sizing: border-box;
      }

      body {
        margin: 0;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
      }

      .header {
        position: fixed;
        top: 0;
        width: 100%;
        background-color: #254441;
      }

      .logo {
	      padding: 0 30px;
	      font-size: 20px;
	      line-height: 35px;
        color: white;
      }

      .navbar {
        margin-top: 90px;
      }

      .navbarInner ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
      }

      .navbarInner li {
        background-color: rgb(14, 149, 226);
        padding: 5px;
        margin-bottom: 5px;
      }

      .navbarInner a {
        color: white;
        text-decoration: none;
      }

      .productButtons a {
        text-decoration: none;
      }

      .productButtons button {
        color: white;
        background-color: #555555;
        border: none;
        padding: 3px 6px;
        margin: 0 1px;
      }

      .data {
        border: 1px solid gray;
        padding: 15px;
        float: left;
        padding-top: 0px;
      }

      .entry {
        border-top: 1px solid gray;
        border-bottom: 1px solid gray;
        float: left;
        width: 100%;
      }

      .image {
        width: 20%;
        float: left;
      }

      .image img {
        width: 100%;
        height: 100%;
        padding: 10%;
      }

      .list {
        width: 60%;
        float: left;
        padding-left: 10px;
        padding-right: 10px;
        word-wrap: break-word;
      }

      .list h1 {
        font-size: 20px;
      }

      .amount {
        width: 20%;
        float: left;
        text-align: center;
      }

      .spacing {
        width: 100%;
        clear: both;
        height: 10px;
      }

      .footer {
        background-color: #254441;
        padding: 20px 0 20px;
        text-align: center;
      }
      .itemB{
        width: 100%;
        height: 50px;
        background-color: #d7d8d9;
      }
      .Item{
        margin-top: 15px;
        width: 10%;
        height: 20px;
        background-color: #d7d8d9;
        position: absolute;

      }
      .Qty{
        margin-top: 15px;
        width: 10%;
        height: 20px;
        background-color: #d7d8d9;
        position: absolute;
        margin-left: 62%;
      }
      .pp{
        margin: 0;
        text-align: center;
        font-size: 20px;
        font-family: 'Montserrat', sans-serif;
      }
      .btn, .deletebtn, .savebtn {
        background: rgb(14, 149, 226);
        background-image: -webkit-linear-gradient(top, rgb(14, 149, 226), #2980b9);
        background-image: -moz-linear-gradient(top, rgb(14, 149, 226), #2980b9);
        background-image: -ms-linear-gradient(top, rgb(14, 149, 226), #2980b9);
        background-image: -o-linear-gradient(top, rgb(14, 149, 226), #2980b9);
        background-image: linear-gradient(to bottom, rgb(14, 149, 226), #2980b9);
        -webkit-border-radius: 13;
        -moz-border-radius: 13;
        border-radius: 13px;
        font-family: Arial;
        color: #ffffff;
        font-size: 12px;
        padding: 10px 20px 10px 20px;
        text-decoration: none;
        border: 0;
        margin-top: 0;
        margin-left: 20px;
      }
      .btn:hover, .deletebtn:hover, .savebtn:hover {
        background: #3cb0fd;
        background-image: -webkit-linear-gradient(top, #3cb0fd, #7a0ef5);
        background-image: -moz-linear-gradient(top, #3cb0fd, #7a0ef5);
        background-image: -ms-linear-gradient(top, #3cb0fd, #7a0ef5);
        background-image: -o-linear-gradient(top, #3cb0fd, #7a0ef5);
        background-image: linear-gradient(to bottom, #3cb0fd, #7a0ef5);
        text-decoration: none;
      }
      .ppp {
        display: block;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        color: white;
      }
      .footer-link{
        color: white;
        font-family: 'Montserrat', sans-serif;
        margin: 10px 20px;
        text-decoration: none;
      }
      .footer-link:hover{
        color: black;
      }
    </style>
  </head>
  <body>
    <div class="header">
      <div class="logo">
        <p>Food World</p>
      </div>
    </div>
    <div class="navAndContent">
      <div class="navbar navbar-phone col-navbar-tablet col-navbar-desktop">
        <div class="navbarInner">
          <ul>
            <li><a href="backstore.php">Home</a></li>
            <br><br>
            <b>Backstore</b>
            <li><a href="backstore_p7.php">Products</a></li>
            <li><a href="backstore_p11.php">Orders</a></li>
            <li><a href="userpage.php">Users</a></li>
          </ul>
        </div>
      </div>
      <div class="content-desktop content-tablet content-phone">
        <div class="topContent-phone topContent-tablet topContent-desktop">
          <h1>Backstore</h1>
          <p><b>List of products</b><br>This section of the backstore allows you to add, edit, or delete some of the order listings.</p>
        </div>
        <br>
        <div class="data col-11 col-s-11">
          <div class="itemB">
            <div class="Item">
              <p class="pp">Item</p>
            </div>
            <div class="Qty">
              <p class="pp">Qty</p>
            </div>
          </div>
          <?php




            $path = str_replace("%&#38;%", "&", $img);
            $html = '<form action="productedit.php" method="POST"><div class="entry">
                    <div class="image">
                      <img src="' . $path . '">
                    </div>
                    <div class="list">
                      Name: <input text="text" name="name" value="' . $name . '">
                      <p>Brand: <input text="text" name="brand" value="' . $brand . '"></p>
                      <p>Category<input text="text" name="category" value="' . $category . '"></p>
                      <p>Price: <input text="text" name="price" value="' . $price . '"></p>
                      <p>Weight(mL): <input text="text" name="weight" value="' . $weight . '"></p>
                    </div>
                    <div class="amount">
                    <p><input text="text" name="inventory" value="' . $inventory . '"></p>
                        <input name="id" value="' . $id . '" type="hidden">
                        <input name="' . $action . '" id= "' . $id . '" class="savebtn" type="submit" value="Save">
                    </div>
                    </div></form>';
           echo $html;

          ?>
        </div>
      </div>
    </div>
    <div class="spacing"></div>
    <div class="footer">
      <p class="ppp">Contact us!</p>
      <a class="footer-link" href="https://www.linkedin.com/">LinkedIn</a>
      <a class="footer-link" href="https://twitter.com/">Twitter</a>
      <a class="footer-link" href="https://www.w3schools.com/">Website</a>
    </div>
    <!-- <script type="text/javascript" src="script.js"></script> -->
  </body>
  <?php }?>
</html>
