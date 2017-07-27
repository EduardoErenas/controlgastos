drop database control_gastos;
create database control_gastos;

/*
CREATE USER 'admincontrol'@'localhost' IDENTIFIED BY 'controlgastos#2017';
GRANT ALL PRIVILEGES ON * . * TO 'admincontrol'@'localhost';
*/
use control_gastos;

SET FOREIGN_KEY_CHECKS=0;
DROP TRIGGER if exists tg_pagos;
drop table if exists mes;
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
usu_prioridad int default 1,
usu_alcance int default 5,	
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
ga_restante decimal(10,2) not null,
ga_numpagos int(11) NOT NULL,
ga_pagoactual int(11) default 0,
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

create table category_gasto(
cat_id int primary key auto_increment,
usu_id int unsigned not null,
cat_description varchar(100),
cat_status tinyint default 1,
created_at timestamp DEFAULT now(),
updated_at timestamp DEFAULT now()
);

create table category_ingreso(
cat_id int primary key auto_increment,
usu_id int unsigned not null,
cat_description varchar(100),
cat_status tinyint default 1,
created_at timestamp DEFAULT now(),
updated_at timestamp DEFAULT now()
);

create table mes(
mes_id int primary key auto_increment,
mes_name varchar(20) not null
);
insert into mes(mes_name) values('Enero');
insert into mes(mes_name) values('Febrero');
insert into mes(mes_name) values('Marzo');
insert into mes(mes_name) values('Abril');
insert into mes(mes_name) values('Mayo');
insert into mes(mes_name) values('Junio');
insert into mes(mes_name) values('Julio');
insert into mes(mes_name) values('Agosto');
insert into mes(mes_name) values('Septiembre');
insert into mes(mes_name) values('Octubre');
insert into mes(mes_name) values('Noviembre');
insert into mes(mes_name) values('Diciembre');
-- Referencias
alter table category_gasto add constraint fk_cat_gasto_usu foreign key (usu_id) references users(id);
alter table category_ingreso add constraint fk_cat_ingreso_usu foreign key (usu_id) references users(id);

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
where i.in_status<>0 order by in_status asc , in_id asc;

create or replace view vw_pagos_cliente as 
SELECT p.pa_id, p.usu_id, p.pa_numpago, p.pa_fecha_pagar,p.pa_fecha_pago,p.created_at, p.pa_monto, gasto.ga_description, gasto.ga_prioridad, gasto.ga_numpagos,gasto.cat_id,cat_description,p.pa_estatus
from pago p 
INNER JOIN gasto ON gasto.ga_id = p.ga_id 
INNER JOIN category_gasto ON category_gasto.cat_id = gasto.cat_id 
WHERE DATEDIFF(pa_fecha_pagar, CURDATE())<5 AND p.pa_estatus<>0 
ORDER BY p.pa_fecha_pagar asc,gasto.ga_prioridad asc,p.created_at asc ;

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

-- reporte gastos - mes
select mes_id,mes_name,sum(if(month(created_at)=mes_id,ga_amount,0)) as total
from gasto
right  join mes on mes.mes_id = month(created_at) and year(created_at)=year(now()) and gasto.usu_id = 2 and gasto.ga_status in (1,2)
group by 1,2;

-- reporte ingresos - mes
select mes_id,mes_name,sum(if(month(created_at)=mes_id,in_amount,0)) as total
from ingreso ing
right join mes on mes.mes_id = month(created_at) and year(created_at)=year(now()) and ing.usu_id = 2 and ing.in_status in (1,2)
group by 1,2;

-- reporte ingresos - categoria
select ct.cat_id,ct.cat_description,sum(if(ct.cat_id = ing.cat_id,in_amount,0)) as total
from ingreso ing
right join category_ingreso ct on ct.cat_id = ing.cat_id and year(ing.created_at)=year(now()) and ing.usu_id = 2 and ing.in_status in (1,2)
group by 1,2;

-- reporte gastos - categoria
select ct.cat_id,ct.cat_description,sum(if(ct.cat_id = ga.cat_id,ga_amount,0)) as total
from gasto ga
right join category_gasto ct on ct.cat_id = ga.cat_id and year(ga.created_at)=year(now()) and ga.usu_id = 2 and ga.ga_status in (1,2)
group by 1,2;

