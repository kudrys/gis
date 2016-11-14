use apteki;

INSERT INTO sieci VALUES (1,'DoZ');
INSERT INTO sieci VALUES (2,'Dy�urna');
INSERT INTO sieci VALUES (5,'DomLek�w');
INSERT INTO sieci VALUES (6,'Sieciowa');

INSERT INTO apteki VALUES ('C1','Dom Lek�w','Kie�pinek','Szcz�liwa 3','Gda�sk',5,18.52587,54.34997,'APAP 4,49 IBUM 8,69 2KC 5,19');
INSERT INTO apteki VALUES ('C2','Dom Lek�w','Che�m','Cienista 14c','Gda�sk',6,18.62820,54.33767,'APAP 4,99 IBUM 8,99 2KC 5,49');
INSERT INTO apteki VALUES ('D1','Apteka Sieciowa','Orunia G�rna','Malomiejska 31','Gda�sk',6,18.61282,54.32744,'APAP 4,99 IBUM 8,99 2KC 5,49');
INSERT INTO apteki VALUES ('D2','Apteka Sieciowa','Suchanino','Beethovena 11','Gda�sk',6,18.61594,54.35555,'APAP 4,69 IBUM 8,89 2KC 5,59');
INSERT INTO apteki VALUES ('D3','Apteka Sieciowa','�r�dmie�cie','Wapiennicza','Gda�sk',6,18.66199,54.35447,'APAP 4,69 IBUM 8,89 2KC 5,59');
INSERT INTO apteki VALUES ('D4','Apteka Sieciowa','Anio�ki','Al. Zwyci�stwa 13','Gda�sk',6,18.62773,54.37134,'APAP 4,99 IBUM 8,99 2KC 5,49');
INSERT INTO apteki VALUES ('A1','Dbam o Zdrowie','Uje�cisko','�wi�tokrzyska 2','Gda�sk',1,18.60790,54.32619,'APAP 4,19 IBUM 9,19 2KC 5,39');
INSERT INTO apteki VALUES ('A2','Dbam o Zdrowie','�r�dmie�cie','D�browskiego 4','Gda�sk',1,18.64060,54.35916,'APAP 4,19 IBUM 9,19 2KC 5,39');
INSERT INTO apteki VALUES ('A3','Dbam o Zdrowie','Orunia','Trakt �wi�tego Wojciecha 43/45','Gda�sk',1,18.63553,54.33340,'APAP 4,39 IBUM 9,29 2KC 5,29');
INSERT INTO apteki VALUES ('A4','Dbam o Zdrowie','Rudniki','Mia�ki Szlak 14','Gda�sk',1,18.68251,54.34847,'APAP 4,39 IBUM 9,29 2KC 5,29');
INSERT INTO apteki VALUES ('A5','Dbam o Zdrowie','Nowy Port','Oliwska 37','Gda�sk',1,18.66371,54.40271,'APAP 4,59 IBUM 9,19 2KC 5,39');
INSERT INTO apteki VALUES ('C3','Dom Lek�w','Z�ota Karczma','Z�ota Karczma','Gda�sk',2,18.51915,54.36697,'APAP 4,89 IBUM 8,79 2KC 5,39');
INSERT INTO apteki VALUES ('B1','Apteka Dy�urna','Jasie�','Jana Pa�ubickiego 1','Gda�sk',2,18.55422,54.33956,'APAP 4,89 IBUM 8,79 2KC 5,39');
INSERT INTO apteki VALUES ('B2','Apteka Dy�urna','Orunia G�rna','�wi�tokrzyska 1','Gda�sk',2,18.61018,54.32665,'APAP 4,79 IBUM 8,69 2KC 5,49');
INSERT INTO apteki VALUES ('B3','Apteka Dy�urna','Siedlce','�ostowicka 4','Gda�sk',2,18.60427,54.34614,'APAP 4,79 IBUM 8,89 2KC 5,49');
INSERT INTO apteki VALUES ('B4','Apteka Dy�urna','Wrzeszcz','Grunwaldzka 161','Gda�sk',2,18.59672,54.38410,'APAP 4,69 IBUM 8,79 2KC 5,39');

INSERT INTO admin VALUES ('admin',sha1('admin'));
