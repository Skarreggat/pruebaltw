INSTRUCCIONS PER LA INSTAL·LACIO:

/*
Aquest fitxer estarà tant en el correu com en el repositori.
Link del repositori: github.com/Skarreggat/pruebaltw

El projecte està fet amb:
Laravel 5.8.*
Php 7.2.18
Composer 1.9.0
*/

- Descargar el comprimit del projecte i descomprimir-lo a:
    - En cas d'utilitzar Xampp, descomprimir-lo dins de xampp/htdocs.
    - En cas d'utilitzar Wamp, descomprimir-lo dins de wamp64/www.
- Després d'haver encès el xampp/wamp, anar al phpmyadmin i crear una nova base de dades anomenada "pruebaltw".
- Obrir la consola (CMD) i anar a l'ubicació del projecte.
    - En el cas de xampp, escriure : cd C:/xampp/htdocs/pruebaltw-master
    - En el cas de wamp, escriure : cd C:/wamp64/www/pruebaltw-master
- Per crear les taules de la base de dades que s'ha creat anteriorment escriure: php artisan migrate
- (En alguns ordinadors surt un error i en uns altres no, pero en qualsevol ocasió no genera cap problema, les taulse es creen)
- Per omplir les taules amb dades de prova cargades des de els Seeders escriure en aquest ordre:
    - php artisan db:seed --class=ClientsTableSeeder
    - php artisan db:seed --class=TractamentsTableSeeder
    - php artisan db:seed --class=Clients_tractamentsTableSeeder

--- Ja es pot accedir al projecte amb: http://localhost/pruebaltw-master/public/


• Quines fonts d’informació acostumes a consultar en cas de dubtes?
- Curs de php/Laravel/Symfony que tinc d'Udemy
- Stackoverflow
- PHP.net
- w3Schools
• Has utilitzat paquets de tercers per tal d’ampliar funcionalitats de Laravel? Quins i
per a què?
- Si, he utilitzat plantilles d'estils, i paquets de jeremy kennedy per no haver de fer-ho manualment com:
    - Laravel-logger
    - Laravel-roles
    - Laravel-users
    
