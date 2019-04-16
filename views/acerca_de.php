<?php require_once("../header.php");?>
<?php require_once("../navbar.php");?>
<link rel="stylesheet" href="./css/style.css">
<style>


@import url(https://fonts.googleapis.com/css?family=Raleway:400,200,300,800);
figure.snip0015 {
  font-family: 'Raleway', Arial, sans-serif;
  color: #fff;
  position: relative;
  overflow: hidden;
  margin: 10px;
  min-width: 220px;
  max-width: 330px;
  max-height: 500px;
  width: 100%;
  background: #000000;
  text-align: center;
}
figure.snip0015 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
figure.snip0015 img {
  opacity: 1;
  width: 100%;
  -webkit-transition: opacity 0.35s;
  transition: opacity 0.35s;
}
figure.snip0015 figcaption {
  position: absolute;
  bottom: 0;
  left: 0;
  padding: 11em 0em;
  width: 100%;
  height: 100%;
}
figure.snip0015 figcaption::before {
  position: absolute;
  top: 50%;
  right: 30px;
  bottom: 50%;
  left: 30px;
  border-top: 1px solid rgba(255, 255, 255, 0.8);
  border-bottom: 1px solid rgba(255, 255, 255, 0.8);
  content: '';
  opacity: 0;
  background-color: #ffffff;
  -webkit-transition: all 0.4s;
  transition: all 0.4s;
  -webkit-transition-delay: 0.6s;
  transition-delay: 0.6s;
}
figure.snip0015 h2,
figure.snip0015 p {
  
  opacity: 0;
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s,-webkit-transform 0.35s,-moz-transform 0.35s,-o-transform 0.35s,transform 0.35s;
}
figure.snip0015 h2 {
  word-spacing: -0.15em;
  font-weight: 300;
  text-transform: uppercase;
  -webkit-transform: translate3d(0%, 50%, 0);
  transform: translate3d(0%, 50%, 0);
  -webkit-transition-delay: 0.3s;
  transition-delay: 0.3s;
}
figure.snip0015 h2 span {
  font-weight: 800;
}
figure.snip0015 p {
  font-weight: 200	;
  -webkit-transition-delay: 0s;
  transition-delay: 0s;
}
figure.snip0015 a {
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  position: absolute;
  color: #ffffff;
}
figure.snip0015:hover img {
  opacity: 0.35;
}
figure.snip0015:hover figcaption h2 {
  opacity: 1;
  -webkit-transform: translate3d(0%, 0%, 0);
  transform: translate3d(0%, 0%, 0);
  -webkit-transition-delay: 0.3s;
  transition-delay: 0.3s;
}
figure.snip0015:hover figcaption p {
  opacity: 0.9;
  -webkit-transition-delay: 0.6s;
  transition-delay: 0.6s;
}
figure.snip0015:hover figcaption::before {
  background: rgba(255, 255, 255, 0);
  top: 30px;
  bottom: 30px;
  opacity: 1;
  -webkit-transition-delay: 0s;
  transition-delay: 0s;
}


/* Demo purposes only */

.clas {
 
  display: flex;
  flex-flow:row wrap;
  justify-content: center;
  align-items: center;
  margin: 0;
  height: 100%;
  
}
.texto{
  text-align: center;
  color: white;
}

</style>
<body>
<br><br>
<h2>EQUIPO DE TRABAJO</h2>
<div class="clas">
<figure class="snip0015">
	<img src="./images/1.jpg" alt="sample38"/>
	<figcaption>
		<h2 class="texto"><span>Desarrollador</span></h2>
		<p class="texto">Daniel Alberto Murillo </p>
    <p>daniel.murillo@proyectosfgk.org</p>
		<a href="#"></a>
	</figcaption>			
</figure>
<figure class="snip0015">
	<img src="./images/2.jpg" alt="sample39"/>
	<figcaption>
  <h2 class="texto"><span>Desarrollador</span></h2>
		<p class="texto">Gabriela Nathalie Menéndez</p>
    <p>gabriela.menendez@proyectosfgk.org</p>
		<a href="#"></a>
	</figcaption>			
</figure>
<figure class="snip0015">
	<img src="./images/3.jpg" alt="sample40"/>
	<figcaption>
  <h2 class="texto"><span>Desarrollador</span></h2>
		<p class="texto">Stephannie Escobar</p>
    <p>stephannie.escobar@proyectosfgk.org</p>
		<a href="#"></a>
	</figcaption>			
</figure>
</div>
</body>
</html> 
