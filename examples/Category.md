
## Categorias

### Uso

```php
use Alegra\Support\Facade\Category;
```

Consultar una categoria

```php
try {
    $category = Category::get(12);
} catch (AlegraException $e) {
    #...
}

$category->id;
$category->name;
...
```

Consultar lista de categorias, la lista de parametros se pueden consultar en el documentacion de la API
[parametros](https://developer.alegra.com/docs/lista-de-categor%C3%ADas)

```php
try {
    $categories = Category::all([
        'format' => 'plain',
        ...
    ]);
} catch (AlegraException $e) {
    #...
}

foreach ($categories as $category) {
    # code...
}
```