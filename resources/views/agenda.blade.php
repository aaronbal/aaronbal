<!DOCTYPE html>
<html>
<head>
    <title>Contacto</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>


  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  
  <style>
    .error{
     color: #FF0000; 
    }
  </style>
</head>
<body>

    <div class="container">
  
    </div>



<!-- Container for demo purpose -->
<div class="container my-5 p-5 shadow-5">

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Agregar Contacto
      </button>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Información Contacto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        
            <div class="col-md-12">

                <form name="contact-form" id="contact-form" method="post" action="javascript:void(0)">
                  <!-- Name input -->
                  <input type="hidden" id="id" name="id" class="form-control" value="" />
                  
                  <div class="form-outline mb-4">
                    <input type="text" id="name" name="name" class="form-control" />
                    <label class="form-label" for="name">Nombre</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" id="last" name="last" class="form-control" />
                    <label class="form-label" for="last">Apellido</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" id="alias" name="alias" class="form-control" />
                    <label class="form-label" for="alias">Alias</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="number" id="cel" name="cel" class="form-control" />
                    <label class="form-label" for="cel">Celular</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="number" id="tel" name="tel" class="form-control" />
                    <label class="form-label" for="tel">Teléfono</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" id="address" name="address" class="form-control" />
                    <label class="form-label" for="address">Direccion</label>
                  </div>
        
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control" />
                    <label class="form-label" for="email">Email</label>
                  </div>
        
        
                  <!-- Message input -->
                  <div class="form-outline mb-4">
                    <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                    <label class="form-label" for="description">Descripción</label>
                  </div>

        
                  <!-- Submit button -->
                  <button  type="submit" class="btn btn-primary">
                    Enviar
                  </button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </form>
        
              </div>



        </div>

      </div>
    </div>
  </div>
<!-- Modal Fin-->

  <!--Section: Design Block-->
  <section>

    <div class="text-center">
      <h3 class="mb-3">Agenda Test</h3>
     
    </div>

    <hr class="my-4" />

    <div class="row pt-2">
        <div class="col-md-12" >


          <table id="tagenda" >
            <thead>
               <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Alias</th>
                  <th>Celular</th>
                  <th>Telefono</th>
                  <th>Email</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
               </tr>
            </thead>
            <tbody id="datosag">
 
            </tbody>
 

        </div>  


    </div>

  </section>
  <!--Section: Design Block-->

</div>

 <script type="text/javascript"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script>

///Trae contactos
$(document).ready(function () {
           
  getContacts();
           
           
           });

////Genera Tabla Contactos
function getContacts(){

  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#submit').html('Procesando...');
  $("#submit"). attr("disabled", true);
  
  var datos=1;
  $.ajax({
    url: "{{url('getcontacts')}}",
    type: "GET",
    data: "",
    success: function( data ) {
      $('#submit').html('Submit');
      $("#submit"). attr("disabled", false);
    
      console.log(data);

      if ( $.fn.DataTable.isDataTable('#tagenda') ) {
           $('#tagenda').DataTable().destroy();
         }

         var container = $('#datosag');
         container.html('');

         var dataHtml = '';
         
         ///Genera items Listado Vuelos
         for (var i = 0; i < data.length; i+=1) {
   

          dataHtml += '<tr>';
            dataHtml += '        <td>'+data[i].name+'</td>';
            dataHtml += '        <td>'+data[i].last+'</td>';
            dataHtml += '        <td>'+data[i].alias+'</td>';
            dataHtml += '        <td>'+data[i].cel+'</td>';
            dataHtml += '        <td>'+data[i].tel+'</td>';
            dataHtml += '        <td>'+data[i].email+'</td>';
            dataHtml += '        <td><a type="button" onclick="EditContac('+data[i].id+')" class="btn btn-primary">Editar</a></td>';
            dataHtml += '        <td><a type="button" onclick="DelContac('+data[i].id+')" class="btn btn-danger">Eliminar</a></td>';
          dataHtml += '</tr>';

         }
         container.html(dataHtml);

         $('#tagenda').DataTable();
    }
   });
  
}


////Trae informacion contacto
function EditContac(idc){

$.ajaxSetup({
  headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
var id=idc;
$.ajax({
  url: "{{url('getcontactinfo')}}",
  type: "POST",
  data: {id:id},
  success: function( data ) {
    //$('#submit').html('Submit');
    //$("#submit"). attr("disabled", false);
    //alert('Se ha enviado correctamente');
    
    console.log(data);

    $('#id').val(data[0]['id']);
    $('#name').val(data[0]['name']);
    $('#last').val(data[0]['last']);
    $('#alias').val(data[0]['alias']);
    $('#cel').val(data[0]['cel']);
    $('#tel').val(data[0]['tel']);
    $('#address').val(data[0]['address']);
    $('#description').val(data[0]['description']);
    $('#email').val(data[0]['email']);
    
     
      $('#exampleModal').modal('show');

  }
 });

}

/////Elimina Contacto
function DelContac(idc){

$.ajaxSetup({
  headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
var id=idc;
$.ajax({
  url: "{{url('delete')}}",
  type: "POST",
  data: {id:id},
  success: function( data ) {

    
    console.log(data);
    swal({
            title: "Listo",
            text: "Se ha eliminado el contacto",
            icon: "success",
            button: "aceptar",
            });

            getContacts();        

  }
 });

}

////Reset Form Contacto
$('#exampleModal').on('hidden.bs.modal', function () {
  document.getElementById('contact-form').reset();
})




$('#tagenda').DataTable();



//////Valida y guarda Formulario
if ($("#contact-form").length > 0) {
$("#contact-form").validate({
  rules: {
    name: {
    required: true,
    maxlength: 50
  },
  last: {
    required: true,
    maxlength: 100
  },
  email: {
    required: true,
    maxlength: 50,
    email: true,
  },
  cel: {
    required: true,
    maxlength: 10
  },  
  tel: {
    required: true,
    maxlength: 10
  },   
  },
  messages: {
  name: {
    required: "Porfavor ingresa tu nombre",
    maxlength: "Tu nombre debe tener maximo 50 caracteres"
  },
  last: {
    required: "Porfavor ingresa tu apellido",
    maxlength: "100 caracteres maximo para el campo apellido"
  },
  cel: {
    required: "Porfavor ingresa tu número celular",
    maxlength: "10 numeros como máximo."
  },
  tel: {
    required: "Porfavor ingresa tu teléfono",
    maxlength: "10 numeros como máximo."
  },
  email: {
    email: "Ingresa un email válido",
    maxlength: "El email no debe contener mas de 50 caracteres",
  },

  },
  submitHandler: function(form) {
  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#submit').html('Procesando...');
  $("#submit"). attr("disabled", true);
  $.ajax({
    url: "{{url('contactsave')}}",
    type: "POST",
    data: $('#contact-form').serialize(),
    success: function( response ) {
      $('#submit').html('Submit');
      $("#submit"). attr("disabled", false);
    
      $('#exampleModal').modal('hide');
      document.getElementById('contact-form').reset();
      swal({
            title: "Listo",
            text: "Se ha guardado el contacto",
            icon: "success",
            button: "aceptar",
            });

            getContacts();

    }
   });
  }
  })
}
</script>
</body>

 


</html>