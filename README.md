Used vuejs for front-end with Tailwind CSS installed via npv <br>
on backend validation is exported in Different classes controlled from middleware (for this way we receive always clean and validated data in controller)
in controllers is added insert query with Query builder and with eloquent .<br> 
<br>
sending of message is exported with new Helper class with static function (on that way we can access it on every controller, lib, or model .Its used static because we don`t need instance for correct working)<br>
<br>
It`s need to be configured this variables in env to work sending of message<br>
MAIL_MAILER=smtp<br>
MAIL_HOST=smtp.mailtrap.io<br>
MAIL_PORT=2525<br>
MAIL_USERNAME=null<br>
MAIL_PASSWORD=null<br>
MAIL_ENCRYPTION=null<br>
MAIL_FROM_ADDRESS=null<br>
<br>
MAIL_FROM_ADDRESS = admin@test.bg<br>
MAIL_FROM_NAME = admin<br>
MAIL_TO_ADDRESS = info@test.bg<br>
MAIL_TO_NAME = info<br>


Instalation is standart for every laravel project , its userd migrations so it`s need to be execute `php artisan migrate`<br>
