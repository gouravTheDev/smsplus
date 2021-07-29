<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Coming Soon!</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300&display=swap" rel="stylesheet">
</head>
<style>
body, html {
  height: 100%;
  margin: 0;
  font-family: 'Heebo', sans-serif;
}
.bgimg {
  /*background-image: url('/assets/coming.jpg');*/
  background: #000704;
  height: 100%;
  background-position: center;
  background-size: cover;
  position: relative;
  color: white;
  font-size: 25px;
}
.topleft {
  position: absolute;
  top: 0;
  left: 16px;
}
.bottomleft {
  position: absolute;
  bottom: 0;
  left: 16px;
}
.middle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}
hr {
  margin: auto;
  width: 40%;
}
@media only screen and (max-width: 600px) {
  h1{
    font-size: 0.8em;
  }
}
</style>
<body>

<div class="bgimg">
  <div class="middle">
    <img src="logo.png" style="height: 80px; margin-top: 15px; margin-bottom: 0px;">
    <h1>C O M I N G &nbsp; S O O N</h1>
    <hr>
  </div>
  <div class="bottomleft">
    <!-- <p>Some text</p> -->
  </div>
</div>
</body>
</html>
