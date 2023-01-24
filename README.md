# HelpDesk
Software Praktikum

HelpDesk wurde mit XAMPP erstellt und getestet mit folgenden Konfigurationen:

Datenbank-Server:
  Server: 127.0.0.1 via TCP/IP
  Server-Typ: MariaDB
  Server-Version: 10.4.25-MariaDB - mariadb.org binary distribution
  Protokoll-Version: 10
  Benutzer: root@localhost
  Server-Zeichensatz: UTF-8 Unicode (utf8mb4)
Webserver:
  Apache/2.4.54 (Win64) OpenSSL/1.1.1p PHP/8.1.10
  Datenbank-Client Version: libmysql - mysqlnd 8.1.10
  PHP-Erweiterung: mysqli Dokumentation curl Dokumentation mbstring Dokumentation
  PHP-Version: 8.1.10
  phpMyAdmin Version 5.2.0

Wichtig: Für das Mailversenden wird formsubmit verwendet. Dies funktioniert nur im Chrome Browser ordnungsgemäß!!!

Schritte um Projekt auf Maschine zum Laufen zu bringen:
1. XAMPP installieren
2. Repository downloaden
3. Dateien im XAMPP-Ordner unter C:\xampp\htdocs in einem neuen Ordner namens HelpDesk speichern
4. XAMPP Apache und Mysql auf Control Panel starten
5. Im Webbrowser 'http://localhost/phpmyadmin/' aufrufen
6. Auf dieser Seite eine neue Datenbank erstellen mit den Namen 'helpdesk'
7. Datei helpdesk.sql aus dem GitHub-Projekt importieren
8. Im Browser 'http://localhost/HelpDesk/' aufrufen um Ticket abschicken zu können
9. Im Browser 'http://localhost/HelpDesk/ticketsystem.php' aufrufen um Ticketübersicht zu sehen und Ticket auf Status gelöst setzen zu können.

Anm:
1.  Falls bei der Datenbank andere Standardwerte verwendet werden, z.B.Passwort vergeben oder
    ein anderer Benutzername, dann kann man diese unter include/config.php eintragen.
2. Die Funktion eine Mail mit formsubmit zu versenden funktioniert nur im Browser Chrome.
