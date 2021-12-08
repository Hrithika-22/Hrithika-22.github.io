<!DOCTYPE html>
<html>
  <head>
    <title>Backstore - Products list</title>
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

        height: auto;
      }

      .entryProductButtons {
        width: 95%;
        float: left;
        text-align: left;
        padding-bottom: 4px;
      }

      .entryProductButtons a {
        text-decoration: none;
      }

      .entryProductButtons button {
        color: white;
        background-color: #555555;
        border: none;
        padding: 3px 6px;
        margin: 0 1px;
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
          <p><b>List of products</b><br>This section of the backstore allows you to add, edit, or delete some of the product listings.</p>
        </div>
        <div class="productButtons">
          <a href="backstore_p8.php">
            <button type="button">Add</button>
          </a>
        </div>
        <br>
        <div class="data col-11 col-s-11">
        <?php
          if ($file = fopen("products.txt", "r"))
          {
              while(!feof($file))
              {
                  $line = fgets($file);
                  if ($line == "")
                    continue;

                  $fields = explode("    ", $line);

                  print("<div class='entry'>");

                  print("<div class='image'>");
                  $img_resource = strtolower($fields[0]) . ".jpg";
                  print("<img src='$img_resource' alt='$fields[1] $fields[0]'>");
                  print("</div>");

                  print("<div class='list'>");
                  print("              <h1>$fields[0]</h1>");
                  print("              <p>Brand: $fields[1]</p>");
                  print("              <p>Category: $fields[3]</p>");
                  print("            </div>");
                  print("            <div class='amount'>");
                  print("              <b>Qty</b>");
                  print("              <p>$fields[5]</p>");
                  print("            </div>");
                  print("            <div class='entryProductButtons'>");
                  print("              <a href='backstore_p8.php?name=$fields[0]'>");
                  print("                <button type='button'>Edit</button>");
                  print("              </a>");
                  print("              <a href='deleteProd.php?name=$fields[0]'>");
                  print("                <button type='button'>Delete</button>");
                  print("              </a>");
                  print("            </div>");
                  print("          </div>");
              }

              fclose($file);
          }
        ?>
        </div>
      </div>
    </div>
    <div class="spacing"></div>
    <div class="footer">
    </div>
  </body>
</html>
