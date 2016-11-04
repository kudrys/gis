create database stacje_paliw;

use stacje_paliw;

create table kompania
(
  id_kom int unsigned not null auto_increment primary key,
  nazwakat char(60) not null
) ;

create table stacje
(
  id char(15) not null primary key,
  nazwa char(100) not null,
  dzielnica char(100) not null,
  ulica char(100) not null,
  miasto char(100) not null,
  id_kom int unsigned not null references kompania(id_kom),
  lon float(7,5),
  lat float(7,5),
  opis varchar(255)
) ;

create table ceny
(
  id_cena char(15) not null primary key references stacje(id),
  pb95 float(3,2),
  ropa float(3,2),
  gaz float(3,2)
);

create table admin
(
  nazwa_uz char(16) not null primary key,
  haslo char(40) not null
);

grant select, insert, update, delete, index, alter, create, drop
on stacje_paliw.*
to stacje_paliw@localhost identified by 'stacje_paliw';
