tabla de archivos 

CREATE TABLE proyectos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(255) NOT NULL,
    project_director VARCHAR(255) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    team VARCHAR(255),
    status ENUM('Activo', 'Desactivado') NOT NULL
);
