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

