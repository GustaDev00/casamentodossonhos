create database cadastroteste;

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

create table adm(
cod_adm int primary key auto_increment,
nome_adm varchar(100),
email_adm varchar(100),
senha_adm varchar(60)
);

create table produto(
produtoID int primary key auto_increment,
nomeproduto varchar(100),
descricaoproduto varchar(255),
imgproduto varchar(200),
cod_empresa int,
foreign key(cod_empresa) references empresa(cod_empresa)
);

insert into produto(nomeproduto, descricaoproduto, imgproduto) values("Cachorra", "Uma vagabunda que da o cuzinho", "../_imagens/an1.jpg");
insert into produto(nomeproduto, descricaoproduto, imgproduto) values("Cachorra2", "Uma bunda que da o cuzinho", "../_imagens/an1.jpg");
insert into produto(nomeproduto, descricaoproduto, imgproduto) values("Cachorra3", "Uma vaga que da o cuzinho", "../_imagens/an1.jpg");
update produto set imgproduto = "../_imagens/logo.png" where produtoID >= 1;
select * from produto;
delete from produto where produtoID = 2; 

INSERT INTO usuario(nome_usu, tipo_usu, email_usu, senha_usu, 
                nascimento_usu, cep_usu,  rua_usu, bairro_usu, cidade_usu, estado_usu, foto_usu, nome_par_usu,  
                tipo_par_usu, nascimento_par_usu, data_casal) 
values("gustavo", "tipodanado", "gusta@gg.com", "gusta", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1", "1");

INSERT INTO empresa(nome_empre, cnpj_empre, email_empre, senha_empre, cep_empre,  rua_empre, bairro_empre, 
                     cidade_empre, estado_empre, foto_empre, tel_empre, categoria_empre)
values("Empresa", "00101001", "empresa@empresa.com", "haddad", "1", "1", "1", "1", "1", "1", "1", "1");

insert into adm(nome_adm, email_adm, senha_adm)values("Adm", "adm@adm", "adm");

select * from adm;
SELECT * FROM USUARIO;
select * from empresa;
SELECT email_empre, senha_empre from empresa where email_empre='empresa@empresa.com' and senha_empre='haddad';


