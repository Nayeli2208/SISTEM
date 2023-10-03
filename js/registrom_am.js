//en la accion de los datos para ingresarlos a la base de datos
$('#guardar').click(function () {
    var validity = this.form.checkValidity();

    if (validity) {
		var  t= $('#t').val();
		var  d= $('#d').val();
		var  c= $('#c').val();
		var  f= $('#f').val();
		var  nom_recibe= $('#nom_recibe').val();
        var  obs_material= $('#obs_material').val();

        event.preventDefault();
		
		$.ajax({
			url: '../php/registraram.php',
			type: 'POST',
			dataType: 'json',
			data: {t: t,d: d,c: c, f: f,nom_recibe: nom_recibe,obs_material: obs_material},
			success: function (html) {
                alert("Se registro correctamente")
            },
		})
	}
})

var boton=document.getElementById('agregar');//accion del boton
var lista=document.getElementById('lista');//inicio de la lista
var data=[];
var cant=0;
boton.addEventListener("click",agregar);
function agregar(){
	var t=document.getElementById('t').value;
	var d=document.getElementById('d').value;
	var c=document.getElementById('c').value;
	var f=document.getElementById('f').value;
	var nom_recibe=document.getElementById('nom_recibe').value;
	var obs_material=document.getElementById('obs_material').value; 

	data.push(
		{
			"id":cant,
			"t":t,
			"d":d,
			"c":c,
			"f":f,
			"nom_recibe":nom_recibe,
			"obs_material":obs_material,
		}
	);
	var id_row='row'+cant;
	var fila='<tr id='+id_row+'><td>'
	+t+'</td><td>'+d+'</td><td>'+c+'</td><td>'+f+'</td><td>'
	+nom_recibe+'</td><td>'+obs_material+'</td><td><a href="#" class="btn btn-danger" onclick="ELIMINAR('+cant+')";>ELIMINAR</a></td><tr>';

//Agregar los datos a la fila
	$("#lista").append(fila);
	$("#t").val('');
	$("#d").val('');
	$("#c").val('');
	$("#f").val('');
	$("#nom_recibe").val('');
	$("#obs_material").val('');
	$("#t").focus('');
	cant++;
}
function save(){

}
//fin de accion