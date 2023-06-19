!DOCTYPE html>
<html lang="es">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Radiador Springs</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
        <!-- Theme style -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/v4-shims.js"></script> 
        <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/fontawesome.js"> </script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
    
    </head>
    <body class="hold-transition sidebar-mini" style="background-color:#D9D9D9 ">
    @include('administrador.navbar')

                <!-- Content Wrapper. Contains page content -->
                <div class="borde-formulario">
                
                    <h2 class="tituloa"><strong>Enviar Mensaje</strong></h2>
            
                <!-- borde 2-->
                <div class ="borde2-formulario">    
                        <h4 class="titulob">Datos del Mensaje</h4>
                <div class="formulario">
                        <!--Busqueda-->
                        <form  class = "formualrio1" action="/clientem" method="get">
                            <input type="text" class="cajab" name="texto" placeholder="Ponga el Ci o Apellido a buscar">
                            <button type="submit" class="botonb" value="Buscar">Buscar</button>
                        </form>
                        <!--Tabla-->
                        <table class="tabla" id="tabla">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Apellidos</th>
                                    <th>Nombres</th>
                                    <th>Celular</th>
                                    <th>CI</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($clientes)<=0)
                                    <tr>
                                        <td colspan="6">No hay Resultados</td>
                                    </tr>
                                @else 
                                @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{$cliente->id}}</td>
                                    <td>{{$cliente->apellido}}</td>
                                    <td>{{$cliente->nombre}}</td>
                                    <td>{{$cliente->celular}}</td>
                                    <td>{{$cliente->ci}}</td>
                                    <td><button class="botons">Seleccionar</button></td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{$clientes->links()}}
                    <!--Formulario-->
                        <form class="formulario2">
                            {{csrf_field()}}
                                <div class="celular">
                                <label class = "celularr" name="ccelular" id="ccelular" for="">Celular<font color="red">*</font></label>
                                <input type="text" class="ccelular" id="txt_celular" name="celularr" placeholder="Ingrese el celular ejm(591xxxxxxx)"></input>
                                @error('celularr')
                                <p1 class="error-message">{{ $message }}</p1>
                                @enderror
                                </div>
                                <div class="mensaje">
                                <label class = "mensajee" for="">Mensaje<font color="red">*</font></label>
                                <input type="text" class="cmensaje" id="txt_documento" name="mensajee" placeholder="Ingrese el mensaje a enviar"></input>
                                @error('mensajee')
                                <p1 class="error-message">{{ $message }}</p1>
                                @enderror
                                </div>
                            <button type="submit"  class="botong" id = "btn_notificar">Enviar</button>
                            <a href="/administrador/home" class="botonc">Cancelar</a>
                            </form>
                            <img class = "auto" src="{{ asset('/img/parqueo3.jpg') }}" alt="">                    
                            </div>
                </div>
</div>

  <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

        <!--JQuery Whatssapp-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
	<script type='text/javascript'>

    $(document).ready(function() {
    var token="GA230619041018";
		var api ="https://script.google.com/macros/s/AKfycbyoBhxuklU5D3LTguTcYAS85klwFINHxxd-FroauC4CmFVvS0ua/exec";
		$("#txt_archivo").change(function() {
			subirFoto("txt_archivo");
		}); 
			
		$("#btn_notificar").click(function() {
		var  payload = {"op": "registermessage","token_qr": token, "mensajes": [
							{"numero": $("#txt_celular").val(),"mensaje": "Radiador Spring lo saluda e informa: *"+$("#txt_documento").val()+"*"},
							{"numero": $("#txt_celular").val(),"imagenbase64":$("#txt_archivo_base64").val()}]};
			$.ajax({
				url: api,
				jsonp: "callback",
				method: 'POST',
				data : JSON.stringify(payload),
				async: false,
				success: function(respuestaSolicitud) {
						alert(respuestaSolicitud.message);
				}
			});
        });
    });	

	function base64(file, callback){
		var coolFile = {};
		function readerOnload(e){
			var base64 = btoa(e.target.result);
			coolFile.base64 = base64;
			callback(coolFile)
		};

		var reader = new FileReader();
		reader.onload = readerOnload;

		var file = file[0].files[0];
		coolFile.filetype = file.type;
		coolFile.size = file.size;
		coolFile.filename = file.name;
		reader.readAsBinaryString(file);
	}
	async function subirFoto(id){
		var foto = await new Promise((resolve, reject) => {
			base64( $('#'+id), function(data){
				resolve(data.base64)
			});
		});
		$("#"+id+"_base64").val(foto);
		console.log(foto);
	}
    </script> 

    <!--seleccionar numero-->
    <script type="text/javascript">
       const table = document.getElementById('tabla')
       const inputs = document.querySelectorAll('#txt_celular')
       table.addEventListener('click', (e)=>{
        e.stopPropagation();
        let data= e.target.parentElement.parentElement.children;
        fillData(data);
       })

       const fillData = (data)=>{
        for(let index of inputs){
        index.value = '591'+ data[3].textContent;
        console.log(inputs)
       }
       }
