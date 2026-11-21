
# Name der Anwendung: AGAES
E-Mail-Adresse für die Kontaktaufnahme mit AGAES: borelware@gmail.com

# Schulverwaltung: Kamerunisches System

Webanwendung zur Verwaltung von Bildungseinrichtungen, die das Versenden von SMS, die Verwaltung von Klassen, Fächern, Schulgebühren, Schülern, Lehrern, Noten, Zeugnissen, Anwesenheiten und Abwesenheiten sowie die Erstellung statistischer Berichte ermöglicht.
AGAES ist mehrbenutzerfähig. Jeder Benutzer besitzt einen Benutzernamen und ein Passwort zur Anmeldung und kann eine oder mehrere Rollen innehaben.

## Technologien
Backend: PHP
Frontend: HTML, CSS, JAVASCRIPT
Datenbank: MySQL

## Erste Schritte
Wampserver installieren, falls noch nicht installiert
Die Datei AGAES_PROJEKT.zip entpacken
Den Ordner AGAES_PROJEKT in den www-Ordner von Wampserver verschieben

## Dateien im Stammverzeichnis des Ordners AGAES_PROJEKT
- `index.php` : Startseite, die die Hauptmodule der Software präsentiert
- `lesmenus.php` : Dashboard für jeden Benutzertyp
- `agaesbd.txt` : Datenbank von AGAES
- `lesfunctions.php`, `lesmenushoriz.php`, `lesmenushoriz2.php`, `inscripfunction.php`, `lesemplois.php`,
`bullinfo.php` : Diese Dateien enthalten alle Funktionen, die in dieser Anwendung verwendet werden.

- `lienC2.php` : Verbindung zur Datenbank `agaesbd`

## Ordner im Stammverzeichnis des Ordners AGAES_PROJEKT
- `ESSAI` : Repräsentiert den Ordner einer Einrichtung (Test)
***** Dateien im Ordner `ESSAI` ****
- `bd.txt` enthält die Datenbank für den Test

## Structure du projet

 
AGAES_PROJEKT/
├── index.php
├── bullinfo.php
├── lienC2.php
├── agaesbd.txt
├── ...
├── ESSAI/ 
    ├──   index.php
    ├──   lien.php
    ├──   connecterC.php
    ├──   essaibd.txt
    ├──   ...

└── README.md



## Start
Erstellen Sie die Datenbank agaesbd und erstellen Sie ihre Tabellen unter phpMyAdmin.
Die Tabellen der Datenbank agaesbd befinden sich in der Datei agaesbd.txt im Stammverzeichnis.

Erstellen Sie die Datenbank essaibd und erstellen Sie ihre Tabellen unter phpMyAdmin.
Die Tabellen der Datenbank essaibd befinden sich in der Datei essaibd.txt im Ordner `ESSAI`.

Unter Wampserver
ist die Adresse, die in die Adressleiste des Browsers eingegeben werden muss, wie folgt:
http://localhost/AGAES_PROJEKT/ESSAI
Unter einem Hostinganbieter online
ersetzen Sie 'http://localhost/' durch Ihren Domainnamen oder Subdomain.

Klicken Sie auf 'Se connecter'.
Administrator
`Benutzername`: test
`Passwort`: test
Das Schuljahr, das bereits Daten zum Testen enthält, ist 2025/2026.

## Erstellung einer neuen Einrichtung
Wenn eine neue Schule hinzugefügt werden muss, gehen Sie wie folgt vor:
- Erstellung ihrer Datenbank
- Erstellen Sie einen neuen Ordner (Beispiel: schule1)
- Kopieren Sie den Inhalt des Ordners `ESSAI` in den Ordner schule1
- Kopieren Sie den Inhalt der Datei `leere_datenbank.txt`, die sich im Ordner `ESSAI` befindet, in den für SQL-Abfragen der Datenbank vorgesehenen Bereich in `phpmyadmin`, und führen Sie dann die Abfrage aus. Der Inhalt dieser Datei stellt die Tabellen der Datenbank dar.

- In der Tabelle `prorogation` das Feld `date` aufrufen, um das Ablaufdatum des Abonnements für diese neu erstellte Einrichtung zu ändern. (Ein zukünftiges Datum wählen)
Das ermöglicht es, das Enddatum des Abonnements festzulegen.
Wenn das Datum abgelaufen ist, werden bestimmte Funktionen gesperrt.

   - Konfigurieren Sie im Datei `lien.php`, die sich im Ordner schule1 befindet, die Verbindungsparameter zur Datenbank der neuen Einrichtung.  
Darinnen kann man:  
- die Verbindungsparameter der Datenbank ändern

