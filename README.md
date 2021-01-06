# KLOP Code Challenge

## Requirement
 * [Docker] - is a tool designed to make it easier to create, deploy, and run applications by using containers.

## Setup guide
* Run docker-compose using this command:
    ```docker
    docker-compose up -d
    ```
* Run migration:
    ```docker
    docker exec -it [container_id] php bin/console migrate
    ```
  
## Mail Configuration
* Change this settings in `.env` file
    ```php
    MAIL_HOST=smtp.mailtrap.io
    MAIL_USERNAME=4ee4bcbb7b9e80
    MAIL_PASSWORD=2c0968e59b3cf8
    MAIL_PORT=2525
    MAIL_ADMIN=from@example.com
    ```
  
 [Docker]: <https://docs.docker.com>
 
 ## Api Docs
 * **Create User**
     ```php
     http://localhost:5000/api/v1/create/user (POST)
     ```
     request body:
     ```json
       {
           "email" : "your_mail@mail.com",
           "name" : "your_name",
           "password" : "your_password"
       }
     ```
     response:
     ```json
       {           
           "message":"success create user "
       }
     ```
 <br />
 
 * **Login**
      ```php
      http://localhost:5000/api/v1/auth (POST)
      ```
      request body:
      ```json
        {
            "email" : "your_mail@mail.com",
            "password" : "your_password"
        }
      ```
      response:
      ```json
        {           
            "token":"MTpodXVhVGRQZnVHeHFFcllhQkRBaDpma2FVTVJQQXFiU0pkY0dWRllwTUFGeVBWYWZHUmdK"
        }
      ```
   `using token to set header type Authorization.`
   
   <br />
   
* **Send Mail**
   ```php
    http://localhost:5000/api/v1/send (POST)
   ```
   request header:
     ```json
   {
       "Authorization": "application/json",
       "Accept": "application/json",
       "Authorization": "MTpodXVhVGRQZnVHeHFFcllhQkRBaDpma2FVTVJQQXFiU0pkY0dWRllwTUFGeVBWYWZHUmdK"
   }
   ```
   request body:
     ```json
     {
          "title": "Hi zubair",
          "body": "welcome"
     }
   ```

   response:  
     ```json
     {
         "message": "success send mail to: your_mail@mail.com"
     }
   ```
