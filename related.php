<?php
function getrelated($para)
{
  $para=$para-1;
  $eventname=array("Coding","Debate","Entertainment Quiz","Gaming"," IT Quiz","Kannadinga","Movie Making","Photography","Star of Impulse","Tech Ads","Treasure Hunt","Web Designing");
  $eventlink=array('coding.php',"debate.php","entertainmentQuiz.php","gaming.php","itQuiz.php","kannada.php","movie.php","photography.php","si.php","techAds.php","treasureHunt.php","webdesign.php");
  $imagelink=array('images/logo/coding.png',"images/logo/debate.jpg","images/dpool.png","images/logo/gaming.png","images/logo/it.png","images/logo/kn.png","images/logo/mm.png","images/logo/photo.png","images/logo/si.png","images/logo/ta.png","images/logo/tr.png","images/spider.png");
do{
$r1=rand(0,11);
}while($r1==$para);
do {
  $r2=rand(0,11);
} while ($r1 == $r2 || $para==$r2);
do {
  $r3=rand(0,11);
} while ($r1 == $r3 || $r2==$r3 ||$para==$r3);
do {
  $r4=rand(0,11);
} while ($r1 == $r4 || $r2==$r4|| $r4==$r3 ||$para==$r4);
//echo $r1." ".$r2." ".$r3." ".$r4."<br/>";
//echo $eventname[$r1]."<br/>".$eventname[$r2]."<br/>".$eventname[$r3]."<br/>".$eventname[$r4]."<br/>";
?>
<div class="col-sm-3 col-xs-6">
  <div class ="imageBox">
    <a href="<?php echo $eventlink[$r1];?>">
        <img class="img-responsive img-hover img-related" src="<?php echo $imagelink[$r1];?>"  style=" width: 500px; height:250px;"alt="">
<div class="textBox"><h1><?php echo $eventname[$r1];?> </h1></div>
</div>

    </a>
</div>

<div class="col-sm-3 col-xs-6">
  <div class ="imageBox">
    <a href="<?php echo $eventlink[$r2];?>">
        <img class="img-responsive img-hover img-related" src="<?php echo $imagelink[$r2];?>"  style=" width: 500px; height:250px;"alt="">
<div class="textBox"><h1><?php echo $eventname[$r2];?> </h1></div>
</div>

    </a>
</div>
<div class="col-sm-3 col-xs-6">
  <div class ="imageBox">
    <a href="<?php echo $eventlink[$r3];?>">
        <img class="img-responsive img-hover img-related" src="<?php echo $imagelink[$r3];?>"  style=" width: 500px; height:250px;"alt="">
<div class="textBox"><h1><?php echo $eventname[$r3];?> </h1></div>
</div>

    </a>
</div>
<div class="col-sm-3 col-xs-6">
  <div class ="imageBox">
    <a href="<?php echo $eventlink[$r4];?>">
        <img class="img-responsive img-hover img-related" src="<?php echo $imagelink[$r4];?>"  style=" width: 500px; height:250px;"alt="">
<div class="textBox"><h1><?php echo $eventname[$r4];?> </h1></div>
</div>

    </a>
</div>

<?php
}
 ?>
