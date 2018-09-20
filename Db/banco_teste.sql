create database cadastroTeste;

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