CREATE PROCEDURE h15ExclusiveWatches_addWatch(
IN inID int(10),
IN inName varchar(255),
IN inBrand varchar(60),
IN inCategory varchar(255),
IN inDesc varchar(500),
IN inStatus int(10),
IN inPrice decimal (10,0),
IN inPIC varchar (255)
)
BEGIN
INSERT INTO h15_exlusivewatches
(ID, Namn, Marke, Kategori, Beskrivning, Lager, Pris, Bildurl)
VALUES
(inID, inName, inBrand, inCategory, inDesc, inStatus, inPrice, inPIC);
END##


CREATE PROCEDURE h15exlusivewatches_updateWatch (
IN inID int(10),
IN inNamn varchar(255),
IN inMarke varchar(60),
IN inKategori varchar(255),
IN inBeskrivning varchar(500),
IN inLager int(10),
IN inPris decimal(10,0),
IN inBildurl varchar(255)
)
BEGIN
UPDATE h15_exlusivewatches
SET ID = inID,
Name= inNamn,
Marke = inMarke,
Kategori = inKategori,
Beskrivning= inBeskrivning,
Lager = inLager,
Pris = inPris,
Bildurl = inBildurl
WHERE ID = inID;
END##