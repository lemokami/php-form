# PHP-Form

A Simple form that checks all the below requirements

- Registration form should contain name, email address, password and confirm password fields.
  - Following validations to be implemented for the fields
    - name field should not be empty
    - email address should not be empty and should be a valid email
    - password should not be empty and will have at least
    - values of both password and confirm password should be equal
  - Registered user should be able to login with email address and password
  - Logged in user should be redirected to the home page where the name and email address of the logged in user should be shown.
  - In the home page, there should be a provision to logout. On logout, the user will be redirected to login page.
  - The user should not be able to access home page unless the user is logged in

## Installation

1. Clone this project
2. Move to the project directory
3. Make sure to install PHP & MySQL
4. Update `$servername`, `$username`,`$password` in bootstrap.php with your mysql servername, username and password
5. Run:

   ```bash
       php run bootstrap.php
   ```

   This will create the necessary database and table. Make sure there is no conflict

6. Update the values `$servername`, `$username`,`$password` in utils/db_conn also.
7. Run the app by:

```bash
   php -S localhost:3000
```

This will run the app at port 3000
