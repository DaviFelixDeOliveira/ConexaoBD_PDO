Create database bd_teste;
use bd_teste;

create table tb_usuario(
	cd_usuario int auto_increment primary key,
    nm_usuario varchar(50) not null,
    nm_email varchar(50) not null,
    nm_login varchar (50),
    nm_senha text,
    nr_fone varchar(15),
    img_foto blob
);



select * from tb_usuario;
where nm_usuario and nm_senha;

delete from tb_usuario
where cd_usuario >=1;
