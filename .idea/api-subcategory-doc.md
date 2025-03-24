# Subcategory

The endpoint controls the subcategories resource.
These are simple APIs.

## Retrieve subcategories [/api/v1/mobile/subcategory/index]

Retrieve the subcategories information that corresponds to the passed parameters by category id.

### POST

+ Parameters
    + category_id (string base64 text) --required

+ Response 200 (application/json; charset=utf-8)

    + Body

           {
            "code": 200,
            "status": "success",
            "message": "Index success",
            "data": [
                        {
                            "id": "42921Mg==50573",
                            "name": "Subcategory 2",
                            "name_other": "ប្រភេទ 2",
                            "description": "2 Description in English ... ",
                            "description_other": "2 Description in Cambodia ... "
                        },
                        {
                            "id": "38051MTU=35897",
                            "name": "Subcategory 15",
                            "name_other": "ប្រភេទ 15",
                            "description": "15 Description in English ... ",
                            "description_other": "15 Description in Cambodia ... "
                        },
                    ]
            }

## Detail subcategory [/api/v1/mobile/subcategory/detail]

Retrieve the subcategory information that corresponds to the passed parameters.

### POST

+ Parameters
    + id (string base64 text) --required

+ Response 200 (application/json; charset=utf-8)

    + Body

            {
                "code": 200,
                "status": "success",
                "message": "Detail success",
                "data": {
                    "id": "92204MQ==23589",
                    "name": "Subcategory 1",
                    "name_other": "ប្រភេទ 1",
                    "description": "1 Description in English ... ",
                    "description_other": "1 Description in Cambodia ... "
                }
            }      

+ Response 400 (application/json; charset=utf-8)

      Response 400 will be returned, if there is no subcategory specified.

      + Body

            {
                "code": 400,
                "status": "failed",
                "message": "Attempt to read property \"id\" on null"
            }

