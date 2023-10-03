<?php
// Define el valor de $_SESSION['usu'] según corresponda
$_SESSION['usu'] = 1; // Ejemplo de asignación de valor

// Obtiene el ID del usuario que realiza la acción (puedes obtener esta información de tu sistema de autenticación)
$usuario_id = $_SESSION['usu'];
// Obtiene la acción realizada por el usuario
$accion = "Ingreso al sistema";
$direccion_ip = $_SERVER['REMOTE_ADDR']; // Dirección IP del usuario
// Establece la conexión a la base de datos (asegúrate de reemplazar los valores con los correctos)
$conexion = new mysqli("localhost", "root", "12345678", "amp");

// Verifica si hay algún error en la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Prepara la consulta SQL para insertar el registro en la tabla
$sql = "INSERT INTO bitacora_usuario (usuario_id, accion,direccion_ip) VALUES ('$usuario_id', '$accion','$direccion_ip')";

// Ejecuta la consulta
if ($conexion->query($sql) === TRUE) {
    echo "Acción exitosamente.";
} else {
    echo "Error al registrar la acción: " . $conexion->error;
}

// Cierra la conexión
$conexion->close();
?>

function loadImage(url) {
    return new Promise(resolve => {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', url,true);
        xhr.responseType = "blob";
        xhr.onload = function (e) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const res = event.target.result;
                resolve(res);
            }
            const file = this.response;
            reader.readAsDataURL(file);
        }
        xhr.send();
    });
}
//inicio firma
let signaturePad = null;
let signaturePad2 = null;
let signaturePad3 = null;
let signaturePad4 = null;

window.addEventListener('load',async () => {
    // Inicializar el primer canvas
    const canvas = document.getElementById("canvas");
    canvas.height = canvas.offsetHeight;
    canvas.width = canvas.offsetWidth;
    signaturePad = new SignaturePad(canvas, {});  

    // Inicializar el segundo canvas
    const canvas2 = document.getElementById("signatureCanvas2");
    canvas2.height = canvas2.offsetHeight;
    canvas2.width = canvas2.offsetWidth;
    signaturePad2 = new SignaturePad(canvas2, {});

    // Inicializar el tercer canvas
    const canvas3 = document.getElementById("signatureCanvas3");
    canvas3.height = canvas3.offsetHeight;
    canvas3.width = canvas3.offsetWidth;
    signaturePad3 = new SignaturePad(canvas3, {});

    // Inicializar el cuarto canvas
    const canvas4 = document.getElementById("signatureCanvas4");
    canvas4.height = canvas4.offsetHeight;
    canvas4.width = canvas4.offsetWidth;
    signaturePad4 = new SignaturePad(canvas4, {});

    const form = document.querySelector('#form');//para generar el pdf
    form.addEventListener('submit',(e) => {
       e.preventDefault();

       let folio = document.getElementById('folio').value;
       let ambulancia = document.getElementById('ambulancia').value;
       let sm_dia = document.getElementById('sm_dia').value;
       let f_fecha = document.getElementById('f_fecha').value;
       let h_hora = document.getElementById('h_hora').value;
       let o_operador = document.getElementById('o_operador').value;

       generatePDF(folio, ambulancia, sm_dia, f_fecha, h_hora, o_operador);
    })
});  

async function generatePDF(folio, ambulancia, sm_dia, f_fecha, h_hora, o_operador){
const image = await loadImage("hojahospitalaria.jpg");//mandar a llamar a la imagen  
const pdf = new jsPDF('p','pt','letter');
pdf.addImage(image,'jpg',0,0,615,790);

pdf.setFontSize(9);
pdf.text(folio,196, 50);
pdf.text(ambulancia,197,65);
pdf.text(sm_dia,355,65);
pdf.text(f_fecha,45, 108);
pdf.text(h_hora, 100,130);
pdf-text(o_operador, 45, 160);

//una segunda imagen
pdf.addPage();
const image2 =await loadImage("hoja2.jpg");
const signatureImage = signaturePad.toDataURL();
const signatureImage2 = signaturePad2.toDataURL();
const signatureImage3 = signaturePad3.toDataURL();
const signatureImage4 = signaturePad4.toDataURL();

pdf.addImage(image2,'jpg',0,0,615,816);
pdf.addImage(signatureImage, 'jpg',340,405,100,25);
pdf.addImage(signatureImage2, 'jpg',396,525,100,25);
pdf.addImage(signatureImage3, 'jpg',70,715,100,25);
pdf.addImage(signatureImage4, 'jpg',350,717,100,25);



pdf.save("FOLIO:.pdf");//par guardar el pdf

}