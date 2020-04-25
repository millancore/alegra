
## Categorias

### Uso

```php
use Alegra\Support\Facade\Category;
```

Consultar una categoria

```php
$category = Category::getById(12);

$category->id;
$category->name;
...

```

Consultar lista de categorias, la opciones se pueden consultar en el documentacion de la API
[parametros](https://developer.alegra.com/docs/lista-de-categor%C3%ADas)

```php

$categories = Category::getList([
    'format' => 'plain',
    'type' => 'asset',
    'categoryRule_key' => 'LIABILITIES'
]);

foreach ($categories as $category) {
    # code...
}

```