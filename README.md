# FieldPackager

FieldPackager is a class which used to manage the fields,

it'll convert the field names to normal names,

look down for the real example once you got the result from your database.

#Usage
FieldPackager is a static class, so you don't need to construst it.

```php
FieldPackager::FUNCTION()
```

#Example

So you got a result and it's an array, let's cook it.

```php
/** Simulate the result from the database */
$Result = ['ID'            => 1,
           'username'      => 'yamiodymel',
           'password'      => 's2H1xfq62Kfc',
           'email_address' => 'abc@abc.com'];

/** Package the RAW ARRAY */
exit(var_dump(FieldPackager::Package($Result)));
```

and this will be returned.

```php
array(4) 
{
  ["ID"]=>
  int(1)
  ["Username"]=>
  string(10) "yamiodymel"
  ["Password"]=>
  string(12) "s2H1xfq62Kfc"
  ["EmailAddress"]=>
  string(11) "abc@abc.com"
}

```

So you can use it like this in your PHP code.

```php
/** Lovely! */
if($Result['EmailAddress'] == xxx)

/** Not like this anymore! */
if($Result['email_address'] == xxx)
```

## When Aira does exist

If you have [Aira](http://github.com/TeaMeow/Aira) to handler your errors,

You should set this to true (false by default.).

```php
FieldPackager::$HasAira = true;
```

and `Aira::Add('FIELDER_UNKNOWN')` will be called once the field name cannot be found.

## Package!

Package is a function for **field -> normal name**,

and **multi-dimensional array is supported**.

```php
FieldPackager::Package(ARRAY);
```

## Unwrap! (NOT SUPPORTED YET)

You can unwrap your package with this function,

as you know, it's a function for **normal name -> field**.

```php
FieldPackager::Unwrap(ARRAY);
```

## To Normal

Get a normal name for this field name.

```php
/** And "EmailAddress" will be returned */
FieldPackager::ToNormal('email_address');
```

## To Field

Get a field name for this normal name.

```php
/** And "email_address" will be returned */
FieldPackager::ToField('EmailAddress');
```
