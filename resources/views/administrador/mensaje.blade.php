<!DOCTYPE html>
<html lang="es">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Radiador Springs</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Theme style -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/v4-shims.js"></script> 
        <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/fontawesome.js"> </script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
   
    </head>
    <body class="hold-transition sidebar-mini">
    @include('administrador.navbar')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="background-color:#D9D9D9;  padding: 20px;">
                <div class="container container-blanco">
                    <!-- Contenido dentro del container -->
                    <h2>Enviar Mensaje </h2>
                    <div class ="borde2-formulario">    
                        <h4 class="titulob">Datos del Mensaje</h4>
                <div class="formulario">
                        <!--Busqueda-->
                        <form  class = "formualrio1" action="/clientem" method="get">
                            <input type="text" class="cajab" name="texto" placeholder="Ponga el Ci o Apellido a buscar">
                            <button type="submit" class="boton" value="Buscar">
                                <i class="fas fa-search"></i>
                            </button>
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
                                    <td> 
                                        <button class="botons">
                                            ✓
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="pagination-container">
                           <!-- Renderizado de los enlaces de paginación -->
                            {{ $clientes->links() }}
                        </div>
                    <!--Formulario-->
                    <div class="box">
                        <form class="formulario2">
                            {{csrf_field()}}
                                <div class="form-group">
                                <label class = "celularr" name="ccelular" id="ccelular" for="">Celular<font color="red">*</font></label>
                                <input type="text" class="ccelular" id="txt_celular" name="celularr" placeholder="Ingrese el celular ejm(591xxxxxxx)"></input>
                                @error('celularr')
                                <p1 class="error-message">{{ $message }}</p1>
                                @enderror
                                </div>
                                <div class="form-group">
                                <label class = "mensajee" for="">Mensaje*</label>
                                <input type="text" class="cmensaje" id="txt_documento" name="mensajee" placeholder="Ingrese el mensaje a enviar"></input>
                                @error('mensajee')
                                <p1 class="error-message">{{ $message }}</p1>
                                @enderror
                                </div>
                            <button type="submit"  class="boton" id = "btn_notificar">Enviar</button>
                            <a href="/administrador/home" class="boton">Cancelar</a>
                            </form>
                            </div>
                            <div class="imag">
                            <img class = "auto" src="{{ asset('/img/parqueo3.jpg') }}" alt="">  
                            </div>                  
                            </div>
                </div>
                </div>
            </div>
            <!-- /.content-wrapper -->
        
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
    var token="GA230626053430";
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
body {
    color: #566787;
    font-family: 'Poppins', sans-serif;
    background-color: #D9D9D9; 
    height:auto;
}
h2{
    color: #324855;
    font-family: "Poppins";
    font-weight: bold;
    font-size: 2vw;
    margin-left: 3vw;
    margin-top: 2vw;
    text-align: center;
}

.content-wrapper{
    background-color: #D9D9D9;
    margin-top: 2.5vw;
}

.container{
    background-color: #FFFFFF;
    padding:0px;
}
.container-blanco {
    width: 95%;
    height: 95%;
    background-color: #ffffff;
    border: 1px solid #ffffff;
    padding: 20px;
}
.borde2-formulario{
    background-color: #53A790;
    margin: auto;
    width: 90%; /* Ajusta el ancho a un porcentaje más alto para ocupar más espacio en la pantalla */
    height: auto; /* Cambia la altura a "auto" para que se ajuste al contenido */
    margin-left: 5%; /* Ajusta el margen izquierdo para centrar el formulario */
    margin-right: 5%; /* Ajusta el margen derecho para centrar el formulario */
    margin-top: 2%; /* Ajusta el margen superior según sea necesario */
    border-radius: 2%;
    padding: 20px; /* Agrega un relleno interno para separar el contenido del borde */
}

.formulario{
    width: 97%;
    background-color: white;
    margin: auto;
    left: 1%;
    border-radius: 2%;
}
.titulob,.tituloa{
    font-size: 'Poppins', sans-serif;
    margin: auto;
    margin-left: 2%;
    margin-top: 1%;
    margin-bottom: 0%;
    color: white;
}
.imag{
    width:100%;
    margin-left: 80%; 
}

.auto{
    left: 10%;
    width: 15%;
    top: 75%;
    margin-bottom: 4%;
}
.cajab{
    position: relative;
    width: 40%;
    left: 2%;
    margin-top: 2%;
    text-align: center;
}
.ccelular{
    left: 5%;
    border: 2px solid #53A790;
    text-align: center;
    border-radius: 10px;
    width: 50%;
}
.mensaje{
    margin-top: 2%;
    left: 2%;
}
.cmensaje{
    left: 4%;
    height: 10%;
    width: 50%;
    text-align: center;
    border: 2px solid #53A790;
    border-radius: 10px;
}
.formulario1 {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 20px;
}

.cajab {
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.boton {
  display: inline-block;
  padding: 10px 20px;
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  text-decoration: none;
  background-color: #2A4858;
  color: white;
  border: none;
  border-radius: 10px;
  cursor: pointer;
}

.boton:hover {
  background-color: #1C2E3A;
}


.formulario2{
    margin-top: 2%;
    margin-bottom: 20px;
    
}
.box{
    width:100%;
    margin-left:2%;
}
.botons {
    display: inline-block;
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    background-color: #2A4858;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-bottom: 10px;
    transition: background-color 0.3s ease;
}

.botons:hover {
    background-color: #1C2E3A;
}

table{
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
    /* Ejemplo de estilos CSS para la paginación */
.pagination-container {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination {
    display: flex;
    list-style-type: none;
    padding: 0;
}

.pagination li {
    margin-right: 5px;
}

.pagination li a {
    padding: 5px 10px;
    background-color: #ddd;
    color: #333;
    text-decoration: none;
}

.pagination li a:hover {
    background-color: #aaa;
    color: #fff;
}


</style>
</html>