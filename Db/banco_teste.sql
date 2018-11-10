select * from usuario;

select * from empresa;
drop database casamentodossonhos;
/*'10.623.708/0001-52'*/

select * from lista_presentes;
select * from produto;
select count(cod_produto) from produto;
insert into fotos_empresa(nome_foto, url_foto_empresa, desc_foto, cod_empresa)values("cachorro", "../_imagens/fundo.jpg", "descrição", 1);
select * from categoria;
select * from convidados;
delete from fotos_empresa where cod_foto = 2;
update lista_presentes set status_presente = 'Em Aberto', COD_CONV = 1 where cod_usu = 1 and  cod_list_pres = 2;