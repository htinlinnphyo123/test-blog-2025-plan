# Article

The endpoint controls the articles resource.
These are simple APIs.

## Retrieve articles [/api/v1/mobile/article/index]

Retrieve the articles information that corresponds to the passed parameters.

### POST

+ Parameters
    + subcategory_id (string base64 text) --optional
    + category_id (string base64 text) --optional
    + is_banner (string base64 text) --optional
    + is_highlighed (string base64 text) --optional

+ Response 200 (application/json; charset=utf-8)

    + Body

            {
                "code": 200,
                "status": "success",
                "message": "Index success",
                "data": {
                    "data": [
                        {
                            "id": "42352ODg=67551",
                            "title": "Article88",
                            "title_other": "article 88",
                            "description": "Description 88",
                            "description_other": "Description 88",
                            "type": "audio",
                            "category_id":4,
                            "subcategory_id":19,
                            "category_name": "ប្រភេទ 4",
                            "subcategory_name": "Subcategory 19",
                            "is_banner": false,
                            "is_published": true,
                            "is_highlighed": false,
                            "date": "1986-07-19",
                            "thumbnail": "https://buddha.sgp1.digitaloceanspaces.com/Default/default_article_pic.jpg",
                            "link": [],
                            "banner_media": null
                        },
                        {
                            "id": "66315NzM=59053",
                            "title": "Article73",
                            "title_other": "article 73",
                            "description": "Description 73",
                            "description_other": "Description 73",
                            "type": "photo",
                            "category_id":4,
                            "subcategory_id":19,
                            "category_name": "ប្រភេទ 4",
                            "subcategory_name": "Subcategory 19",
                            "is_banner": false,
                            "is_published": false,
                            "is_highlighed": false,
                            "date": "2022-08-11",
                            "thumbnail": "https://buddha.sgp1.digitaloceanspaces.com/Default/default_article_pic.jpg",
                            "link": [],
                            "banner_media": null
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

## Detail article [/api/v1/mobile/article/detail]

Retrieve the article information that corresponds to the passed parameters.

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
                    "id": "25825MTk=87643",
                    "title": "Article19",
                    "title_other": "article 19",
                    "description": "Description 19",
                    "description_other": "Description 19",
                    "type": "video",
                    "category_id": "ប្រភេទ 1",
                    "subcategory_id": "Subcategory 14",
                    "is_banner": false,
                    "is_published": false,
                    "is_highlighed": false,
                    "date": "1986-05-01",
                    "thumbnail": "https://buddha.sgp1.digitaloceanspaces.com/Default/default_article_pic.jpg",
                    "link": [],
                    "banner_media": null
                }
            }      

+ Response 400 (application/json; charset=utf-8)

      Response 400 will be returned, if there is no article specified.

      + Body

            {
                "code": 400,
                "status": "failed",
                "message": "Attempt to read property \"id\" on null"
            }