Wenn der Ordner der Einrichtung 'Schule1' heißt, dann  
die Adresse, die in die Adressleiste des Browsers eingegeben werden muss:  
http://localhost/AGAES_PROJEKT/Schule1

- Klicken Sie im Fußbereich der angezeigten Oberfläche auf Webmaster  
`Benutzername`: web  
`Passwort`: web  
- Einloggen und den Gründer dieser Einrichtung registrieren

## Rollen
- Administrator (Gründer, Schulleiter, Zensor, Verwalter, Sekretär, Generalaufseher)
- Lehrer
- Eltern/Schüler

## Funktionen

- Ein Mitglied der Verwaltung hinzufügen (Webmaster, Gründer)
- Klassen und Fächer einrichten (Gründer)
- Die Kosten der Schulbildung festlegen (Gründer, Schulleiter)
- Einen Schüler einschreiben, Schulgebühren bezahlen (Gründer, Verwalter)
- Den Finanzbericht einsehen (Gründer, Verwalter)
- Persönliche Daten eines Schülers ändern (Gründer, Schulleiter, Sekretär, Zensor, Verwalter)
- Einen Schüler löschen, eine Zahlung ändern oder löschen (Gründer)
- Hinzufügen, Löschen und Ändern der Daten eines Lehrers (Gründer, Direktor, Sekretär, Schulrat)
- Zuweisen von Fächern und Klassen an Lehrer (Gründer, Direktor, Sekretär, Schulrat)
- Verwaltung der Fehlstunden der Schüler (Gründer, Direktor, Sekretär, Schulrat, Oberaufseher)
- Noten eingeben (Gründer, Direktor, Sekretär, Schulrat, Lehrer)
- Eingabe der Noten sperren (Gründer, Direktor)
Jeder Lehrer gibt die für ihn relevanten Noten ein
- Erfassen der geleisteten Stunden der Lehrer (Gründer, Direktor, Sekretär, Schulrat)
- Speicherung der Gehaltszahlungen (Gründer, Direktor)
- Drucken der Quartalsergebnisse der Schüler (Gründer, Direktor, Sekretär, Schulrat)
- SMS versenden (Gründer, Direktor)
- Versand von Prüfungsaufgaben und Übungsarbeiten (Gründer, Direktor, Sekretär, Schulrat, Lehrer)
- Eltern oder Schüler können den Stand ihrer Schulbildung und Fehlstunden einsehen ...

## Erklärungen zu den Datenbanken
Jede hinzugefügte Einrichtung hat Anspruch auf eine Datenbank und Akte, die erstellt werden müssen.
Beispielsweise hat unsere Testeinrichtung die Akte ESSAI. Ihre Datenbank ist `essaibd`.

== Die Tabellen sind für die Entwicklung nicht mehr aktuell, dürfen aber unter keinen Umständen geändert werden, da sie die Tabellen der alten Versionen darstellen ==
`1ere_sequence`, `2eme_sequence`, `3eme_sequence`, `4eme_sequence`,
`5eme_sequence`, `6eme_sequence`, `7eme_sequence`, `8eme_sequence`, `9eme_sequence`,
`admini`, `classe1`, `3eme_sequence`, `competence`, `competenceclas`, `3eme_sequence`, `eleve1`,
`enseignantanc`, `evaluation`, `honneur`, `matiere1`, `moyenne`, `moyenneannuel`, `moyennetrim`, `moymatieretrim`,
`moymatiereeval`, `3eme_sequence`, `note`, `notegroupval`, `notenew`, `notetrimestre`, `proof`,
`proofdetail`, `proofmdifdetail`, `schuler`, `schulerdetail`, `trim1`, `trim2`, `trim3`,

