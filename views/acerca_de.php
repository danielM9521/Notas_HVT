<?php require_once("../header.php");?>
<style>


body {
  font-family: Arial, Helvetica, sans-serif;
}

.flip-card {
  
  margin: 0 auto;
  margin-top: 40px;
  background-color: transparent;
  width: 300px;
  height: 300px;
  perspective: 1000px;

}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: white;
  color: black;
  z-index: 2;
}

.flip-card-back {
  background-color: #34495E;
  color: white;
  transform: rotateY(180deg);
  z-index: 1;
}
.cards-ali{
  display:flex;
  flex-flow:row wrap;
  justify-content:center;
}
h2{
  text-align: center;
  color: #0A7D8B;
}

</style>
<body>
<?php require_once("../navbar.php");?>
<link rel="stylesheet" href="./css/style.css">
<h2>EQUIPO DE TRABAJO</h2>
<div class="cards-ali">

<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
  <img src="./images/2.jpg"  style="width:300px; height:300px">
  
    </div>
    <div class="flip-card-back">
    <h1>Desarrollador</h1>
    <h4>Gabriela Menéndez</h4> 
    <p class="nombrescard">Para mayor información contactenos</p>
      <p class="nombrescard">gabriela.menendezfgksa@sv.cds</p> 
    <p class="nombrescard">Tel. 7281-4480</p>
    </div>
  </div>
</div>
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
  <img src="./images/1.jpg"  style="width:300px; height:300px">
  
    </div>
    <div class="flip-card-back">
    <h1>Desarrollador</h1>
      <h4>Daniel Murillo</h4> 
      <p class="nombrescard">Para mayor información contactenos</p>
      <p class="nombrescard">daniel.murillo@proyectosfgk.org</p> 
      <p class="nombrescard">Tel.72083251</p>
    </div>
  </div>
</div>
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
  <img src="./images/3.jpg"  style="width:300px; height:300px">
  
    </div>
    <div class="flip-card-back">
      <h1>Desarrollador</h1>
      <h4>Stephannie Escobar</h4> 
      <p class="nombrescard">Para mayor información contactenos</p> 
      <p class="nombrescard">stephannie.escobar@proyectosfgk.org
      <p class="nombrescard">Tel.75660113</p>
    </div>
  </div>
</div>




</div>
</body>
</html> 
