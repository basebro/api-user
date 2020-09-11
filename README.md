
# Restful API in Symfony 4

When we install this repo, we will have a Symfony application with FOSUserBundle Ready to use, 
an API with FOSRestBundle protected with Oauth2 Token based on FOSOauthServerBundle.

## How to install?

- *download the repository*
- *composer install*
- *create your own .env file with your database config*
- *php bin/console doctrine:database:create*
- *php bin/console make:migration*
- *php bin/console doctrine:migrations:migrate*
- *php bin/console doctrine:fixtures:load*



## Endpoints
- *We have two endpoints:*
/api/user_info [GET]
/api/user_info [POST]

- *We have an endpoint to manage the token (we can refresh the token too):*
-/oauth/v2/token

### Example: 


Insert the data below in the body with x-www-form-urlencode:

        grant_type:password
        client_id:1_ourRandomId
        client_secret:ourSecretToken
        username:admin
        password:admin

and we should get a response like:

    {
        "access_token": "ZTFjM2UzNDA2Zjk3ZWVlYzkzOTc4NDMxZTc4NzljZTlkZTkyN2ZiZTlhMjVlNTU2MzAxZWFhYTIyMTkyNmUyOQ",
        "expires_in": 3600,
        "token_type": "bearer",
        "scope": null,
        "refresh_token": "YjAzMGQ2NGMyMmQyZThmZDQ5MGNmMWM2NzY5ZDcxMjY5ZmIyNTEyMGQ3OWVlNGM2NmIwY2YxMDgzOWQxNWFmMA"
    }

## FOSUserBundle
 *We have this bundle ready to use*
- */login or /register are some paths you can use*
- *You can manage the users through /users list view*