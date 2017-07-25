drop database control_gastos;
create database control_gastos;

/*
CREATE USER 'admincontrol'@'localhost' IDENTIFIED BY 'controlgastos#2017';
GRANT ALL PRIVILEGES ON * . * TO 'admincontrol'@'localhost';
*/
use control_gastos;

SET FOREIGN_KEY_CHECKS=0;
DROP TRIGGER if exists tg_pagos;
drop table if exists usuario;
drop table if exists users;
drop table if exists prioridad;
drop table if exists ingreso;
drop table if exists gasto;
drop table if exists pago;
drop table if exists usuario_ingreso;
drop table if exists usuario_gasto;
drop table if exists category;
drop table if exists category_gasto;
drop table if exists category_ingreso;
drop table if exists frecuency_type;
drop table if exists frecuency;
drop table if exists status_type;
drop table if exists migrations;
drop table if exists password_resets;
SET FOREIGN_KEY_CHECKS=1;

CREATE TABLE migrations (
  id int(10) UNSIGNED NOT NULL,
  migration varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  batch int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

CREATE TABLE password_resets (
  email varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  token varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  created_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

create table users(
id int(10) UNSIGNED NOT NULL,
name varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
email varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
password varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
remember_token varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
usu_age int not null,
usu_occupation varchar(100),
usu_address varchar(100),
usu_city varchar(100),
usu_state varchar(100),
usu_sex tinyint not null, 
usu_type tinyint not null,	
usu_status tinyint default 1,
created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


create table ingreso(
in_id int primary key auto_increment,
usu_id int unsigned not null,
in_description varchar(100) not null,
in_amount decimal(10,2) not null,
in_restante decimal(10,2) DEFAULT NULL,
cat_id int not null,
in_status int default 1,
created_at timestamp NULL DEFAULT NULL,
updated_at timestamp NULL DEFAULT NULL
);

create table gasto(
ga_id int primary key auto_increment,
usu_id int unsigned not null,
ft_id int not null,
ga_description varchar(100) not null,
ga_amount decimal(10,2) not null,
ga_numpagos int(11) NOT NULL,
ga_pagoactual int(11) default 1,
cat_id int not null,
ga_ano int(11) DEFAULT NULL,
ga_mes int(11) DEFAULT NULL,
ga_dia int(11) DEFAULT NULL,
ga_prioridad int(11) NOT NULL,
ga_status int default 1,
created_at timestamp NULL DEFAULT NULL,
updated_at timestamp NULL DEFAULT NULL
);

create table pago(
pa_id int primary key auto_increment,
usu_id int unsigned not null,
ga_id int not null,
pa_numpago int not null,
pa_fecha_pagar datetime,
pa_fecha_pago datetime default null,
pa_monto decimal(10,2) not null,
pa_estatus int not null default 1,
created_at timestamp DEFAULT now(),
updated_at timestamp DEFAULT now()
);

create table frecuency_type(
ft_id int primary key auto_increment,
ft_description varchar(100),
created_at timestamp DEFAULT now(),
updated_at timestamp DEFAULT now()
);

insert into frecuency_type(ft_description) values('Unico');
insert into frecuency_type(ft_description) values('Diario');
insert into frecuency_type(ft_description) values('Semanal');
insert into frecuency_type(ft_description) values('Quincenal');
insert into frecuency_type(ft_description) values('Mensual');
insert into frecuency_type(ft_description) values('Otro');

create table category_gasto(
cat_id int primary key auto_increment,
cat_description varchar(100),
cat_status tinyint default 1,
created_at timestamp NULL DEFAULT NULL,
updated_at timestamp NULL DEFAULT NULL
);
insert into category_gasto(cat_description) values('Internet');
insert into category_gasto(cat_description) values('Luz');
insert into category_gasto(cat_description) values('Agua');
insert into category_gasto(cat_description) values('Liverpool');
insert into category_gasto(cat_description) values('C&A');
insert into category_gasto(cat_description) values('Cable');
insert into category_gasto(cat_description) values('Renta');

create table category_ingreso(
cat_id int primary key auto_increment,
cat_description varchar(100),
cat_status tinyint default 1,
created_at timestamp DEFAULT now(),
updated_at timestamp DEFAULT now()
);
insert into category_ingreso(cat_description) values('Sueldo');
insert into category_ingreso(cat_description) values('Prestamos / Creditos');
insert into category_ingreso(cat_description) values('Cundina');
insert into category_ingreso(cat_description) values('Otros');

-- Referencias

alter table gasto add constraint fk_gasto_cat foreign key (cat_id) references category_gasto(cat_id);
alter table gasto add constraint fk_gasto_fr foreign key (ft_id) references frecuency_type(ft_id);
alter table gasto add constraint fk_gasto_id foreign key (usu_id) references users(id);

alter table ingreso add constraint fk_ingreso_cat foreign key (cat_id) references category_ingreso(cat_id);
alter table ingreso add constraint fk_ingreso_id foreign key(usu_id) references users(id);

alter table pago add constraint fk_pago_ga foreign key(ga_id) references gasto(ga_id);
alter table pago add constraint fk_pago_id foreign key(usu_id) references users(id);

create or replace view vw_ingresos_cliente as
select
i.usu_id, i.in_id, i.in_description, i.cat_id, ci.cat_description, i.in_amount, i.in_restante, i.created_at,i.in_status
from ingreso i
inner join users u on u.id = i.usu_id
inner join category_ingreso ci on ci.cat_id = i.cat_id
where i.in_status<>0;

create or replace view vw_pagos_cliente as 
SELECT p.pa_id, p.usu_id, p.pa_numpago, p.pa_fecha_pagar, p.pa_monto, gasto.ga_description, gasto.ga_prioridad, gasto.ga_numpagos from pago p 
INNER JOIN gasto ON gasto.ga_id = p.ga_id 
INNER JOIN category_gasto ON category_gasto.cat_id = gasto.cat_id 
WHERE DATEDIFF(pa_fecha_pagar, CURDATE())<5 AND p.pa_estatus=1 
ORDER BY p.pa_fecha_pagar,gasto.ga_prioridad ;

	delimiter $$
	CREATE TRIGGER tg_pagos after insert on gasto for each row
	BEGIN
		DECLARE _frecuency INT;
		DECLARE _x INT;
		DECLARE _num INT;
		DECLARE _date date;
		DECLARE _dia INT;
		DECLARE _monto decimal(10,2);
		
		SET _frecuency = NEW.ft_id;
		SET _num = NEW.ga_numpagos;
		SET _x = 1;
		SET _monto = NEW.ga_amount/_num;
		SET _date = concat(NEW.ga_ano,'-',NEW.ga_mes,'-',NEW.ga_dia);
		
		CASE _frecuency
			WHEN 1 THEN -- unico
				insert into pago(usu_id,ga_id,pa_numpago,pa_fecha_pagar,pa_monto) values(NEW.usu_id,NEW.ga_id,1,_date,NEW.ga_amount);
			WHEN 2 THEN -- diario
				WHILE _x <= _num DO
					insert into pago(usu_id,ga_id,pa_numpago,pa_fecha_pagar,pa_monto) values(NEW.usu_id,NEW.ga_id,_x,_date,_monto);
					SET _date = DATE_ADD(_date, INTERVAL 1 DAY);
					SET _x = _x + 1;
				END WHILE;
			WHEN 3 THEN -- semanal
				WHILE _x <= _num DO
					insert into pago(usu_id,ga_id,pa_numpago,pa_fecha_pagar,pa_monto) values(NEW.usu_id,NEW.ga_id,_x,_date,_monto);
					SET _date = DATE_ADD(_date, INTERVAL 1 WEEK);
				SET _x = _x + 1;
				END WHILE;
			WHEN 4 THEN -- quincenal
				WHILE _x <= _num DO
					select day(_date) into _dia;
					
					IF (_dia=15 OR _dia=30 OR _dia=31) THEN 
						insert into pago(usu_id,ga_id,pa_numpago,pa_fecha_pagar,pa_monto) values(NEW.usu_id,NEW.ga_id,_x,_date,_monto);
					ELSEIF (NEW.ga_dia>=1 and NEW.ga_dia<=14) THEN
						SET _date = DATE_ADD(_date, INTERVAL (15-_dia) DAY);
						insert into pago(usu_id,ga_id,pa_numpago,pa_fecha_pagar,pa_monto) values(NEW.usu_id,NEW.ga_id,_x,_date,_monto);
					ELSEIF ( DAY(LAST_DAY(_date)) =28 and _dia=28) THEN
						insert into pago(usu_id,ga_id,pa_numpago,pa_fecha_pagar,pa_monto) values(NEW.usu_id,NEW.ga_id,_x,_date,_monto);
					ELSEIF (NEW.ga_dia>=16 and NEW.ga_dia<=29) THEN
						SET _date = DATE_ADD(_date, INTERVAL (30-_dia) DAY);
						insert into pago(usu_id,ga_id,pa_numpago,pa_fecha_pagar,pa_monto) values(NEW.usu_id,NEW.ga_id,_x,_date,_monto);
					END IF;
					
					SET _dia = DAY(_date);
					IF (_dia=15) THEN
						IF( DAY(LAST_DAY(_date)) =28) THEN
							SET _date = DATE_ADD(_date, INTERVAL 13 DAY);
						ELSE
							SET _date = DATE_ADD(_date, INTERVAL 15 DAY);
						END IF;
					ELSEIF (_dia=30 OR _dia=28) THEN
						SET _date = DATE_ADD(DATE_ADD(_date, INTERVAL (DAY(LAST_DAY(_date))-_dia) DAY), INTERVAL 15 DAY);
					END IF;
				
				SET _x = _x + 1;
				END WHILE;
			WHEN 5 THEN -- mensual
				WHILE _x <= _num DO
					insert into pago(usu_id,ga_id,pa_numpago,pa_fecha_pagar,pa_monto) values(NEW.usu_id,NEW.ga_id,_x,_date,_monto);
					SET _date = DATE_ADD(_date, INTERVAL 1 MONTH);
				SET _x = _x + 1;
				END WHILE;
		END CASE;
	END $$
	delimiter ;