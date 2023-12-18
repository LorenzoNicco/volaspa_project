# Home Project

## Funzionamento del progetto
L'applicazione è costruita usando Laravel e Blade per la gestione di front-end e back-end.
Sfruttando il pacchetto Breeze di Laravel, ho impostato il processo di autenticazione iniziale che l'utente deve effettuare per poter entrare nella dashboard, dove potrà poi cercare il film desiderato.

La ricerca avviene tramite il riempimento di uno dei due form presenti nella dashboard (ricerca tramite titolo o id), i quali invieranno i dati al controller nel back-end, dove verrà effettuata la chiamata API vera e propria al sito di omdbapi.com.

Nel controller viene effettuato un primo controllo per determinare quale dei due form sia stato usato per inviare i dati, dopodiché viene effettuata la chiamata API usando la facade Http di Laravel.
La chiamata viene costruita concatenando l'endpoint del sito con i dati arrivati dal form riempito nel front-end.
I dati del film ricercato vengono poi rimandati al front-end con una response in formato json, che verrà usata per riempire la pagina contenente il risultato della ricerca. Se la ricerca non avesse riportato nessun risultato, comparirà un messaggio che invita a riprovare.

Nel caso l'utente volesse effettuare un'altra ricerca, sarà sufficente cliccare nel link alla dashboard presente nell'header.

La parte di stilizzazione del front-end è stata fatta Tailwind e Daisy UI per sintetizzarne la scrttura delle classi ed avere un codice più comprensibile e manutenibile. Ho usato una flag impostata nel back end per determinare quale visualizzazione verrà attivata una volta ottenuto il risultato della ricerca.

Per la registrazione dell'utente ho creato un database relazionale con Php My Admin.

## Tecnologie usate
**Front-end**: Blade
**Back-end**: Laravel
**Autenticazione**: Breeze
**Chiamata API**: Guzzle HTTP Client
**Stile**: Tailwind, Daisy UI

## Installazione
Usando la cartella .zip, i pacchetti sono già installati nel progetto, ma sarà comunque necessario effettuare la connessione ad un database relazionale inserendo i parametri di connessione nel file .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=project_volaspa
DB_USERNAME=root
DB_PASSWORD=root

e lanciare dal terminale il comando:
`php artisan migrate`

Per l'avvio del progetto dobbiamo aprire due terminali, nei quali scriveremo rispettivamente i comndi:
`npm run dev`
`php artisan serve`

Navigando poi alla pagina http://127.0.0.1:8000 che comparirà nel terminale dove abbiamo fatto php artisan serve, accederemo all'applicazione.



Nel caso il codice venga preso dalla repo su GitHub, è necessario clonare la repo in locale dalla voce **code**. Una volta aperto il progetto, il file **.env.example** deve esse copiato e rinominato in **.env** e qui devono essere aggiunte le credenziali per il collegamento al database.
In un terminale devono essere eseguiti i seguenti comandi per installare l'applicazione:
`composer install`
`php artisan key:generate`
`npm install`
`php artisan migrate`
`npm run dev`

A questo punto, in un secondo terminale, eseguiamo il comando
`php artisan serve`

Navigando poi alla pagina http://127.0.0.1:8000 che comparirà nel terminale dove abbiamo fatto php artisan serve, accederemo all'applicazione.