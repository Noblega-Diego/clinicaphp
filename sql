create database sysCitas;
use sysCitas;
create table Pacientes(
	id bigint not null primary key auto_increment,
    nombre varchar(100) not null,
    apellido varchar(100) not null,
    cedula varchar(100) not null
);

create table Medicos(
	id bigint not null primary key auto_increment,
    nombre varchar(100) not null,
    apellido varchar(100) not null,
    cedula varchar(100) not null
);
create table Cita(
	id bigint not null primary key auto_increment,
    fecha date not null,
    medico_id bigint not null,
    paciente_id bigint not null,
    estado int not null default 0, /*0:espera, 1:confirmado, 2:rechasado*/
    foreign key(medico_id) references Medicos(id),
    foreign key(paciente_id) references Pacientes(id)
);

/*Datos de ejemplo*/
insert into Pacientes(nombre, apellido, cedula)
	Values('Martin', 'Pereira', 11111111),
		('Salome', 'Corlovan', 11111121);
insert into Medicos(nombre, apellido, cedula)
	Values('Carlos', 'Pereira', 21111111),
		('Alejandro', 'Corlovan', 11131121);
insert into Cita(medico_id, paciente_id, fecha, estado)
	Values(1, 2, '2021-05-10 19:00:00', 0);