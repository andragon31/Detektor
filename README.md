# Detektor
 Prueba tecnica Detektor

1.En la carpeta conexion se encuentran los datos necesarios para poder conectarse a la base de datos. 

2. En la carpeta API se encuentran los servicios necesarios para obtener, crear, actualizar y eliminar los elementos necesarios para esta prueba.

3. En la carpeta controlador se encuentran los archivos que contienen la logica necesaria para efectuar cada una de las solicitudes
   recibidas en los servicios.
   
   
INFORMACION DE LA BASE DE DATOS NECESARIA PARA LA EJECUCION

CREATE TABLE public.marca_vehiculo
(
    id bigint NOT NULL DEFAULT nextval('marcas_vehiculos_id_seq'::regclass),
    marca character varying(50) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT marcas_vehiculos_pkey PRIMARY KEY (id)
)

CREATE TABLE public.modelo_vehiculo
(
    id bigint NOT NULL DEFAULT nextval('modelo_vehiculo_id_seq'::regclass),
    id_marca integer NOT NULL,
    id_tipo integer NOT NULL,
    modelo character varying(50) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT modelo_vehiculo_pkey PRIMARY KEY (id)
)

CREATE TABLE public.propietario
(
    identificacion bigint NOT NULL,
    nombre character varying(50) COLLATE pg_catalog."default" NOT NULL,
    apellido character varying(50) COLLATE pg_catalog."default" NOT NULL,
    fecha_nacimiento date NOT NULL,
    direccion character varying(200) COLLATE pg_catalog."default" NOT NULL,
    telefono bigint NOT NULL,
    email character varying(100) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT propietario_pkey PRIMARY KEY (identificacion)
)

CREATE TABLE public.tipo_vehiculo
(
    id bigint NOT NULL DEFAULT nextval('tipos_vehiculos_id_seq'::regclass),
    tipo character varying(40) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT tipos_vehiculos_pkey PRIMARY KEY (id)
)

CREATE TABLE public.vehiculo_propietario
(
    id bigint NOT NULL DEFAULT nextval('vehiculo_propietario_id_seq'::regclass),
    identificacion bigint NOT NULL,
    placa character varying COLLATE pg_catalog."default" NOT NULL,
    estado boolean NOT NULL,
    CONSTRAINT vehiculo_propietario_pkey PRIMARY KEY (id)
)

CREATE TABLE public.vehiculos
(
    placa character varying(50) COLLATE pg_catalog."default" NOT NULL,
    vin character varying(20) COLLATE pg_catalog."default" NOT NULL,
    linea integer NOT NULL,
    cilindrada bigint NOT NULL,
    color character varying(30) COLLATE pg_catalog."default" NOT NULL,
    chasis character varying(20) COLLATE pg_catalog."default" NOT NULL,
    tipo integer NOT NULL,
    modelo integer NOT NULL,
    marca integer NOT NULL,
    CONSTRAINT propietarios_pkey PRIMARY KEY (placa)
)


 
