create database apteki;

use apteki;

create table sieci
(
  id_kom int unsigned not null auto_increment primary key,
  nazwakat char(60) not null
);

create table apteki
(
  id char(15) not null primary key,
  nazwa char(100) not null,
  dzielnica char(100) not null,
  ulica char(100) not null,
  miasto char(100) not null,
  id_kom int unsigned not null references sieci(id_kom),
  lon numeric(7,5),
  lat numeric(7,5),
  opis varchar(255)
);

create table ceny
(
  id_cena char(15) not null primary key references apteki(id),
  apap numeric(3,2),
  ibum numeric(3,2),
  2kc numeric(3,2)
);

create table admin
(
  nazwa_uz char(16) not null primary key,
  haslo char(40) not null
);

grant select, insert, update, delete, index, alter, create, drop
on apteki.*
to apteki@localhost identified by 'apteki';
