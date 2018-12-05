-- create database casamentodossonhos;
  -- drop database casamentodossonhos;
-- use casamentodossonhos;

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
create table alert(
cod_alert int primary key auto_increment,
msg_alert varchar(100), 
cod_empresa int,
cod_usu int,
cod_adm int,
foreign key(cod_usu) references usuario(cod_usu),
foreign key(cod_empresa) references empresa(cod_empresa),
foreign key(cod_adm) references adm(cod_adm)
);
		
Insert into categoria(nome_categoria, desc_categoria, cod_status)
Values("Salões de festa", "Salões em geral", "A");

Insert into categoria(nome_categoria, desc_categoria, cod_status)
Values("Vestidos", "Vestidos em geral", "A");

Insert into categoria(nome_categoria, desc_categoria, cod_status)
Values("Ternos", "Ternos em geral", "A");

Insert into categoria(nome_categoria, desc_categoria, cod_status)
Values("Salões de beleza", " Salões de beleza em geral", "A");

Insert into categoria(nome_categoria, desc_categoria, cod_status)
Values("Dj/música ", "Músicas em geral", "A");

Insert into categoria(nome_categoria, desc_categoria, cod_status)
Values("Lua de mel", "Lua de mel em geral", "A");

Insert into categoria(nome_categoria, desc_categoria, cod_status)
Values("Lembrancinhas", "Lembrancinhas em geral", "A");

Insert into categoria(nome_categoria, desc_categoria, cod_status)
Values("Flores", "Flores em geral", "A");

Insert into categoria(nome_categoria, desc_categoria, cod_status)
Values("Fotografia", "Fotografia em geral", "A");

Insert into categoria(nome_categoria, desc_categoria, cod_status)
Values("Automóveis", "Automóveis em geral", "A");

Insert into categoria(nome_categoria, desc_categoria, cod_status)
Values("Joias", "Joias em geral", "A");

Insert into categoria(nome_categoria, desc_categoria, cod_status)
Values("Acessórios ", "Acessórios em geral", "A");

Insert into categoria(nome_categoria, desc_categoria, cod_status)
Values("Cerimonialista ", "Cerimonialista em geral", "A");