This is an example application which uses Shopify API to create webhooks

## Installation

1) Create a partner account here http://www.shopify.com/partners

2) Create a new public application in you partner's administration interface

3) Provide the API key and secret of your application (edit the `shopify.php` config file)

4) Run `composer update -o`  

5) Create a new database, configure database access and run migrations  

6) Run `artisan serve --port 8080` and you should be able to test the application  

## Usage

1) Create a development store in the partner's administration interface  

2) Open the application (http://localhost:8080 or whatever you have configured for this) and click "Create a new store"  

3) Enter your shop name to form and click "Submit". You will be asked to grant access for the Shopify application  

4) Once you have created the new store, click to its name  

5) Here you can see a list (which is empty right now) of webhooks of the selected store  

6) Click "Create a new webhook", fill the form and click submit  

7) You can also remove stores and webhooks


## Known issues

1) webhook topics are not being validated and response exceptions are not being processed properly  

2) if you delete a store, webhooks of this store won't be deleted (no specification provided for this case)  
