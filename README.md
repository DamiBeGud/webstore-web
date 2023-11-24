# Online Suit Store Application

## Overview

This is an online store application developed in PHP that specializes in selling suits. 
The application utilizes Bootstrap 5 for front-end design and requires a local setup to run.

## Installation

To run the application on your local machine, follow these steps:

### 1. Install PHP:
Ensure PHP is installed on your machine.
### 2. Set Up Apache Server:
Install and configure an Apache server on your local machine.
### 3. Database Setup:
  - Set up MySQL or MariaDB database.
  - Create a database named online_store.
  - Execute the SQL code provided in the repository (/database/online_store.sql) to recreate the required tables.
### 4. Port Configuration:
When running the application, make sure it runs on port 3000.

## Usage
  - Clone the repository to your local machine.
    ```
    git clone https://github.com/your-username/online-suit-store.git
    ```
  - Navigate to the project directory.
     ```
     cd online-suit-store
      ```
  - Configure your Apache server to point to the project directory.
  - Access the application through your browser.
    ```
    http://localhost:3000
    ```
## Image Upload
If image uploading does not work, follow these steps:
### Firebase Setup:
Create a Firebase account and set up the Storage service.
### Configuration:
  - Open index.js file in the repository.
  - Update the Firebase configuration section with your Firebase credentials.
     ``` javascript
       // Firebase Configuration
      let firebaseConfig = {
        apiKey: "YOUR_API_KEY",
        authDomain: "YOUR_AUTH_DOMAIN",
        projectId: "YOUR_PROJECT_ID",
        storageBucket: "YOUR_STORAGE_BUCKET",
        messagingSenderId: "YOUR_MESSAGING_SENDER_ID",
        appId: "YOUR_APP_ID"
      };
      ```
  - Save the file.
## Note
  - Ensure that PHP, Apache, and MySQL/MariaDB are correctly configured and running on your local machine.
  - For optimal performance, it is recommended to use modern web browsers.
## Credits
  - Bootstrap 5: https://getbootstrap.com/

