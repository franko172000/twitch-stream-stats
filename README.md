# Simple Twitch Stats VUE
This is a simple Laravel / Vuejs Classified app

# Downloading the app
Open up a terminal on your machine, navigate to a directory of your choice clone the repo


# Setting up DB
1. Make a copy of the .env.example and save it as .env or rename it to .env
2. Open up the .env file, replace the values shown below with your database configuration.
```bash
DB_DATABASE=your database name
DB_USERNAME=your database user
DB_PASSWORD=your database user password
TWITCH_CLIENT_ID=your twitch client id
TWITCH_CLIENT_SECRET=your twitch secret

```

# Basic setup
Install dependencies
```bash
 Composer install
```
# Run Migrations
```bash
 php artisan migrate
```
# Generate Encryption key
```bash
 php artisan key:gen
```
# Install Laravel Passport

# Start Application
```bash
 php artisan serve
```
# Install Node Dependencies
```bash
 npm install
```
# Run vue in dev mode
```bash
 npm run dev
```
# Run vue in production mode
```bash
 npm run build
```

# Seed Data
1. Start app and signin with your twitch account
2. Go to the application root and run the command below to populate streams
```bash
 php artisan streams:get-active
```

# Author
Anyaso Franklin <br />
franko172000@gmail.com



