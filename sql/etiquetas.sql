USE daw2_actividades;

INSERT INTO etiquetas(id,nombre) VALUES
(0,'aire libre'),
(1,'ludicas'),
(2,'cultural'),
(3,'audio-visuales'),
(4,'lectura'),
(5,'deportivas');

INSERT INTO actividad_imagenes(actividad_id,orden,imagen_id) VALUES
(1,1);

INSERT INTO actividad_etiquetas(actividad_id,etiqueta_id) VALUES
(1,1),
(1,3),
(3,2);

