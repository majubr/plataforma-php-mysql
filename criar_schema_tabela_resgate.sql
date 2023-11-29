



create table resgate (
id int not null auto_increment,
projeto varchar (100) not null,
municipio varchar (100) not null,
ano year not null,
datas date not null, 
estacao varchar (100) not null,
classe varchar (100) not null,
ordem varchar (100) not null,
familia varchar (100) not null,
genero varchar (100) not null,
especie varchar (100) not null,
nome_popular varchar (100) not null,
mg varchar (100) not null,
br varchar (100) not null,
iucn varchar (100) not null,
numero_ind tinyint not null,
regiao varchar (100) not null,
ponto_amostral varchar (100) not null,
metodologia varchar (100) not null,
latitude float,
longitude float,
campanha varchar (100),
consultor varchar (100),
especialidade varchar (100) not null,
empresa varchar (100) not null,
obs varchar (200),
primary key (id) 
) default charset = utf8;
