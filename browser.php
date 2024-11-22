<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body id="appin" onload="window.open('price.php', '', 'fullscreen=yes, scrollbars=no');" onclick="openFullscreen();"  onmouseover="openFullscreen();" oncontextmenu="openFullscreen()" ondrag="select()">

<h1>Fullscreen on load page</h1>

<style>
*:fullscreen, *:-webkit-full-screen, *:-moz-full-screen {
    background-color: rgba(255,255,255,0)!important;
    padding: 20px;
}

::backdrop
{
    background-color: white;
    
}
</style>
<script>
var elem = document.getElementById("appin");
function openFullscreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.webkitRequestFullscreen) { /* Safari */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE11 */
    elem.msRequestFullscreen();
  }
}
</script>

<p>Note: Internet Explorer 10 and earlier versions do not support the msRequestFullscreen() method.</p>
<p>Note: It does not work on iframes, that means, it will not work on the stackoverflow snipped. Copy and paste the code to ex. w3schools and it will work :)</p>

</body>
</html>