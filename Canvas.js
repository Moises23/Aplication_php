$(document).on ("ready", configurarApp);
function configurarApp()
{
	var canvas =document.getElementById("miCanvas");
	var ctx =canvas.getContext("2d");
	canvas.width = screen .availWidth;
	dibujaFooter(canvas,ctx)
}
function dibujaFooter(canvas,contexto)
{
	contexto.fillStyle="rgba(102,204,0,0.2)";
    contexto.moveTo(0,0);
    contexto.quadraticCurveTo(0,-50 ,canvas.width -100,canvas.height -50)
    contexto.fill();
}