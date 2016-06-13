# ElfoApp PHP API client
A php client of the ElfoApp REST API. The full API <a href="http://elfoapp.co/developers">reference is here</a>

##Requisites
cURL (apt-get install php5-curl)

##Getting stared
1. Download sources files place them in your project folder.
2. Create an ElfoAppRestClient object passing your credentials:
    ```php
    require('elfoapp/src/elfoapp_client.php');
    use Elfoapp\APIClient\ElfoappClient as ElfoappClient;

    $elfoapp = new ElfoappClient('your_mail@email.com','api_token');
    ```
    
    Note: You can find your api password at http://www.elibom.com/api-password (make sure you are logged in).
    
    You are now ready to start calling the API methods!

##API Methods

* [Call](#call-with-text)
* [Get Delivery](#get-delivery)  

### Call with text
```php
//Return json object
$delivery = $elfoapp->callWithText('3000000000', 'Texto de prueba', 'optional - campaign name');
//JSON object with your delivery token
printf(json_encode($delivery))
```

### Call with audio
```php
//Return json object
$delivery = $elfoapp->callWithAudio('3000000000', 'path-to-file.mp3', 'optional - campaign name');
//JSON object with your delivery token
printf(json_encode($delivery))
```

### Get Delivery
```php
//Return json object
$delivery = $elfoapp->getDelivery('replace_with_your_delivery_token');
//JSON object with delivery info
printf(json_encode($delivery))
``` 

