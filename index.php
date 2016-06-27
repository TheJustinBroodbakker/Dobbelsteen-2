<html>
    <head>
    <link rel="stylesheet" href=
    </head>
<body>
<h1>Justin Broodbakker - Klas MD1B</h1>
<style>
img {
margin-right: 50px;
margin-bottom: 50px;

}
button {
width: 1200px;
height: 50px;
background-color: black;
color: white;
}
button:hover {
background-color: black;
}
</style>
<?php
for ($i=0; $i <= 4 ; $i++) { 
$dobbel = rand(1, 6);
create_image($dobbel);
$aWorp[$i] = $dobbel;
print "<img src=$dobbel.png?".date("U").">";
}
$aScore = analyse($aWorp);//tel de ogen van de worp
pokerOrNot($aScore);//tell it like it is       
function  create_image($dobbel){
$im = @imagecreate(200, 200) or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, 80, 0, 1);   // bruin
$blue = imagecolorallocate($im, 255, 255, 1);  // geel
if ($dobbel == 1){
    imagefilledellipse($im, 100, 100, 40, 40, $blue); //4
}
else if ($dobbel == 2){
imagefilledellipse($im, 40, 40, 40, 40, $blue); //1
imagefilledellipse($im, 160, 160, 40, 40, $blue); //7
}
else if ($dobbel == 3){
imagefilledellipse($im, 40, 40, 40, 40, $blue); //1
imagefilledellipse($im, 100, 100, 40, 40, $blue); //4
imagefilledellipse($im, 160, 160, 40, 40, $blue); //7
}
else if ($dobbel == 4){
imagefilledellipse($im, 40, 40, 40, 40, $blue); //1
imagefilledellipse($im, 160, 40, 40, 40, $blue); //2
imagefilledellipse($im, 40, 160, 40, 40, $blue); //6
imagefilledellipse($im, 160, 160, 40, 40, $blue); //7
}
else if ($dobbel == 5){
imagefilledellipse($im, 40, 40, 40, 40, $blue); //1
imagefilledellipse($im, 160, 40, 40, 40, $blue); //2
imagefilledellipse($im, 100, 100, 40, 40, $blue); //4
imagefilledellipse($im, 40, 160, 40, 40, $blue); //6
imagefilledellipse($im, 160, 160, 40, 40, $blue); //7
}
else if ($dobbel == 6){
imagefilledellipse($im, 40, 40, 40, 40, $blue); //1
imagefilledellipse($im, 160, 40, 40, 40, $blue); //2
imagefilledellipse($im, 40, 100, 40, 40, $blue); //3
imagefilledellipse($im, 160, 100, 40, 40, $blue); //5
imagefilledellipse($im, 40, 160, 40, 40, $blue); //6
imagefilledellipse($im, 160, 160, 40, 40, $blue); //7
}
imagepng($im, $dobbel . ".png");
imagedestroy($im);	
}
function analyse($aWorp){
$aScore = array (0,0,0,0,0,0,0);//initialiseer de array met alle waarden op 0
for ($i = 1 ; $i <= 6 ; $i++){//outer loop
for ($j = 0 ; $j <5 ; $j++){//inner loop
if ($aWorp[$j] == $i){
$aScore[$i]++;
}}}
return $aScore; //$aScore is een lokale variabele.
//via de return krijg je de array $aScore  'buiten de functie'
}        
function pokerOrNot($aScore){
echo "<br>analyse van de werp<br>niet gesorteerd";
print_r($aScore);
rsort($aScore);
echo "<br>gesorteerd";
print_r($aScore);
echo "<br><br>";
if ($aScore[0] == 5) {echo "Je hebt poker";}
if ($aScore[0] == 4) {echo "Je hebt carre";}
if ($aScore[0] == 3) {
if ($aScore[1] == 2)echo "Je hebt full house";
else echo "Je hebt 3 of a kind";}
if ($aScore[0] == 2) {
if ($aScore[1] == 2)echo "Je hebt 2 paar";
else echo "Je hebt 1 paar";}
}
?>
<form>
<button onclick="myFunction()">Reload</button>
</form>
</body>
<script>
function myFunction() {
location.reload();
}
</script>
</html>