![Downloads](https://img.shields.io/packagist/dt/lloadout/laravel-macros.svg?style=flat-square)

<p align="center">
    <img src="https://github.com/LLoadout/assets/blob/master/LLoadout_macros.png" width="500" title="LLoadout logo">
</p>

# Laravel macros

This repository contains some useful Laravel macros.

- [Collection macros](#collection-macros)
    - [whereContains](#wherecontains)
    - [whereStartsWith](#wherestartswith)
    - [whereEndsWith](#whereendswith)
    - [forSelectBox](#forselectbox)
- [Filesystem macros](#filesystem-macros)
  -  [getFile](#getfile)
- [String macros](#stringmacros)
  - [capitalizeWords](#capitalizewords)
  - [highlightWords](#highlightwords)
- [Convert macros](#convertmacros)
  - [toJson](#tojson)
  - [toArray](#toarray)
  - [toObject](#toobject)

# Installation

```
composer require lloadout/laravel-macros
```

## Collection macros

### whereContains

Filter items that contain the given string.

```php
$collection = collect([['id' => 1, 'name' => 'A'], ['id' => 2, 'name' => 'B'], ['id' => 3, 'name' => 'AB'], ['id' => 4, 'name' => 'ABC']]);
return $collection->whereContains('name','A'); // {"0":{"id":1,"name":"A"},"2":{"id":3,"name":"AB"},"3":{"id":4,"name":"ABC"}}
```

### whereStartsWith

Filter items that start with the given string.

```php
$collection = collect([['id' => 1, 'name' => 'A'], ['id' => 2, 'name' => 'B'], ['id' => 3, 'name' => 'AB'], ['id' => 4, 'name' => 'ABC']]);
return $collection->whereStartsWith('name','B'); // {"1":{"id":2,"name":"B"}}
```

### whereEndsWith

Filter items that ends with the given string.

```php
$collection = collect([['id' => 1, 'name' => 'A'], ['id' => 2, 'name' => 'B'], ['id' => 3, 'name' => 'AB'], ['id' => 4, 'name' => 'ABC']]);
return $collection->whereEndsWith('name','C'); // {"3":{"id":4,"name":"ABC"}}
```

### forSelectBox

Sorts the items by its lowercase value, keys them by the provided key.  By default this macro adds an empty value to the result array, this can be prevented by
the third parameter `$addempty`.

```php
$collection = collect([['id' => 1, 'firstname' => 'D', 'name' => 'A'], ['id' => 2, 'firstname' => 'C', 'name' => 'B'], ['id' => 3, 'firstname' => 'B', 'name' => 'C'], ['id' => 4, 'firstname' => 'A', 'name' => 'D']]);
return $c->forSelectBox('id','firstname'); // {"0":"","4":"A","3":"B","2":"C","1":"D"}
```

This can also be used with Eloquent

```php
$menus = Menu::all();
return $menus->forSelectBox('id','name'); // {"0":"","8":"brands","4":"Developer menu","3":"Manage roles","2":"Manage users","6":"Menus","5":"Permissions","7":"Producten","1":"User management"}
```

## Filesystem macros

### getFile

Get a file by its path, returning a SplFileInfo object.

```php
$file = File::getFile($path_to_file); // this returns a SplFileInfo object.
```

## String macros

### capitalizeWords

Capitalize every word in a sentence.

```php 
Str::capitalizeWords('laravel macros'); // Laravel Macros
```

### highlightWords

Highlight the given words in a sentence.  The words are default highlighted with a `<b>` tag but you can pass a third parameter `$highlighter` to overrule this.  The `$words` argument can be a single word or an array of words.

```php
Str::highlightWords("welcome to Laravel-macros",'Laravel-macros'); // welcome to <b>Laravel-macros</b>

Str::highlightWords("welcome to Laravel-macros",['welcome','Laravel-macros']); // <b>welcome</b> to <b>Laravel-macros</b>
```

## Convert macros 

This macros can convert arrays / object / json to one of array / object / json , particularly handy for converting mixed variables, for example arrays with objects to pure arrays or objects.

### toArray

Convert object/json to array

```
 $class = new \stdClass();
 $class->name = "Lloadout";
 Convert::toArray($class); // ["name" => "Lloadout"]
```

Advanced example

```
  // without this macro , cast mixed content to an array  
  $variable = (array) [(object) ['id' => 1], ['id' => 4]];  
   
  // will convert to
   
  array:4 [▼
    0 => {#750 ▼
      +"id": 1
    }  
    1 => array:1 [▼
      "id" => 4
    ]
  ]
  
  //with the macro
  
  $variable = [(object) ['id' => 1], ['id' => 4]];
  Convert::toArray($variable); 
  
  // will convert to 
  array:2 [▼
  0 => array:1 [▼
    "id" => 1
  ]
  1 => array:1 [▼
    "id" => 4
  ]
]
```

### toJson

Convert object/array to json

```
 $class = new \stdClass();
 $class->name = "Lloadout";
 Convert::toJson($class); // {"name":"Lloadout"}
```

### toObject

Convert json/array to object

```
 $array = ['name' => 'Lloadout'];
 Convert::toObject($array); // {#750 ▼  +"name": "Lloadout" }
```
