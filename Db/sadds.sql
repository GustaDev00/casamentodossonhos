create database casamentodossonhos;
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
data_casal varchar(60)
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
categoria_empre varchar(60)
);

create table categoria(
nome_categoria varchar(100),
desc_categoria text,
-- senha_empresa varchar(100), NÃO ENTENDI --
url_foto_categoria varchar(100),
-- cep varchar(50), --
 cod_status char(1), 
cod_categoria int primary key auto_increment
);

create table produto(
nome_prod varchar(100),
preco_prod varchar(100),
desc_prod text,
url_foto_prod varchar(100),
local_prod varchar(199),																																			iz_prod varchar(100),
cod_produto int primary key auto_increment,
cnpj int,
cod_categoria int ,
foreign key(cnpj)references empresa(cnpj),
foreign key(cod_categoria)references categoria(cod_categoria)
);

create table convidados(
 cod_conv int primary key auto_increment,
 email_conv varchar(80),
 num_acomp varchar(80),
 nome_convi char(80),
 presenca char(30),
 celular_conv varchar(15)
);

create table lista_presentes(
cod_list_pres int primary key auto_increment,

cod_conv int,
foreign key(cod_conv)references convidados(cod_conv)
);

/*
create table comentario(
cod_coment int primary key auto_increment,
data_hora_coment varchar(20),
cod_status_coment char(2),
desc_coment varchar(100)
);
*/

create table favorita(
cod_status_favorita char(2),
cod_favorita int auto_increment,
codproduto int,
cod_usu int,
foreign key(cod_usu) references usuario(cod_usu),
primary key(cod_favorita, cod_produto, cod_usu)
);