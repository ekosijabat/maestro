# Test - Maestro Application



## Specification

- PHP (v 7.2.34)
- MariaDB (v 11.3.2)
- Framework Laravel (v 5.8)


Package that I used for this project : 
- mews/captcha : to create captcha (for security purpose)
- mailtrap : to send forget password email link

Library that I used for frontend :
- lobibox : to create notification after user copied promo code to clipboard



## Installation

- Execute **git clone https://github.com/ekosijabat/maestro.git** from terminal.
- Make sure to use the correct env variables. Especially for **db name**, **db username**, **db password** and **mailtrap** configuration (use your own mailtrap configuration).
- Run command **php artisan migrate**, **composer dump-autoload**, **php artisan db:seed** (i create banners table), and **php artisan config:cache**
- Finally run command **php artisan serve** from terminal and open browser to access the application.



### Technical:
- For the code structure, I use Repository and Service Pattern.
- I create custom auth to handle login, register and forget password features.
- Also I made maestro.php in config's folder, consist of env variables.


Thank you.
