# Country

The endpoint controls the countries resource.
These are simple APIs.

## Retrieve countries [/api/v1/mobile/country/index]

Retrieve the countries information that corresponds to the passed parameters.

### POST

+ Parameters
    + --

+ Response 200 (application/json; charset=utf-8)

    + Body

            {
                "code": 200,
                "status": "success",
                "message": "Index success",
                "data": {
                    "data": [
                        {
                            "id": "15042MjAw65701",
                            "name": "Country hO2",
                            "zip_code": "7Moe2",
                            "country_code": "TEXjL",
                            "currency_code": "jqdnW",
                            "currency_status": "Active"
                        },
                        {
                            "id": "63166MTk563228",
                            "name": "Country dpS",
                            "zip_code": "RXchJ",
                            "country_code": "4YQfR",
                            "currency_code": "MiXjx",
                            "currency_status": "Active"
                        },
                    ]
                    "links": {
                        "first": "http://127.0.0.1:8000/api/v1/mobile/article/index?page=1",
                        "last": "http://127.0.0.1:8000/api/v1/mobile/article/index?page=1",
                        "prev": null,
                        "next": null
                    },
                    "meta": {
                        "current_page": 1,
                        "from": 1,
                        "last_page": 1,
                        "links": [
                            {
                                "url": null,
                                "label": "&laquo; Previous",
                                "active": false
                            },
                            {
                                "url": "http://127.0.0.1:8000/api/v1/mobile/article/index?page=1",
                                "label": "1",
                                "active": true
                            },
                            {
                                "url": null,
                                "label": "Next &raquo;",
                                "active": false
                            }
                        ],
                        "path": "http://127.0.0.1:8000/api/v1/mobile/article/index",
                        "per_page": 20,
                        "to": 5,
                        "total": 5
                    }
                }
            }

## Detail country [/api/v1/mobile/country/detail]

Retrieve the country information that corresponds to the passed parameters.

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
                    "id": "59401MTk=93057",
                    "name": "Country wU1",
                    "zip_code": "a48l4",
                    "country_code": "ZhmqF",
                    "currency_code": "WuQ0l",
                    "currency_status": "Active"
                }
            }      

+ Response 400 (application/json; charset=utf-8)

      Response 400 will be returned, if there is no country specified.

      + Body

            {
                "code": 400,
                "status": "failed",
                "message": "Attempt to read property \"id\" on null"
            }

