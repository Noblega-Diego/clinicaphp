# Routes

/confirmarTurno.php?turnoId=1&confirmacion=Y
- descripcion:
 endpoint para confirmar turno en base a un id de turno
- params:   
 turnoId : id del turno  
 confirmacion : Y: para confirmar, cualquier otro valor es tomado como no confirmado

/listarTurno.php?medicoId:2
- descripcion:
  endpoint para listar los turnos en base al id del medico
- params:   
  medicoId : id del medico

/cofirmarTurno.php?:2
- descripcion:
  endpoint para obtener un turno, (Los turnos se asignan en base a 1h despues del ultimo turno asignado)
- params:   
  MedicoId: id del medico.     
  PacienteId: id del paciente.


    