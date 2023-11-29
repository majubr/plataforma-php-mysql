

create table dw_re_avifauna (
id int not null auto_increment,
taxonID varchar (100) not null,
acceptedNameUsageID varchar (100) not null,
acceptedNameUsage varchar (100) not null,
nameAccordingTo varchar (100) not null,
kingdon varchar (100) not null,
phylum varchar (100) not null,
class varchar (100) not null,
order_ varchar (100) not null,
family varchar (100) not null,
genus varchar (100) not null,
subgenus varchar (100) not null,
specificEpithet varchar (100) not null,
infraspecificEpithet varchar (100) not null,
scientificNameAuthorship varchar (100) not null,
taxonRank varchar (100) not null,
taxonomicStatus varchar (100) not null,
associatedReferences varchar (100) not null,
primary key (id)
) default charset = utf8;

create table dw_re_ictiofauna (
id int not null auto_increment,
taxonID varchar (100) not null,
acceptedNameUsageID varchar (100) not null,
acceptedNameUsage varchar (100) not null,
nameAccordingTo varchar (100) not null,
kingdon varchar (100) not null,
phylum varchar (100) not null,
class varchar (100) not null,
order_ varchar (100) not null,
family varchar (100) not null,
genus varchar (100) not null,
subgenus varchar (100) not null,
specificEpithet varchar (100) not null,
infraspecificEpithet varchar (100) not null,
scientificNameAuthorship varchar (100) not null,
taxonRank varchar (100) not null,
taxonomicStatus varchar (100) not null,
associatedReferences varchar (100) not null,
primary key (id)
) default charset = utf8;

create table dw_re_entomofauna (
id int not null auto_increment,
taxonID varchar (100) not null,
acceptedNameUsageID varchar (100) not null,
acceptedNameUsage varchar (100) not null,
nameAccordingTo varchar (100) not null,
kingdon varchar (100) not null,
phylum varchar (100) not null,
class varchar (100) not null,
order_ varchar (100) not null,
family varchar (100) not null,
genus varchar (100) not null,
subgenus varchar (100) not null,
specificEpithet varchar (100) not null,
infraspecificEpithet varchar (100) not null,
scientificNameAuthorship varchar (100) not null,
taxonRank varchar (100) not null,
taxonomicStatus varchar (100) not null,
associatedReferences varchar (100) not null,
primary key (id)
) default charset = utf8;
