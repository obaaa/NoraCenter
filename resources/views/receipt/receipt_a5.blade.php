<style type="text/css">
  @page {
    /* dimensions for the whole page */
    size: A5;

    margin: 0;
  }

  html {
    /* off-white, so body edge is visible in browser */
    background: #eee;
  }

  body {
    /* A5 dimensions */
    height: 210mm;
    width: 148.5mm;

    margin: 0;
  }

  /* fill half the height with each face */
  .face {
    height: 50%;
    width: 100%;
    position: relative;
  }

  /* the back face */
  .face-back {
    background: #f6f6f6;
  }

  /* the front face */
  .face-front {
    background: #fff;
  }

  /* an image that fills the whole of the front face */
  .face-front img {
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    width: 100%;
    height: 100%;
  }
</style>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>
<!doctype html>
<meta charset="utf-8">
<link rel="stylesheet" href="card.css">

<body>
    <div class="face face-back"></div>
    <div class="face face-front"><img src="front.png"></div>
</body>
