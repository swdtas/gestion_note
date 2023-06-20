/*==============================================================*/
/* Nom de SGBD :  Sybase SQL Anywhere 11                        */
/* Date de création :  16/06/2023 14:44:30                      */
/*==============================================================*/


if exists(select 1 from sys.sysforeignkey where role='appartenir') then
    alter table classe
       delete foreign key appartenir
end if;

if exists(select 1 from sys.sysforeignkey where role='avoir') then
    alter table eleve
       delete foreign key avoir
end if;

if exists(select 1 from sys.sysforeignkey where role='enreigistrer') then
    alter table eleve
       delete foreign key enreigistrer
end if;

if exists(select 1 from sys.sysforeignkey where role='ete') then
    alter table inscrit
       delete foreign key ete
end if;

if exists(select 1 from sys.sysforeignkey where role='date') then
    alter table inscrit
       delete foreign key "date"
end if;

if exists(select 1 from sys.sysforeignkey where role='posseder') then
    alter table moyenne
       delete foreign key posseder
end if;

if exists(select 1 from sys.sysforeignkey where role='creer') then
    alter table parent
       delete foreign key creer
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='ADMIN_PK'
     and t.table_name='admin'
) then
   drop index admin.ADMIN_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='admin'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table admin
end if;

if exists(
   select 1 from sys.systable 
   where table_name='annee'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table annee
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='CLASSE_PK'
     and t.table_name='classe'
) then
   drop index classe.CLASSE_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='classe'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table classe
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='ASSOCIATION_6_FK'
     and t.table_name='eleve'
) then
   drop index eleve.ASSOCIATION_6_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='ENREGISTRE_FK'
     and t.table_name='eleve'
) then
   drop index eleve.ENREGISTRE_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='ELEVE_PK'
     and t.table_name='eleve'
) then
   drop index eleve.ELEVE_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='eleve'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table eleve
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='INSCRIT_FK2'
     and t.table_name='inscrit'
) then
   drop index inscrit.INSCRIT_FK2
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='INSCRIT_FK'
     and t.table_name='inscrit'
) then
   drop index inscrit.INSCRIT_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='INSCRIT_PK'
     and t.table_name='inscrit'
) then
   drop index inscrit.INSCRIT_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='inscrit'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table inscrit
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='POSSEDE_FK'
     and t.table_name='moyenne'
) then
   drop index moyenne.POSSEDE_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='MOYENNE_PK'
     and t.table_name='moyenne'
) then
   drop index moyenne.MOYENNE_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='moyenne'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table moyenne
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='ASSOCIATION_1_FK'
     and t.table_name='parent'
) then
   drop index parent.ASSOCIATION_1_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='PARENT_PK'
     and t.table_name='parent'
) then
   drop index parent.PARENT_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='parent'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table parent
end if;

/*==============================================================*/
/* Table : admin                                                */
/*==============================================================*/
create table admin 
(
   id_admin             integer                        not null,
   nom                  varchar(254)                   null,
   prenom               varchar(254)                   null,
   email                varchar(254)                   null,
   mot_pass             varchar(254)                   null,
   constraint PK_ADMIN primary key (id_admin)
);

/*==============================================================*/
/* Index : ADMIN_PK                                             */
/*==============================================================*/
create unique index ADMIN_PK on admin (
id_admin ASC
);

/*==============================================================*/
/* Table : annee                                                */
/*==============================================================*/
create table annee 
(
   id_annee             integer                        not null,
   nom                  varchar(254)                   null,
   constraint PK_ANNEE primary key (id_annee)
);

/*==============================================================*/
/* Table : classe                                               */
/*==============================================================*/
create table classe 
(
   id_classe            integer                        not null,
   id_eleve             integer                        not null,
   nom                  varchar(254)                   null,
   effectif             integer                        null,
   constraint PK_CLASSE primary key (id_classe)
);

/*==============================================================*/
/* Index : CLASSE_PK                                            */
/*==============================================================*/
create unique index CLASSE_PK on classe (
id_classe ASC
);

