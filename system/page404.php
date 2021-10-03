<?php

class Page404 {
  public static function generate()
  {
    echo "
    <!DOCTYPE html>
    <html>
    <head>
      <title>404 - " . APPLICATION_NAME . "</title>
    </head>
    <body style='display: flex; align-items: center; justify-content: center; background-color: honeydew;'>
      <div style='margin: auto; display: flex; flex-direction: column; align-items: center; justify-content: center; '>
        <h1 style='color: grey;'>Error 404: page is not found</h1>
        <a href='/' style='background-color: lightblue; padding: 10px; font-size: large; text-decoration: none; border-radius: 3px;'>Go to main page</a>
      </div>
    </body>
    </html>
    ";
    exit();
  }
}
