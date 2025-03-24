# Category

The endpoint controls the categories resource.
These are simple APIs.

## Retrieve categories [/api/v1/mobile/category/index]

Retrieve the categories information that corresponds to the passed parameters.

### POST

- Parameters

  - --

- Response 200 (application/json; charset=utf-8)

  - Body

          {
              "code": 200,
              "status": "success",
              "message": "Index success",
              "data": [
                        {
                            "id": "MQ==",
                            "name": "ប្រភេទ 1",
                            "name_other": "Category1",
                            "description": "1 Description in Cambodia ... ",
                            "description_other": "1 Description in English ... ",
                            "subcategories": [
                                    {
                                        "id": "Mw==",
                                        "name": "Subcategory 3",
                                        "name_other": "ប្រភេទ 3",
                                        "description": "3 Description in English ... ",
                                        "description_other": "3 Description in Cambodia ... "
                                    },
                                    ...   
                                ]
                            },
              ]
          }

## Detail category [/api/v1/mobile/category/detail]

Retrieve the category information that corresponds to the passed parameters.

### POST

- Parameters

  - id (string base64 text) --required

- Response 200 (application/json; charset=utf-8)

  - Body

          {
              "code": 200,
              "status": "success",
              "message": "Detail success",
              "data": {
                  "id": "24019MQ==45812",
                  "name": "ប្រភេទ 1",
                  "name_other": "Category1",
                  "description": "1 Description in Cambodia ... ",
                  "description_other": "1 Description in English ... "
              }
          }

- Response 400 (application/json; charset=utf-8)

      Response 400 will be returned, if there is no category specified.

      + Body

            {
                "code": 400,
                "status": "failed",
                "message": "Attempt to read property \"id\" on null"
            }
