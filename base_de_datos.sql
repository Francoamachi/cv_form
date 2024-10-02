
CREATE TABLE aptitudes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT(11) ,
  aptitud VARCHAR(100)
) ;

CREATE TABLE experiencia_laboral (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT(11) ,
  empresa VARCHAR(100) ,
  puesto VARCHAR(100),
  fecha_inicio DATE ,
  fecha_fin DATE ,
  ubicacion VARCHAR(100) ,
  tipo_ubicacion ENUM('Presencial','Híbrido','Remoto') ,
  descripcion TEXT 
) ;


CREATE TABLE formacion (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT(11) ,
  institucion VARCHAR(100) ,
  disciplina_academica VARCHAR(100) ,
  fecha_inicio DATE ,
  fecha_fin DATE
) ;



CREATE TABLE idiomas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT(11) ,
  idioma VARCHAR(50)  ,
  nivel ENUM('Básico','Intermedio','Avanzado','Nativo')
);



CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100),
  fecha_nacimiento DATE,
  telefono VARCHAR(15) ,
  email VARCHAR(100) ,
  nacionalidad VARCHAR(50) 
);


