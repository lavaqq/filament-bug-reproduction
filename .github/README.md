### Package

filament/filament

### Package Version

v2.0

### Laravel Version

v10.10

### Livewire Version

v2.12

### PHP Version

PHP v8.2.5

### Problem description

I am encountering an issue in our production environment where, after making approximately ten random contact modifications, a request fails with a 403 Forbidden error. This error occurs specifically during a POST request to the following endpoint: `POST /livewire/message/app.filament.resources.contact-resource.pages.edit-contact`

This issue is specific to the production environment and does not occur in the local development environments.

##### Copy POST data

```
{
    "fingerprint": {
        "id": "E4Lej60NdvzE9DrowGgb",
        "name": "app.filament.resources.contact-resource.pages.edit-contact",
        "locale": "en",
        "path": "contacts/3/edit",
        "method": "GET",
        "v": "acj"
    },
    "serverMemo": {
        "children": [],
        "errors": [],
        "htmlHash": "1463e978",
        "data": {
            "data": {
                "id": 3,
                "last_name": "Hudson",
                "first_name": "Chadd",
                "job_title": "Cafeteria Cook",
                "email": "taurean84@bartoletti.com",
                "phone": "(360) 447-6857",
                "deleted_at": null,
                "created_at": "2023-07-13T14:25:02.000000Z",
                "updated_at": "2023-07-13T14:25:02.000000Z",
                "companies": [
                    "1"
                ]
            },
            "previousUrl": "https://url.com/contacts/3",
            "mountedAction": null,
            "mountedActionData": [],
            "componentFileAttachments": [],
            "mountedFormComponentAction": null,
            "mountedFormComponentActionArguments": [],
            "mountedFormComponentActionData": [],
            "mountedFormComponentActionComponent": null,
            "activeRelationManager": null,
            "record": []
        },
        "dataMeta": {
            "models": {
                "record": {
                    "class": "App\\Models\\Contact",
                    "id": 3,
                    "relations": [],
                    "connection": "mysql",
                    "collectionClass": null
                }
            }
        },
        "checksum": "86e6e423d8c08348104869b0317db5a1dcd3e0b1e38b2496f2d730c4934d96b7"
    },
    "updates": [
        {
            "type": "callMethod",
            "payload": {
                "id": "drlf",
                "method": "getSelectOptions",
                "params": [
                    "data.companies"
                ]
            }
        }
    ]
}
```

##### Copy request headers

```
POST /livewire/message/app.filament.resources.contact-resource.pages.edit-contact HTTP/2
Host: url.com
User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/115.0
Accept: text/html, application/xhtml+xml
Accept-Language: fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3
Accept-Encoding: gzip, deflate, br
Referer: https://url.com/contacts/3/edit
Content-Type: application/json
X-Livewire: true
X-CSRF-TOKEN: ypBYCDfuY3m2CP9uqgJGS2oYQMaPsAPATHUMNZZm
Content-Length: 1163
Origin: https://url.com
Connection: keep-alive
Cookie: url_session=eyJpdiI6IlBBZ2MyZmo2MlBHSWdCRWxTY3lPZ0E9PSIsInZhbHVlIjoiYmZDN2RTRStuQkJLaG01ODZCQ2krT1J1blVIaWFDVFpDQ01OMk1tbVgvY1Z2WERBWTNDWllmOHlBdnNyYlZQS0tPdjRkWG1WNks1OTZLSE8wemlnUko0NzdXSi9hQXZldnNCMmJTaDVjYmxRaUNQaExTKytEdVAySTJvdjVHMkIiLCJtYWMiOiI2NzIzYjZhMDllYjMwZDRjOGFhZWM4NGE0MmM0ZTVmYzc0YjdlMDc0MDMwZGZlMzA4NTljNTQ0ZWU4MzViZWE3IiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6IkdFa3piQTI1L0d5TXVtNyt4Q3h5Snc9PSIsInZhbHVlIjoiLzBNeFpIRFNwVXhnSTJSSEw0ejVjQW5TOG5rZ1E1RXA3TDAyUHQ2cEErMURwVmc5L0xwSUdza2JPZ3BRV3hvYXR0NkV5R2srMnlleXlnejlaYXVlNHFCb1dJK3ZLeTc2RmcralpLdjdNVjN6SlQvVUNHOENFOUdNRk5tcjBuRm4iLCJtYWMiOiI1NDNjNGVhZDlmMjAxMWUwMGM1YzdlNTRkOWRhNzE1NTVlZTNlNTA2YWUyZmIxODM5NTlhYjk1YjQwMzI0Mzg5IiwidGFnIjoiIn0%3D
Sec-Fetch-Dest: empty
Sec-Fetch-Mode: cors
Sec-Fetch-Site: same-origin
TE: trailers
```

##### Copy of response headers

```
HTTP/2 403 Forbidden
date: Thu, 13 Jul 2023 14:26:50 GMT
content-type: text/html; charset=utf-8
vary: accept-language,accept-charset
strict-transport-security: max-age=16000000
content-language: fr
cf-cache-status: DYNAMIC
report-to: {"endpoints":[{"url":"https:\/\/a.nel.cloudflare.com\/report\/v3?s=bAA3UIBpx08Nbp7bzOWtNdGBkVWXds7foDHggVvZzDURa3kQJNpffwv4QARoQkzdmiO1EwCG4zsgOlpYRXi8A4yG26oY7mK1h8uaG0euTLclYTX3E2XOEjcajHc%2BO58COspA"}],"group":"cf-nel","max_age":604800}
nel: {"success_fraction":0,"report_to":"cf-nel","max_age":604800}
server: cloudflare
cf-ray: 7e623407881ed498-BRU
content-encoding: br
alt-svc: h3=":443"; ma=86400
X-Firefox-Spdy: h2
```

Please let me know if any additional information or any more details about the configuration, server setup, or any other relevant information, please don't hesitate to ask.

### Expected behavior

I expect the POST request to be successfully processed.

### Steps to reproduce

Perform a series of random contact modifications (approximately ten) using the application's functionality.
Observe the HTTP response for the POST request mentioned above.

### Reproduction repository

https://github.com/lavaqq/filament-bug-reproduction

### Relevant log output

_No response_