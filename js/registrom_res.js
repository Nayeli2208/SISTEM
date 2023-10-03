$('#guardar').click(function () {
    var validity = this.form.checkValidity();
//validacion de los datos 
    if (validity) {
		var  t= $('#t').val();
		var  d= $('#d').val();
		var  c= $('#c').val();
		var  sm= $('#sm').val();
		var  rc= $('#rc').val();
        var  ob= $('#ob').val();

        event.preventDefault();
//uso de jquery ajax
		$.ajax({
			url: '../php/registrarres.php',//direccion de datos 
			type: 'POST',//uso del metodo post
			dataType: 'json',
			data: {t: t,d: d,c: c,sm: sm,rc: rc,ob: ob},
			success: function (html) {
                alert("Se registro correctamente")
            },
		})
	}
})

var boton=document.getElementById('agregar');//accion del boton
var lista=document.getElementById('lista');
var data=[];
var cant=0;
boton.addEventListener("click",agregar);
function agregar(){
	var t=document.getElementById('t').value;
	var d=document.getElementById('d').value;
	var c=document.getElementById('c').value;
	var sm=document.getElementById('sm').value;
	var rc=document.getElementById('rc').value;
	var ob=document.getElementById('ob').value; 

	data.push(
		{
			"id":cant,
			"t":t,
			"d":d,
			"c":c,
			"sm":sm,
			"rc":rc,
			"ob":ob,
		}
	);
	var id_row='row'+cant;
	var fila='<tr id='+id_row+'><td>'
	+t+'</td><td>'+d+'</td><td>'+c+'</td><td>'+sm+'</td><td>'+rc+'</td><td>'
	+ob+'</td><td><a href="#" class="btn btn-danger" onclick="Eliminar('+cant+')";>Eliminar</a></td></tr>';

//Agregar los datos a la fila
	$("#lista").append(fila);
	$("#t").val('');
	$("#d").val('');
	$("#c").val('');
	$("#sm").val('');
	$("#rc").val('');
	$("#ob").val('');
	$("#t").focus('');
	cant++;
}
function save(){

}//fin de la accion