/*==============================================================*/
/* Table : eleve                                                */
/*==============================================================*/
create table eleve 
(
   id_eleve             integer                        not null,
   id_parent            integer                        not null,
   id_admin             integer                        not null,
   nom                  varchar(254)                   null,
   prenom               varchar(254)                   null,
   date_naissance       timestamp                      null,
   lieu_naissance       varchar(254)                   null,
   genre                varchar(254)                   null,
   constraint PK_ELEVE primary key (id_eleve)
);

/*==============================================================*/
/* Index : ELEVE_PK                                             */
/*==============================================================*/
create unique index ELEVE_PK on eleve (
id_eleve ASC
);

/*==============================================================*/
/* Index : ENREGISTRE_FK                                        */
/*==============================================================*/
create index ENREGISTRE_FK on eleve (
id_admin ASC
);

/*==============================================================*/
/* Index : ASSOCIATION_6_FK                                     */
/*==============================================================*/
create index ASSOCIATION_6_FK on eleve (
id_parent ASC
);

/*==============================================================*/
/* Table : inscrit                                              */
/*==============================================================*/
create table inscrit 
(
   id_annee             integer                        not null,
   id_eleve             integer                        not null,
   constraint PK_INSCRIT primary key clustered (id_annee, id_eleve)
);

/*==============================================================*/
/* Index : INSCRIT_PK                                           */
/*==============================================================*/
create unique clustered index INSCRIT_PK on inscrit (
id_annee ASC,
id_eleve ASC
);

/*==============================================================*/
/* Index : INSCRIT_FK                                           */
/*==============================================================*/
create index INSCRIT_FK on inscrit (
id_annee ASC
);

/*==============================================================*/
/* Index : INSCRIT_FK2                                          */
/*==============================================================*/
create index INSCRIT_FK2 on inscrit (
id_eleve ASC
);

/*==============================================================*/
/* Table : moyenne                                              */
/*==============================================================*/
create table moyenne 
(
   id_moyenne           integer                        not null,
   id_eleve             integer                        not null,
   nom                  varchar(254)                   null,
   valeur               float                          null,
   rang                 varchar(254)                   null,
   constraint PK_MOYENNE primary key (id_moyenne)
);

/*==============================================================*/
/* Index : MOYENNE_PK                                           */
/*==============================================================*/
create unique index MOYENNE_PK on moyenne (
id_moyenne ASC
);

/*==============================================================*/
/* Index : POSSEDE_FK                                           */
/*==============================================================*/
create index POSSEDE_FK on moyenne (
id_eleve ASC
);

/*==============================================================*/
/* Table : parent                                               */
/*==============================================================*/
create table parent 
(
   id_parent            integer                        not null,
   id_admin             integer                        not null,
   nom                  varchar(254)                   null,
   prenom               varchar(254)                   null,
   email                varchar(254)                   null,
   telephone            integer                        null,
   mot_pass             varchar(254)                   null,
   constraint PK_PARENT primary key (id_parent)
);

/*==============================================================*/
/* Index : PARENT_PK                                            */
/*==============================================================*/
create unique index PARENT_PK on parent (
id_parent ASC
);

/*==============================================================*/
/* Index : ASSOCIATION_1_FK                                     */
/*==============================================================*/
create index ASSOCIATION_1_FK on parent (
id_admin ASC
);

alter table classe
   add constraint appartenir foreign key (id_eleve)
      references eleve (id_eleve)
      on update restrict
      on delete restrict;

alter table eleve
   add constraint avoir foreign key (id_parent)
      references parent (id_parent)
      on update restrict
      on delete restrict;

alter table eleve
   add constraint enreigistrer foreign key (id_admin)
      references admin (id_admin)
      on update restrict
      on delete restrict;

alter table inscrit
   add constraint ete foreign key (id_annee)
      references annee (id_annee)
      on update restrict
      on delete restrict;

alter table inscrit
   add constraint "date" foreign key (id_eleve)
      references eleve (id_eleve)
      on update restrict
      on delete restrict;

alter table moyenne
   add constraint posseder foreign key (id_eleve)
      references eleve (id_eleve)
      on update restrict
      on delete restrict;

alter table parent
   add constraint creer foreign key (id_admin)
      references admin (id_admin)
      on update restrict
      on delete restrict;

