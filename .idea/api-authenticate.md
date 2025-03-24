# Authenticate

The endpoint controls the Authenticate resource.
These are simple APIs.

## Retrieve countries [/api/v1/mobile/registration-success]

This api directly register to users table and generate dynamic token (Powered by - Laravel Sanctum)

### POST

#### One Tap Params (One Tap Register)

+ Parameters
    + oauth_id (string)
    + oauth_provider (string)

#### Normal Params (Normal Register)

+ Parameters
    + name (string)
    + email (string)

+ Response 200 (application/json; charset=utf-8)

    + Body

            {
                "code": 200,
                "status": "success",
                "message": "Registration Pass",
                "data": {
                    "user_info": {
                        "id": "82585MzU=20475",
                        "name": "Hello",
                        "email": "hello@gmial.com",
                        "oauth_id": null,
                        "oauth_provider": null
                    },
                    "token": "dynamic token"
                }
            }



