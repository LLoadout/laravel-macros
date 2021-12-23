![Downloads](https://img.shields.io/packagist/dt/lloadout/laravel-macros.svg?style=flat-square)

# Laravel macros

This repository contains some useful Laravel macros.

- [Collection macros](#collection-macros)
    - [whereContains](#wherecontains)
    - [whereStartsWith](#wherestartswith)
    - [whereEndsWith](#whereendswith)
- [Filesystem macros](#filesystem-macros)
  -  [getFile](#getfile)

## Collection macros

### whereContains

Filter items that contain the given string.

```php
$collection = collect([['id' => 1, 'name' => 'A'], ['id' => 2, 'name' => 'B'], ['id' => 3, 'name' => 'AB'], ['id' => 4, 'name' => 'ABC']]);
return $collection->whereContains('name','A'); //{"0":{"id":1,"name":"A"},"2":{"id":3,"name":"AB"},"3":{"id":4,"name":"ABC"}}
```

### whereStartsWith

Filter items that start with the given string.

```php
$collection = collect([['id' => 1, 'name' => 'A'], ['id' => 2, 'name' => 'B'], ['id' => 3, 'name' => 'AB'], ['id' => 4, 'name' => 'ABC']]);
return $collection->whereStartsWith('name','B'); //{"1":{"id":2,"name":"B"}}
```

### whereEndsWith

Filter items that ends with the given string.

```php
$collection = collect([['id' => 1, 'name' => 'A'], ['id' => 2, 'name' => 'B'], ['id' => 3, 'name' => 'AB'], ['id' => 4, 'name' => 'ABC']]);
return $collection->whereEndsWith('name','C'); //{"3":{"id":4,"name":"ABC"}}
```

## Filesystem macros

### getFile

Get a file by its path, returning a SplFileInfo object.

```php
$file = File::getFile($path_to_file); // this returns a SplFileInfo object.
```
