# Oppgave fullstackutvikler

Oppgavene kan løses i valgfritt språk / teknologistack, men må være en kombinasjon av HTML, CSS og valgfritt språk for håndtering av logikken. Hvor mange av og i hvilken rekkefølge du løser de valgfrie oppgavene velger du selv, men du bør velge minimum 2-3 for en juniorstilling og 5-6 for en seniorstilling.
Noen kan være tidkrevende og det er ikke forventet at man løser alle.

Det er ingen krav om at løsningen skal være tilgjengelig utenom på din lokale maskin. Vi går igjennom kode og sluttresultat ved at du deler skjerm på Teams.

Kode sendes inn som en zip-fil, tarball eller link til et Git-repository et par dager før intervju til devnull@uke.oslo.kommune.no. Hvis du bruker Git, sørg for at det er et offentlig repository slik at vi kan se koden.

## Obligatorisk oppgave

Lag et program hvor man kan angi romertall i sin enkleste form og få verdien ut som vanlig tall. F.eks. I = 1, V = 5, X = 10, L = 50, C = 100.

## Valgfrie oppgaver

### Valgfri oppgave - mer kompleksistet

- Utvid programmet til å kunne angi mer komplekse tall, f.eks IV, XII, XIV, IVC, CCCXLVI og MIX.

### Valgfri oppgave - kvalitetssikring

- Legg til tester som viser at programmet fungerer som tiltenkt

### Valgfri oppgave - brukergrensesnitt

- Bruk Oslo kommune sitt komponentbibliotek (https://styleguide.oslo.kommune.no)
- Som et minimum, ta i bruk følgende komponenter:
  - Grid for å plassere elementer
  - Header og footer
  - Button
  - Input text
- Utvid gjerne med egen CSS hvis ønskelig

### Valgfri oppgave - universell utforming

- Gjør programmet UU-vennlig (oppnå WCAG 2.1 AA).
- Legg til en feilmelding hvis man forsøker sende inn skjemaet uten å fylle ut tekstfeltet.

### Valgfri oppgave - Skille frontend og backend

- Flytt kalkuleringen av romertall til et REST-API som kan nås via HTTP.
- Hold frontend separat fra backend (eget prosjekt) og bruk HTTP for å kommunisere mellom frontend og backend.

### Valgfri oppgave - containerisering

- Kjør løsningen(e) i en eller flere Docker-containere.

### Valgfri oppgave - versjonskontroll

- Legg prosjektet under versjonskontroll med Git.
- Vis bruk av Git ved å lage en feature branch for hver valgfri oppgave du har valgt å gjøre og commits innenfor hver branch.
- Samle alle feature branches i en develop/test/main branch før gjennomgang slik at vi kan se programmet fungere i sin helhet.

### Valgfri oppgave - database

- Lagre historikk over alle konverteringer og når de skjedde i en relasjonsdatabase eller key/value-store.

### Valgfri oppgave - sikkerhet

- Følg OWASP sine retningslinjer for sikkerhet.
- Sørg for at all brukerdata validerer og gir en feilmelding hvis den ikke er gyldig.

### Valgfri oppgave - frontend bygg

- Bruk et byggeverktøy for å bygge Oslo styleguide fra kilde, f.eks. Webpack eller Parcel.

## Tips

- Romertall: https://dev.to/thefern/roman-numeral-converter-3l11
- Universell utforming: https://www.uutilsynet.no/
- Ferdig CSS fra komponentbiblioteket: https://ukeweb-styleguide-cdn.s3.eu-central-1.amazonaws.com/0.99.104/osg.css
- OWASP Top 10: https://owasp.org/Top10/
