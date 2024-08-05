# Akademiet prosjekt
Prosjektet inneholder oppgaven som er gitt av Akademiet VGS i Ålesund.

## Skjermbilder
### 05.08
Registrering av ny bruker. 

E-posten må ha gyldig format slik som: staveliem@gmail.com 
definert av regular expression:  /(^)[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;


![image](https://github.com/user-attachments/assets/a4dab948-79b3-4b12-89b4-fd496811d668)

Etter en registrering, lagres brukerdataene i en lokal mysql database. Brukeren har dermed mulighet til å logge inn.

![image](https://github.com/user-attachments/assets/7e9d1630-75af-47b1-b177-acfd4a712b09)

Foreløpig forside. Mangler enda integrasjon med YR api-et. Inspirasjon ved å lagre værdata i tabeller er tatt fra yr.no.

![image](https://github.com/user-attachments/assets/db947681-353e-4ff1-904d-05d99c923ea3)


## Tiltenkt databasestruktur ved utvidelse

![image](https://github.com/user-attachments/assets/2f2f8611-72f7-4df4-ae3b-80d331fa356e)


### Relasjonsforklaringer

**Bruker til Ordre:** En-til-mange (en bruker kan ha mange ordre).
**Ordre til Ordrelinjer:** En-til-mange (en ordre kan inneholde mange ordrelinjer).
**Kurs til Ordrelinjer:** En-til-mange (et kurs kan være i mange ordrelinjer).
**Bruker til påmelding:** En-til-mange (en bruker kan være påmeldt mange kurs).
**Kurs til påmelding:** En-til-mange (et kurs kan ha mange påmeldte).
**Lærer til kurs** En-til-mange (en lærer kan undervise i flere kurs).
