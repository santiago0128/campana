 function activarContacto(value){
     $('#contenedor5').show();
   //   id = value;
   //   var camp;
      
   //   if(id == 1){
   //      $('#contenedor5 select').empty();
   //      camp += "<option value=''>Seleccione</option>";
   //      camp += "<option value='1'>Directo</option>";
   //      camp += "<option value='2'>Indirecto</option>";
   //      camp += "<option value='3'>No Contacto</option>";
   //      $('#contenedor5 select').append(camp);
   //   }else {
   //      $('#contenedor5 select').empty();
   //      camp += "<option value=''>Seleccione</option>";
   //      camp += "<option value='1'>Directo</option>";
   //      $('#contenedor5 select').append(camp);
   //   }
 }

 function activarPerfil(value){
    $('#contenedor2').show();
    id = value;
    var camp;
    if(id == 1){
       $('#contenedor2 select').empty();
       camp += "<option value=''>Seleccione</option>";
       camp += "<option value='3'>Contacto Sin Acuerdo</option>";
       camp += "<option value='4'>Acuerdo de Pago M</option>";
       camp += "<option value='5'>Ya Pago Abono</option>";
       camp += "<option value='6'>Pdt Respuesta Comite</option>";
       camp += "<option value='7'>Pdt Pago Comite</option>";
       camp += "<option value='8'>Posible Negociacion</option>";
       camp += "<option value='9'>Renuente</option>";
       camp += "<option value='10'>Cancelado</option>";
       camp += "<option value='11'>Insolvente</option>";
       camp += "<option value='13'>Promesa Abono</option>";
       camp += "<option value='14'>Incumplido</option>";
       camp += "<option value='15'>Fallecido</option>";
       camp += "<option value='16'>Decomisado Ilocalizado</option>";
       camp += "<option value='18'>Ley de Insolvencia</option>";
       camp += "<option value='19'>Ya Pago</option>";
       camp += "<option value='20'>Pte Ajuste de Negociacion</option>";
       $('#contenedor2 select').append(camp);
    }else if (id == 2) {
       $('#contenedor2 select').empty();
       camp += "<option value=''>Seleccione</option>";
       camp += "<option value='2'>Mensaje Con Tercero</option>";
       camp += "<option value='22'>Fuera de Servicio</option>";
       camp += "<option value='23'>Equivocado</option>";
       $('#contenedor2 select').append(camp);
    }else if (id == 3) {
       $('#contenedor2 select').empty();
       camp += "<option value=''>Seleccione</option>";
       camp += "<option value='1'>No Contacto</option>";
       camp += "<option value='22'>Ics No Deja Ver</option>";
       camp += "<option value='17'>No Gestionar</option>";
       camp += "<option value='21'>No Contesta</option>";
       $('#contenedor2 select').append(camp);
    }
 }

 function cargarcampos(valor) {
    $('#contenedor6').show();
    
    if (valor == 4 || valor == 13){
        $('#contenedorAcuerdoCuentas').show();
    }else{
        $('#contenedorAcuerdoCuentas').hide();
        $('#contenedor3').show();
        $('#contenedor4').show();
        $('#contenedor7').show();
    }
   
}