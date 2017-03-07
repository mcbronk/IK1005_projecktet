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