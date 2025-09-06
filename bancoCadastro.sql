drop database if exists bd_cadastro;

Create database if not exists bd_cadastro;

use bd_cadastro;

create table tb_usuario (
    cd_usuario int auto_increment primary key,
    nm_usuario varchar(50) not null,
    nm_sobrenome varchar(50) not null,
    nm_email varchar(50) not null,
    nm_login varchar(50),
    nm_senha text,
    nr_fone varchar(15),
    img_foto blob
);

select
    cd_usuario as Código,
    concat (nm_usuario, ' ', nm_sobrenome) as "Nome Completo",
    nm_email as "E-mail",
    nm_login as Login,
    nm_senha as Senha,
    nr_fone as Telefone
    from    tb_usuario;


/*where nm_usuario and nm_senha;*/

delete from tb_usuario
where cd_usuario >= 1;

-- Inserindo primeiro usuário
INSERT INTO tb_usuario VALUES (null,'Ana','Silva','ana.silva@example.com','ana_silva','senha123','(11)91234-5678', null);
-- Inserindo segundo usuário
INSERT INTO tb_usuario VALUES (null, 'Carlos','Ferreira','carlos.ferreira@example.com','carlos_ferreira','minhaSenha456','(21)98765-4321',NULL);