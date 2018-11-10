create database casamentodossonhos;
<<<<<<< HEAD
-- drop database casamentodossonhos;
=======
  -- drop database casamentodossonhos;
>>>>>>> master
use casamentodossonhos;
/*
create table tipo_usuario(
desc_tipo_usu text,
cod_status_usu char(2),
cod_tipo_usu int primary key auto_increment
);
*/

create table usuario(
cod_usu int primary key auto_increment, 
nome_usu varchar(60),
tipo_usu varchar(60),
email_usu varchar(60),
senha_usu varchar(60),
nascimento_usu varchar(60),
cep_usu varchar(60),
rua_usu varchar(60),
bairro_usu varchar(60),
cidade_usu varchar(60),
estado_usu varchar(60),
foto_usu varchar(60),
nome_par_usu varchar(60),
tipo_par_usu varchar(60),
nascimento_par_usu varchar(60),
data_casal varchar(60),
horario_casal varchar(20),
local_casal varchar(60),
foto_local varchar(60),
defini_usu varchar(1)
);
/*
create table email(
titulo_email varchar(100),
data_hora_email datetime,
espaço_email varchar(80),
cod_status_email char(2),
cod_email int primary key auto_increment
);
*/

create table empresa(
cod_empresa int primary key auto_increment,
nome_empre varchar(100),
cnpj_empre varchar(60),
email_empre varchar(100),
senha_empre varchar(60),
cep_empre varchar(60),
rua_empre varchar(60),
bairro_empre varchar(60),
cidade_empre varchar(60),
estado_empre varchar(60),
foto_empre varchar(60),
tel_empre varchar(50),
categoria_empre varchar(60),
defini_empre varchar(1)
);

create table fotos_empresa(
cod_foto int primary key auto_increment,
nome_foto varchar(50),
url_foto_empresa varchar(80),
desc_foto text,
cod_empresa int,
foreign key(cod_empresa) references empresa(cod_empresa)
);

create table categoria(
cod_categoria int primary key auto_increment,
nome_categoria varchar(100),
desc_categoria text,
url_foto_categoria varchar(100),
 cod_status char(1)
);

create table produto(
cod_produto int primary key auto_increment,
nome_prod varchar(100),
preco_prod varchar(100),
desc_prod text,
url_foto_prod varchar(100),
local_prod varchar(199),
iz_prod varchar(100),
cod_empresa int,
cod_categoria int,
foreign key(cod_empresa)references empresa(cod_empresa),
foreign key(cod_categoria)references categoria(cod_categoria)
);


create table convidados(
 cod_conv int primary key auto_increment,
 email_conv varchar(80),
 num_acomp varchar(80),
 nome_convi char(80),
 presenca char(40),
 celular_conv varchar(15),
 cod_usu int,
 foreign key(cod_usu) references usuario(cod_usu)
);

-- insert into convidados(email_conv, num_acomp, nome_convi, presenca, celular_conv, cod_usu) values ('xd@', '2', 'xupinga', 'vo nada', '40028922'); 

create table lista_presentes(
cod_list_pres int primary key auto_increment,
nome_valor_presente varchar(40),
tipo_presente varchar(50),
status_presente varchar(30),
cod_conv int,
cod_usu int not null,
foreign key(cod_conv)references convidados(cod_conv),
foreign key(cod_usu) references usuario(cod_usu)
);


/*INSERT INTO LISTA_PRESENTES(nome_valor_presente, tipo_presente, cod_usu) values($nomePres, $tipoPres, $id);
select * from lista_presentes where cod_usu = 4;
DELETE FROM LISTA_PRESENTES WHERE NOME_VALOR_PRESENTE = 'Foguete' AND COD_USU = '4';
select* from lista_presentes;*/
/*
create table comentario(
cod_coment int primary key auto_increment,
data_hora_coment varchar(20),
cod_status_coment char(2),
desc_coment varchar(100)
);
*/

create table favorita(
cod_favorita int primary key auto_increment,
cod_status_favorita char(2),
cod_produto int,
cod_usu int,
foreign key(cod_usu) references usuario(cod_usu),
foreign key(cod_produto) references produto(cod_produto)
); 


create table adm(
cod_adm int primary key auto_increment,
nome_adm varchar(100),
email_adm varchar(100),
senha_adm varchar(60),
defini_adm varchar(1)
);
		insert into adm(nome_adm, email_adm, senha_adm, defini_adm) values ('SENHOR FODÃO', 'adm@adm.adm', 'adm', '3');
		insert into categoria(nome_categoria, desc_categoria, cod_status) values ('Flores', 'Flores em Geral', 'A');
		insert into categoria(nome_categoria, desc_categoria, cod_status) values ('Jóias', 'Jóias em Geral', 'A');