== Alle folgenden Tabellen sind aktuell
`absence` speichert die Abwesenheiten der Schüler
`admin` speichert die persönlichen Daten der Administratoren und Webmaster
`admin_poste` speichert die Identifikationen der Administratoren und deren verschiedene Rollen
`admin_salaire` speichert die Identifikationen der Administratoren und deren Gehälter
`autrefrais` speichert die Gründe für fakultative Gebühren bei der Anmeldung
`autrefraispaye` speichert die Zahlungen der fakultativen Gebühren
`batiment` speichert die Informationen der Gebäude der Einrichtung
`classe` speichert die Klassen der Einrichtung
`cordon` speichert die Konfiguration der Schulgebühren
`delai` ermöglicht das Sperren der Noteneingabe
`detail` ermöglicht es, verschiedene fällige Gebühren und die Zahlungen des Schulgeldes der Schüler zu speichern.  
`devise` ist die Währung, die bei der Anzeige der Zahlungen verwendet wird.  
`eleve` speichert die persönlichen Daten der Schüler und ihre Klassen in einem Schuljahr.  
`emploi` speichert die Identifikationen der Lehrer, der Fächer, der Klassen und der Tage für die Erstellung des Stundenplans.  
`enseigmatclass` speichert die Identifikationen der Fächer (`idmat`), der Klassen (`idclas`), der Lehrer (`idens`), des Schuljahres (`anens`) sowie das Feld `titulaire`, um den Klassenlehrer zu bezeichnen.  
`enseignant` speichert die persönlichen Daten der Lehrer.  
`enseigsalaire` speichert die Gehaltstabelle jedes Lehrers (pro Stunde oder festem Satz).  
`evaltrim` speichert die maximale Anzahl von Bewertungen pro Trimester in jeder Klasse. Man hat
Die Identifikatoren für die Klasse (`idcl`), der Code des Trimesters (`codetrim`), die Anzahl der Bewertungen des Trimesters (`nbre`), das Schuljahr (`anens`) `exam` speichert die Zahlungen der Prüfungsgebühren der Schüler `fact` wird verwendet, um die internen Matrikelnummern für jeden Schüler in der Anwendung zu erstellen. Jeder Schüler hat zunächst eine nationale Matrikelnummer, die vom Ministerium für Sekundarbildung bereitgestellt wird. Diese Matrikelnummer ist hier in AGAES bei der Einschreibung des Schülers einzugeben. Somit besitzt der Schüler in unserem System sowohl eine nationale Matrikelnummer als auch eine interne Matrikelnummer. Die interne Matrikelnummer wird für die Datenverarbeitung verwendet.  

Das Sekundarschulsystem ist auf 3 Trimester organisiert. Angesichts dessen und der großen Schülerzahl befinden sich die Noten jedes Trimesters in jeder Tabelle.  

`marktrim1` speichert die Noten des ersten Trimesters jedes Schülers.
Diese Tabelle ist wie folgt organisiert: die Schülernummer (`matelev`), die Klasse (`idcl`), das Fach (`idmat`), die Fachgruppe (`idgp`), die Note eines Fachs der ersten Bewertung des Trimesters (`mark1`), die Note eines Fachs der zweiten Bewertung des Trimesters (`mark2`), die Note eines Fachs der dritten Bewertung des Trimesters (`mark3`), die Trimesternote eines Fachs im Trimester (`notetrim`), der Koeffizient des Fachs (`coef`), die gewichtete Trimesternote des Fachs im Trimester 1 (`notrimcoef`), die gewichteten Noten jedes Fachs in der ersten Bewertung des Trimesters (`m1c`), der zweiten Bewertung (`m2c`), der dritten Bewertung (`m3c`) (`rg1`), (`rg2`), (`rg3`) (`rgtrim`), die jeweiligen Ränge der Schüler in jeder Bewertung und im Trimester.

(`compet1`), (`compet2`), (`compet3`) die jeweils in einem Fach im Trimester bewerteten Kompetenzen
(`mcltrim`) der allgemeine Trimesterdurchschnitt einer Klasse in einem Fach
(`mintrim`) der kleinste Trimesterdurchschnitt einer Klasse in einem Fach
(`maxtrim`) der größte Trimesterdurchschnitt einer Klasse in einem Fach
(`cpse`) Anzahl der in einer Klasse in einem Fach bewerteten Schüler
(`adm`) die Anzahl der in einer Klasse in einem Fach zugelassenen Schüler
(`pctrim`) Erfolgsquote der in einer Klasse in einem Fach bewerteten Schüler

Diese vorherige Konfiguration ist gleich im 2. Trimester (`marktrim2`) und 3. Trimester (`marktrim3`).
(`markmoytrim1`), (`markmoytrimé2`), (`markmoytrim3`) enthalten die vierteljährlichen Durchschnittswerte und Bewertungen jedes Schülers.

(`markgrouptrim1`), (`markgrouptrimé2`), (`markgrouptrim3`) enthalten die vierteljährlichen Durchschnittswerte jeder Fachgruppe jedes Schülers.

Die Tabelle (`pointage`) enthält die von den Lehrern unterrichteten Stunden.
Die Tabelle (`prorogation`) erlaubt es, das maximale Datum für das Abonnement der Einrichtung einzutragen.
Die Tabelle (`remise`) enthält die Arten von Schulgebührenermäßigungen, die den Schülern gewährt werden.
Die Tabelle (`retard`) erlaubt es, die Verspätungen der Schüler in der Schule zu erfassen.
Die Tabelle (`salaire`) die Gehaltszahlungen der Lehrer.
Die Tabelle (`salaireadmin`) die Gehaltszahlungen der Verwaltungsmitarbeiter.
Die Tabelle (`sujet`) ermöglicht das Speichern der Bewertungsthemen und der geleiteten Arbeiten.