-- reporte gastos-ingresos-mes
select mes_id,mes_name,sum(if(month(ing.created_at)=mes_id,in_amount,0)) as igresos,sum(if(month(gasto.created_at)=mes_id,ga_amount,0)) as Gastos
from mes
left  join gasto on mes.mes_id = month(gasto.created_at) and year(gasto.created_at)=year(now()) and gasto.usu_id = 2 and gasto.ga_status in (1,2)
left join ingreso ing on mes.mes_id = month(ing.created_at) and year(ing.created_at)=year(now()) and ing.usu_id = 2 and ing.in_status in (1,2)
group by 1,2;

-- trigger para actualizar gastos y ingresos al realizar un pago
drop trigger if exists tg_realiza_pago;
delimiter $$
CREATE TRIGGER tg_realiza_pago before update on pago for each row
BEGIN
	DECLARE _monto decimal(10,2);
    DECLARE _ga_restante decimal(10,2);
    DECLARE _ingreso decimal(10,2);
    DECLARE _usuario int;
    DECLARE _x int;
    
    SET _usuario = OLD.usu_id;
    SET _monto = OLD.pa_monto;
    
	IF (NEW.pa_estatus = 2) THEN
		SELECT min(in_id) into _x from ingreso where usu_id=_usuario and in_status=1;
        SELECT in_restante into _ingreso from ingreso where in_id = _x;
        
        WHILE _monto>0 DO
			IF (_monto < _ingreso) THEN
				UPDATE ingreso set in_restante = (_ingreso-_monto) where in_id = _x;
                UPDATE gasto set ga_pagoactual = (ga_pagoactual+1), ga_restante=(ga_restante-OLD.pa_monto) where ga_id = OLD.ga_id;
                SET _monto = 0;
                SET NEW.pa_fecha_pago = now();
            ELSEIF (_monto = _ingreso) THEN
				UPDATE ingreso set in_restante = 0,in_status = 2 where in_id = _x;
                UPDATE gasto set ga_pagoactual = (ga_pagoactual+1), ga_restante=(ga_restante-OLD.pa_monto) where ga_id = OLD.ga_id;
                SET NEW.pa_fecha_pago = now();
                SET _monto = 0;
            ELSEIF (_monto > _ingreso) THEN 
				UPDATE ingreso set in_restante = 0, in_status = 2 where in_id = _x;
				SET _monto = _monto-_ingreso;
                SELECT min(in_id) into _x from ingreso where usu_id=_usuario and in_status=1 and in_id>_x;
                SELECT in_restante into _ingreso from ingreso where in_id = _x;
            END IF;
        END WHILE;
        SELECT ga_restante INTO _ga_restante from gasto where ga_id=OLD.ga_id;
        IF (_ga_restante<=0) THEN
			UPDATE gasto set ga_status = 2 where ga_id = OLD_ga_id;
        END IF;
        
    END IF;
END $$
delimiter ;

-- trigger para insertar las categorias por default para cata usuario
drop trigger if exists tg_create_category;
delimiter $$
CREATE TRIGGER tg_create_category before insert on users for each row
BEGIN
	DECLARE _user int;

    SET _user = NEW.id;
    
    INSERT INTO category_gasto(usu_id,cat_description) VALUES(_user,'Comida');
    INSERT INTO category_gasto(usu_id,cat_description) VALUES(_user,'Internet');
    INSERT INTO category_gasto(usu_id,cat_description) VALUES(_user,'Cable');
    INSERT INTO category_gasto(usu_id,cat_description) VALUES(_user,'Luz');
    INSERT INTO category_gasto(usu_id,cat_description) VALUES(_user,'Agua');
    INSERT INTO category_gasto(usu_id,cat_description) VALUES(_user,'Liverpool');
    INSERT INTO category_gasto(usu_id,cat_description) VALUES(_user,'Renta');
    INSERT INTO category_gasto(usu_id,cat_description) VALUES(_user,'Salidas');
    INSERT INTO category_gasto(usu_id,cat_description) VALUES(_user,'Otro');
    
    INSERT INTO category_ingreso(usu_id,cat_description) VALUES(_user,'Sueldo');
    INSERT INTO category_ingreso(usu_id,cat_description) VALUES(_user,'Prestamos / Creditos');
    INSERT INTO category_ingreso(usu_id,cat_description) VALUES(_user,'Cundina');
    INSERT INTO category_ingreso(usu_id,cat_description) VALUES(_user,'Otro');

END $$
delimiter ;