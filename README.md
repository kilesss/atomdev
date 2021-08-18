Used vuejs for front-end with Tailwind CSS installed via npv <br>
on backend validation is exported in Different classes controlled from middleware (for this way we receive always clean and validated data in controller)
in controllers is added insert query with Query builder and with eloquent . 

sending of message is exported with new Helper class with static function (on that way we can access it on every controller, lib, or model .Its used static because we don`t need instance for correct working)

It`s need to be configured this variables in env to work sending of message
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null

MAIL_FROM_ADDRESS = admin@test.bg
MAIL_FROM_NAME = admin
MAIL_TO_ADDRESS = info@test.bg
MAIL_TO_NAME = info


Instalation is standart for every laravel project , its userd migrations so it`s need to be execute `php artisan migrate`
