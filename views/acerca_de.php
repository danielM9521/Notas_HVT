
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
</head>
<body>

<h2>EQUIPO DE TRABAJO</h2>
<div class="cards-ali">

<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
  <img src="./images/2.jpg"  style="width:300px; height:300px">
  
    </div>
    <div class="flip-card-back">
    <h1>Desarrollador</h1>
    <p>Gabriela Menéndez</p> 
    <p>Para mayor información contactenos</p>
      <p>gabriela.menendezfgksa@sv.cds</p> 
    <p>Tel. 7281-4480</p>
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
      <p>Daniel Murillo</p> 
      <p>Para mayor información contactenos</p>
      <p>daniel.murillo@proyectosfgk.org</p> 
      <p>Tel.72083251</p>
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
      <p>Stephannie Escobar</p> 
      <p>para mayor información contactenos</p> 
      <p>stephannie.escobar@proyectosfgk.org
      <p>Tel.75660113</p>
    </div>
  </div>
</div>




</div>
</body>
</html> 