</script>
<script>
    $(document).ready(function(){
        $('#tabla').DataTable();
    });
</script>
</body>
<style>
    
    
*{
    margin: 0%;
    padding: 0%;
}
body{
    background-color: #d9d9d9;
    font-family:"Poppins", sans-serif ;
}
.borde-formulario{
    position: fixed;
    margin: auto;
    background-color: white;
    width: 75%;
    height: 85%;
    margin-left: 22%;
    margin-top: 2%;
    border-radius: 1%;
}
.borde2-formulario{
    position: absolute;
    background-color: #53A790;
    margin: auto;
    width: 75%;
    height: 80%;
    margin-left: 10%;
    margin-top: 2%;
    border-radius: 2%;
}
.formulario{
    width: 98%;
    height: 91%;
    background-color: white;
    position: absolute;
    margin: auto;
    left: 1%;
    border-radius: 2%;
}
.titulob{
    font-size: 'Poppins', sans-serif;
    margin: auto;
    margin-left: 2%;
    margin-top: 1%;
    margin-bottom: 0%;
    color: white;
}
.tituloa{
    font-size: 'Poppins', sans-serif;
    margin: auto;
    margin-left: 1%;
    color: #324855;
}

.botong{
text-align: center;
cursor: pointer;
box-sizing: border-box;
position: absolute;
width: 12%;
height: 6%;
left: 2%;
top: 90%;
background: #53A790;
border: 1px solid #000000;
border-radius: 8px;
color: #FDF7F7;
}
.botonc{
text-align: center;
cursor: pointer;
box-sizing: border-box;
position: absolute;
width: 12%;
height: 6%;
left: 15%;
top: 90%;
background: #53A790;
border: 1px solid #000000;
border-radius: 8px;
color: #FDF7F7;
}
.auto{
    position: absolute;
    left: 80%;
    width: 15%;
    top: 75%;
}
.cajab{
    position: relative;
    width: 40%;
    left: 2%;
    margin-top: 2%;
    text-align: center;
}
.botonb{
text-align: center;
cursor: pointer;
box-sizing: border-box;
position: relative;
width: 12%;
height: 6%;
left: 3%;
background: #53A790;
border: 1px solid #000000;
border-radius: 8px;
color: #FDF7F7;
}

.celular{
    position: relative;
    left: 2%;
}
.ccelular{
    position: relative;
    left: 5%;
    border: 2px solid #53A790;
    text-align: center;
    border-radius: 10px;
    width: 50%;
}
.mensaje{
    position: relative;
    margin-top: 2%;
    left: 2%;
}
.cmensaje{
    position: relative;
    left: 4%;
    height: 10%;
    width: 50%;
    text-align: center;
    border: 2px solid #53A790;
    border-radius: 10px;
}
.formulario1{
    margin-top: 2%;
}
.formulario2{
    margin-top: 2%;
}
.botons{
    display: inline-block;
  padding:10px;
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  text-decoration: none;
  background-color:#2A4858;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-bottom:10px;
}
table{
    table-layout: fixed;
    width: 90%;
    height: 10%;
    border-collapse: collapse;
    border: 3px solid #395261;
    text-align: center;
    margin-left: 5%;
    margin-top: 2%;
}
thead th:nth-child(1) {
  width: 8%;
  text-align: center;
}

thead th:nth-child(2) {
  width: 35%;
}

thead th:nth-child(3) {
  width: 20%;
}

thead th:nth-child(4) {
  width: 20%;
}

thead th:nth-child(5) {
  width: 20%;
}

thead th:nth-child(6) {
  width: 20%;
}

th, td {
  padding: 2px;
}

thead th, tfoot th {
  font-family: 'Poppins';
  
}

th {
  letter-spacing: 2px;
  height: 2%;
}

td {
  letter-spacing: 1px;
}

tbody td {
  text-align: center;
}

thead th, tbody th, tbody td {
  
  border: 3px solid #53A790;
}
@media  (min-width: 720px) and (max-width: 1080px){
    
}
</style>
</html>