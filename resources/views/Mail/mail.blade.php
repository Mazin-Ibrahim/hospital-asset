<!DOCTYPE html>
<html lang="en">
<head>
<title>IMS E-MAIL</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}
body {
  font-family: Arial, Helvetica, sans-serif;
}
/* Style the header */
header {
  background-color: #0d0440;
  padding: 10px;
  text-align: center;
  font-size: 16px;
  color: white;
}
/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}
article {
  float: left;
  padding: 20px;
  width: 100%;
  background-color: #f1f1f1;
  height: auto; 
}
section:after {
  content: "";
  display: table;
  clear: both;
}
footer {
  background-color: #0d0440;
  padding: 2px;
  text-align: center;
  color: white;
}
footer a {
  background-color: #0d0440;
  padding: 2px;
  text-align: center;
  color: white;
}
@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
}
</style>
</head>
<body>


<header>
  <h2>Assets Danger Level</h2>
</header>

<section>

  
  <article>
    <h1>Assets</h1>  
    <p>
     @foreach($assets as $ass)
           <h5>Asset Name : {{$ass->dangerLevel()}} </h5>
     @endforeach
    </p>
  
 
  </article>
</section>

<footer>
<!-- <p>Mahmud © 2019 <a href="http://medium.com/@mahmudtopu3"> Click Here</a></p>  -->
</footer>

</body>
</html>