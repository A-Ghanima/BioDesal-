# PHP Login Page with Remember Me (Session-based)

This project provides a simple PHP login system using sessions, with optional "Remember Me" functionality that relies on cookies (no tokens or database updates).

---

## ✅ Features

- 🔐 Secure login using **email or username**
- 🔒 Passwords are verified using PHP's built-in `password_verify()`
- 🧠 Sessions are used to track user login
- ☑️ Optional **Remember Me** checkbox that keeps users logged in using a cookie for 30 days
- 🚪 Automatic redirection to `index.php` upon successful login
- ⚠️ Displays error messages when login fails

---

## 💡 How it works

1. Starts a PHP session
2. If the user already has a session, or a "remember me" cookie, they are redirected to the main page
3. On form submission:
   - Inputs are validated
   - User is fetched from the database using a prepared statement
   - Password is checked with `password_verify()`
   - Session variables are set
   - If "Remember Me" is checked, a cookie is stored for 30 days