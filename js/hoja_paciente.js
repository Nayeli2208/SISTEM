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
//se ingresa los datos al documento
       let folio = document.getElementById('folio').value;
       let ambulancia = document.getElementById('ambulancia').value;
       let sm_dia = document.getElementById('sm_dia').value;
       let f_fecha = document.getElementById('f_fecha').value;
       let h_hora = document.getElementById('h_hora').value;
       let o_operador = document.getElementById('o_operador').value;
       let bre = document.getElementById('bre').value;
       let j_servicio = document.getElementById('j_servicio').value;
       let brui = document.getElementById('brui').value;
       let ubi_servicio = document.getElementById('ubi_servicio').value;
       let a_incidente = document.getElementById('a_incidente').value;
       let nom = document.getElementById('nom').value;
       let edad = document.getElementById('edad').value;
       let d_direccion = document.getElementById('d_direccion').value;
       let t_telefono = document.getElementById('t_telefono').value;
       let c_ocupacion = document.getElementById('c_ocupacion').value;
       let d_cohabitante = document.getElementById('d_cohabitante').value;
       let escolaridad = document.getElementById('escolaridad').value;
       let especificar = document.getElementById('especificar').value;
       let especifico = document.getElementById('especifico').value;
       let cinematica = document.getElementById('cinematica').value;
       let tm = document.getElementById('tm').value;
       let tl = document.getElementById('tl').value;
       let cdd = document.getElementById('cdd').value;
       let ecp = document.getElementById('ecp').value;
       let clima = document.querySelector('input[name="clima"]:checked').value;

       let marca = document.getElementById('marca').value;
       let tipo = document.getElementById('tipo').value;
       let modelo = document.getElementById('modelo').value;
       let clr = document.getElementById('clr').value;
       let tiemp_liberacion = document.getElementById('tiemp_liberacion').value;
       let lg_viaje = document.getElementById('lg_viaje').value;
       let c_atropellado = document.getElementById('c_atropellado').value;
       let esc_resultado = document.getElementById('esc_resultado').value;
       let time_traslado = document.getElementById('time_traslado').value;
       let nbre = document.getElementById('nbre').value;
       let fa = document.getElementById('fa').value;
       let perte_paciente = document.getElementById('perte_paciente').value;
       let nft = document.getElementById('nft').value;
       let obii = document.getElementById('obii').value;
       let unidad_nedica = document.getElementById('unidad_nedica').value;
       let hora_recepcion = document.getElementById('hora_recepcion').value;
       let medico_recibe = document.getElementById('medico_recibe').value;
       let jefe_servicio = document.getElementById('jefe_servicio').value;

       generatePDF(folio, ambulancia, sm_dia, f_fecha, h_hora, o_operador, marca, tipo, bre, j_servicio, brui, ubi_servicio, 
        a_incidente, nom, edad, d_direccion, t_telefono, c_ocupacion, d_cohabitante, escolaridad, especificar, especifico, cinematica,
        tm, tl, cdd, ecp, modelo, clr,tiemp_liberacion , lg_viaje, c_atropellado, esc_resultado, time_traslado, nbre, fa, perte_paciente,
        nft, obii, unidad_nedica, hora_recepcion, medico_recibe, jefe_servicio, clima);
    })
});  

async function generatePDF(folio, ambulancia, sm_dia, f_fecha, h_hora, o_operador, marca, tipo, bre, j_servicio, brui, ubi_servicio, 
    a_incidente, nom, edad, d_direccion, t_telefono, c_ocupacion, d_cohabitante, escolaridad, especificar, especifico, cinematica, tm,
    tl, cdd, ecp, modelo, clr,tiemp_liberacion ,lg_viaje, c_atropellado, esc_resultado, time_traslado, nbre, fa, perte_paciente,
    nft, obii, unidad_nedica, hora_recepcion, medico_recibe, jefe_servicio, clima){
const image = await loadImage("hojahospitalaria.jpg");//mandar a llamar a la imagen  
const pdf = new jsPDF('p','pt','letter');
pdf.addImage(image,'jpg',0,0,615,790);

pdf.setFontSize(9);
pdf.text(folio,196, 50);
pdf.text(ambulancia,197,65);
pdf.text(sm_dia,355,65);
pdf.text(f_fecha,45, 108);
pdf.text(h_hora, 130,108);
pdf.text(o_operador, 83, 128);
pdf.text(bre, 335, 128);
pdf.text(j_servicio, 110, 140);
pdf.text(brui, 335 ,140);
pdf.text(ubi_servicio, 130,155);
pdf.text(a_incidente, 220, 178);
pdf.text(nom, 80,203);
pdf.text(edad,440,203);
pdf.text(d_direccion,86,213);
pdf.text(t_telefono, 475, 213);
pdf.text(c_ocupacion, 86, 225);
pdf.text(d_cohabitante,351,225);
pdf.text(escolaridad,470,225);
pdf.text(especificar,458,277);
pdf.text(especifico,325,307);
pdf.text(cinematica,45,332);
pdf.text(tm,526,417);
pdf.text(tl,294,430);
pdf.text(cdd,294,445);
pdf.text(ecp,190,470);

pdf.setLineWidth(2); // Ancho de la línea
pdf.setDrawColor(0, 0, 0); // Color de la línea en formato RGB (negro en este caso)
if (parseInt(clima) === 0) {
    pdf.line(350, 90, 300, 108); pdf.line (350, 108, 300, 90);
} else {
    pdf.line(400, 90, 350, 108); pdf.line (400, 108, 350, 90);
}
pdf.line(450, 90, 400, 108); pdf.line (450, 108, 400, 90);

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
pdf.addImage(signatureImage3, 'jpg',60,715,100,25);
pdf.addImage(signatureImage4, 'jpg',340,717,100,25);

pdf.setFontSize(9);
pdf.text(marca,120,44);
pdf.text(tipo, 274, 44);
pdf.text(modelo,410,44);
pdf.text(clr,505,44);
pdf.text(tiemp_liberacion,480,70);
pdf.text(lg_viaje,103,85);
pdf.text(c_atropellado,173,103);
pdf.text(esc_resultado,305,158);
pdf.text(time_traslado,132,170);
pdf.text(nbre,85,436);
pdf.text(fa,515,436);
pdf.text(perte_paciente,44,490);
pdf.text(nft,400,553);
pdf.text(obii,44,590);
pdf.text(unidad_nedica,153,695);
pdf.text(hora_recepcion,400,695);
pdf.text(medico_recibe,140,740);
pdf.text(jefe_servicio,400,740);

pdf.save("FOLIO:.pdf");//par guardar el pdf

}