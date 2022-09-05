# Database & Cache Seeder

- Command Line Interface (CLI) for seeding DB / Cache
- Create `commands` in `src/Corebase/Commands.php`
- Create class for DB population in `src/Command/...`
- Josn encoding **Array of objects** 

```php
class MyClass implements JsonSerializable

....

public function jsonSerialize() {
    return (object) get_object_vars($this);
}
```

- Available Commands DB :
- - `php bin/console seed:db:patients` for [mysql, kb_doctor]
- - `php bin/console seed:db:user` for [mysql, api_platform_symfony]
- - `php bin/console seed:db:cheese-listing`
- - `php bin/console seed:db:drivers`
- Available Commands Cache :
- - `php bin/console seed:cache:company`


- Packages :
- - https://packagist.org/packages/catfan/medoo (DB Handler) 
- - https://medoo.in/doc (Medoo Documentation)
- - https://packagist.org/packages/mnapoli/silly (CLI)
- - https://packagist.org/packages/vlucas/phpdotenv (.env)
- - https://packagist.org/packages/fakerphp/faker (*NEW* Faker)
- - https://fakerphp.github.io/ (*NEW* Faker Documentation)


```
$ php bin/console seed:cache:company

### JSON DECODE

 - Mosciski, Lakin and Thiel
 - Kuhlman, Reichert and Wolf
 - Hettinger, Cassin and Ritchie
 - Kuvalis, Heathcote and Funk
 - Harber PLC
 - Stokes PLC
 - Kautzer, Lebsack and Stamm
 - Block, Gutkowski and Ziemann
 - Graham-Koelpin
 - Haley, Block and Kessler
 - Deckow, Pollich and Raynor
 - Price, Wilkinson and Ziemann
 - Howell, Gulgowski and Pollich
 - Abbott and Sons
 - Romaguera LLC
 - Rogahn-Heathcote
 - Wisozk, Simonis and Luettgen
 - Metz Group
 - McGlynn-Flatley
 - Schowalter Ltd
 - Doyle, Hand and Homenick
 - Prohaska Group
 - Wilderman, Klocko and Dicki
 - Waelchi, Tromp and Lang
 - Schneider, Murazik and Rau

### DESERIALIZE

 - Mosciski, Lakin and Thiel
 - Kuhlman, Reichert and Wolf
 - Hettinger, Cassin and Ritchie
 - Kuvalis, Heathcote and Funk
 - Harber PLC
 - Stokes PLC
 - Kautzer, Lebsack and Stamm
 - Block, Gutkowski and Ziemann
 - Graham-Koelpin
 - Haley, Block and Kessler
 - Deckow, Pollich and Raynor
 - Price, Wilkinson and Ziemann
 - Howell, Gulgowski and Pollich
 - Abbott and Sons
 - Romaguera LLC
 - Rogahn-Heathcote
 - Wisozk, Simonis and Luettgen
 - Metz Group
 - McGlynn-Flatley
 - Schowalter Ltd
 - Doyle, Hand and Homenick
 - Prohaska Group
 - Wilderman, Klocko and Dicki
 - Waelchi, Tromp and Lang
 - Schneider, Murazik and Rau


 Psst... ¯\_(ツ)_/¯

 ```