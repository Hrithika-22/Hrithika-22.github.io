<!DOCTYPE html>
<html>
  <head>
    <title>Backstore - Add or edit a product</title>
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

      .contentForm {
        border: 1px solid gray;
        background-color: #dddddd;
        text-align: center;
        padding: 20px;
      }

      .spacing {
        width: 100%;
        clear: both;
        height: 10px;
      }

      .footer {
        display: flex;
        align-content: flex-end;
        background-color: #212121;
        color: white;
        justify-content: center;
        height: 50px;
        margin-top: auto;
      }
    </style>
  </head>
  <body>
    <div class="header">
      <div class="logo">
        <p>Food Mart</p>
      </div>
    </div>
    <div class="navAndContent">
      <div class="navbar navbar-phone col-navbar-tablet col-navbar-desktop">
        <div class="navbarInner">
          <ul>
            <li><a href="index.html">Home</a></li>
            <br><br>
            <b>Backstore</b>
            <li><a href="backstore_p7.php">Products</a></li>
            <li><a href="backstore_p11.html">Orders</a></li>
            <li><a href="userpage.html">Users</a></li>
          </ul>
        </div>
      </div>
      <div class="content-desktop content-tablet content-phone">
        <div class="topContent-phone topContent-tablet topContent-desktop">
          <h1>Backstore</h1>
          <p><b>Add or edit a product</b><br>This section of the backstore allows you to add or edit one of the product listings.</p>
        </div>

        <?php
          $name = $_GET["name"];

          if ($file = fopen("products.txt", "r"))
          {
              $done = false;
              $fields;
              while(!feof($file) && !$done)
              {
                  $line = fgets($file);
                  $fields = explode("    ", $line);

                  if ($fields[0] == $name)
                    $done = true;
              }

              $brand = $fields[1];
              $origin = $fields[2];
              $category = $fields[3];
              $price = $fields[4];
              $qty = $fields[5];

              fclose($file);
          }
        ?>

        <div class="contentForm col-9 col-s-9">
          <form action="processFormP8.php" method="get">
            <label for="name">Name of product:</label>
            <input type="text" id=name name="name" <?php print("value='$name'") ?>><br><br>
            <label for="brand">Brand:</label>
            <input type="text" id="brand" name="brand" <?php print("value='$brand'") ?>><br><br>
            <label for="origin">Origin:</label>
            <input type="text" id="origin" name="origin" <?php print("value='$origin'") ?>><br><br>
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" <?php print("value='$category'") ?>><br><br>
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" <?php print("value='$price'") ?>><br><br>
            <label for="qty">Quantity:</label>
            <input type="text" id="qty" name="qty" <?php print("value='$qty'") ?>><br><br>
            <input type="submit" value="Save">
          </form>
        </div>
      </div>
    </div>
    <div class="spacing"></div>
    <div class="footer">
    </div>
  </body>
</html>
