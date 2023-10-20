-- create database upn212encuesta;
use upn212encuesta;


-- Tabla para almacenar información sobre la encuesta
CREATE TABLE encuestas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla para almacenar las preguntas de la encuesta
CREATE TABLE preguntas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    encuesta_id INT,
    pregunta TEXT NOT NULL,
    tipo_pregunta ENUM('seleccion_multiple', 'abierta') NOT NULL,
    FOREIGN KEY (encuesta_id) REFERENCES encuestas(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla para almacenar las opciones de respuesta para las preguntas de selección múltiple
CREATE TABLE opciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pregunta_id INT,
    opcion TEXT NOT NULL,
    FOREIGN KEY (pregunta_id) REFERENCES preguntas(id) on DELETE cascade,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla para almacenar las respuestas de los encuestados
CREATE TABLE respuestas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    encuesta_id INT,
    pregunta_id INT,
    encuestado_nombre VARCHAR(255),
    respuesta TEXT,
    FOREIGN KEY (encuesta_id) REFERENCES encuestas(id),
    FOREIGN KEY (pregunta_id) REFERENCES preguntas(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
