Create database bd_teste;
use bd_teste;

create table tb_usuario(
	cd_usuario int auto_increment primary key,
    nm_usuario varchar(50) not null,
    nm_email varchar(50)not null,
    nm_senha text
);

select * from tb_usuario;
