\# PHP Login Script



This is a simple and secure PHP login script that handles user authentication using \*\*email or username\*\*, and \*\*hashed passwords\*\* with `password\_verify()`.



---



\## 📄 File: `login.php`



\### 🔐 Features:

\- Uses \*\*MySQLi prepared statements\*\* to prevent SQL injection.

\- Supports login using \*\*email or username\*\*.

\- Verifies passwords using PHP's `password\_verify()`.

\- Uses \*\*sessions\*\* to keep users logged in.

\- Automatically redirects to `index.php` upon successful login.



---



\## ⚙️ Requirements:

\- PHP 7.0+

\- MySQL Database

\- `config/db.php` file with a valid MySQLi connection.



---



\## 📦 `db.php` Example:

```php

<?php

$host = 'localhost';

$db\_user = 'root';

$db\_pass = '';

$db\_name = 'your\_database\_name';



$conn = new mysqli($host, $db\_user, $db\_pass, $db\_name);



if ($conn->connect\_error) {

&nbsp;   die('Database connection failed: ' . $conn->connect\_error);

}

?>



