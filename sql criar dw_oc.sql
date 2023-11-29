

create table dw_oc_mastofauna (
id int not null auto_increment,
eventID varchar (100) not null,
occurrenceID varchar (100) not null,
basisOfRecord varchar (100) not null,
scientificName varchar (100) not null,
kingdon varchar (100) not null,
phylum varchar (100) not null,
class varchar (100) not null,
order_ varchar (100) not null,
family varchar (100) not null,
taxonRank varchar (100) not null,
identificationQualifier varchar (100) not null,
recordedBy varchar (100) not null,
individualCount int not null,
sex varchar (100) not null,
lifeStage varchar (100) not null,
reproductiveCondition varchar (100) not null,
preparations varchar (100) not null,
occurrenceRemarks varchar (100) not null,
primary key (id)
) default charset = utf8;



create table dw_oc_avifauna (
id int not null auto_increment,
eventID varchar (100) not null,
occurrenceID varchar (100) not null,
basisOfRecord varchar (100) not null,
scientificName varchar (100) not null,
kingdon varchar (100) not null,
phylum varchar (100)not null,
class varchar (100) not null,
order_ varchar (100) not null,
family varchar (100) not null,
taxonRank varchar (100) not null,
identificationQualifier varchar (100) not null,
recordedBy varchar (100) not null,
individualCount int not null,
sex varchar (100) not null,
lifeStage varchar (100) not null,
reproductiveCondition varchar (100) not null,
preparations varchar (100) not null,
occurrenceRemarks varchar (100) not null,
primary key (id)
) default charset = utf8;



create table dw_oc_herpetofauna (
id int not null auto_increment,
eventID varchar (100) not null,
occurrenceID varchar (100) not null,
basisOfRecord varchar (100) not null,
scientificName varchar (100) not null,
kingdon varchar (100) not null,
phylum varchar (100) not null,
class varchar (100) not null,
order_ varchar (100) not null,
family varchar (100) not null,
taxonRank varchar (100) not null,
identificationQualifier varchar (100) not null,
recordedBy varchar (100) not null,
individualCount int not null,
sex varchar (100) not null,
lifeStage varchar (100) not null,
reproductiveCondition varchar (100) not null,
preparations varchar (100) not null,
occurrenceRemarks varchar (100) not null,
primary key (id)
) default charset = utf8;



create table dw_oc_ictiofauna (
id int not null auto_increment,
eventID varchar (100) not null,
occurrenceID varchar (100) not null,
basisOfRecord varchar (100) not null,
scientificName varchar (100) not null,
kingdon varchar (100) not null,
phylum varchar (100) not null,
class varchar (100) not null,
order_ varchar (100) not null,
family varchar (100) not null,
taxonRank varchar (100) not null,
identificationQualifier varchar (100) not null,
recordedBy varchar (100) not null,
individualCount int not null,
sex varchar (100) not null,
lifeStage varchar (100) not null,
reproductiveCondition varchar (100) not null,
preparations varchar (100) not null,
occurrenceRemarks varchar (100) not null,
primary key (id)
) default charset = utf8;



create table dw_oc_entomofauna (
id int not null auto_increment,
eventID varchar (100) not null,
occurrenceID varchar (100) not null,
basisOfRecord varchar (100) not null,
scientificName varchar (100) not null,
kingdon varchar (100) not null,
phylum varchar (100) not null,
class varchar (100) not null,
order_ varchar (100) not null,
family varchar (100) not null,
taxonRank varchar (100) not null,
identificationQualifier varchar (100) not null,
recordedBy varchar (100) not null,
individualCount int not null,
sex varchar (100) not null,
lifeStage varchar (100) not null,
reproductiveCondition varchar (100) not null,
preparations varchar (100) not null,
occurrenceRemarks varchar (100) not null,
primary key (id)
) default charset = utf8;


