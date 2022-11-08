
<!DOCTYPE html>
<html dir="rtl">
<head>

        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <style type="text/css">
            @font-face {
  font-family: myFirstFont;
  src: url(quran.ttf);
}
            #audioaya{
                

                font-family:myFirstFont ;
                text-align: center;
                font-size: 30px;
                color:white;
                

            }
            body{
               
                margin: 0;
                background-color:black;
                
                background-image: url("https://c1.wallpaperflare.com/preview/660/194/574/cami-minaret-istanbul-islam.jpg");
                background-size: cover 100hv;
                background-repeat: no-repeat;
                background-position: center;
  
            }
            
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;
}

.content {
  position: fixed;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
}

#myBtn {
  width: 200px;
  font-size: 18px;
  padding: 10px;
  border: none;
 opacity: 0%;
 
  cursor: pointer;
}

#myBtn:hover {
  background: #ddd;
  color: black;
}
audio::-webkit-media-controls-play-button {
  background-color: black;

 
}
audio { opacity: 0.0009;}
h1{
    color:white;
    text-align:center;
    font-family:myFirstFont ;
}
#logo{
float:right;
}
#audioaya {
    color:white;
    text-align:center;
}
#eng{
  text-align: center;
   direction: ltr;
   color: white;
}
#text{
  position: fixed;
  
  
  bottom: 50%;
  width: 100%;
}



        </style></head><body><div id="pg">
            
        <button id="myBtn" onclick="play()"><img id="logo" src="https://quranmo.com/images/qmo-logo-white.png" ></button>
        

<div class="content" id="content">

<?php
if(isset($_GET['ID'])){

require("connect.php");
$ID = $_GET["ID"];

?>
<?php
   $ID2=$ID+1;
$sql="SELECT *
       
FROM   sour S,en_sahih E WHERE
 S.id='$ID2' and E.index=S.id GROUP BY S.id  
;";
$result = $connection->query($sql);
if ($result->num_rows > 0) {
echo'<audio controls id="video" width="1" height="1" autoplay >
    <source src="https://everyayah.com/data/Abdurrahmaan_As-Sudais_192kbps/';
while($row = $result->fetch_assoc()) {
    

$variable=$row["sura_no"];
$variable2=$row["aya_no"];





      
            

            echo sprintf("%'03d", $variable);
echo sprintf("%'03d", $variable2);
echo'.mp3" />
</audio>';



                 echo"<div id='text'>";
                 echo"<h1>سورة ".$row["sura_name_ar"]."</h1>";
                echo"<p id=audioaya>".$row["aya_text"]."</p>";
                echo"<p id=eng>".$row["text"]."</p></div>";
                

        }





        
       
     }else{


       echo "error";
        
       
     }
    
?>


 <button id="myBtn" onclick="myFunction()"></button>
</div>

<script>
var video = document.getElementById("myVideo");
var btn = document.getElementById("myBtn");

function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = "Pause";
  } else {
    video.pause();
    btn.innerHTML = "Play";
  }
}
</script>
    
 

<script type='text/javascript'>
    document.getElementById('video').addEventListener('ended',myHandler,false);
    function myHandler(e) {
        
        window.location = 'chapter.php?ID=<?php echo($ID2); ?>';
        
    }
</script>

<script>
      function play() {
        var audio = document.getElementById("video");
        audio.play();
      }
    </script>

<br>
<br>
<br>
</div>
</div></div></div></div>
</body></div>


</html>
<?php

  
 }else{include"sour.php";}?>