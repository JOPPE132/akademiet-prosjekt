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

### 06.08

Implementert fetch fra yr api. Viser temperaetur for nå og de neste 2 timene. 

![image](https://github.com/user-attachments/assets/1305df29-b776-42e3-8463-9240a20cf71d)

Stemmer godt med temperaturene som ligger for Trondheim på yr.no. Kunne kanskje kjørt noe avrunding.

![image](https://github.com/user-attachments/assets/60f1d5a2-fe22-45bf-8c66-d2b519a269cf)

Validering i registreringsskjema både i front- og backend.

![image](https://github.com/user-attachments/assets/d3445c55-e041-415b-b3de-9a3811a569cf)

Validering i innloggingsskjema.

![image](https://github.com/user-attachments/assets/59e89062-1632-4de5-b563-0873d3325c21)

Hamburger menu ved (max-width: 440px) 

![image](https://github.com/user-attachments/assets/e37eded6-d041-4df3-9df4-42e4bf42681d)

![image](https://github.com/user-attachments/assets/1a430ea4-8832-41b1-8941-007b0ab0946e)

## Tiltenkt databasestruktur ved utvidelse

![image](https://github.com/user-attachments/assets/2f2f8611-72f7-4df4-ae3b-80d331fa356e)

### 07.08

Prøver å benytte laravels direktiver for bedre lesbarhet og vedlikehold. 

![image](https://github.com/user-attachments/assets/9e9a56f1-903e-44be-9d2b-190aed9e43e3)



### Relasjonsforklaringer

- **Bruker til Ordre:** En-til-mange (en bruker kan ha mange ordre).
- **Ordre til Ordrelinjer:** En-til-mange (en ordre kan inneholde mange ordrelinjer).
- **Kurs til Ordrelinjer:** En-til-mange (et kurs kan være i mange ordrelinjer).
- **Bruker til påmelding:** En-til-mange (en bruker kan være påmeldt mange kurs).
- **Kurs til påmelding:** En-til-mange (et kurs kan ha mange påmeldte).
- **Lærer til kurs** En-til-mange (en lærer kan undervise i flere kurs).
