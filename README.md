# DcfParser

**DcfParser** is a PHP & Laravel Package to parse Debian Control Files.

Example DCF contents:
```Source: gentoo
Section: unknown
Priority: optional
Maintainer: Josip Rodin <joy-mg@debian.org>
Build-Depends: debhelper (>=10)
Standards-Version: 4.0.0
Homepage: <insert the upstream URL, if relevant>
Package: gentoo
Architecture: any
Depends: nothing
Description: The format for the package description is a short brief summary on the first line
 (after the Description field). The following lines should be used as a longer, more detailed description.
 Each line of the long description must be preceded by a space, and blank lines in the long description must contain a single ‘.’
 .
 following the preceding space.
Lastline: last
```

Parsing result:
```array(12) {
  ["source"]=>
  string(6) "gentoo"
  ["section"]=>
  string(7) "unknown"
  ["priority"]=>
  string(8) "optional"
  ["maintainer"]=>
  string(31) "Josip Rodin <joy-mg@debian.org>"
  ["build-depends"]=>
  string(16) "debhelper (>=10)"
  ["standards-version"]=>
  string(5) "4.0.0"
  ["homepage"]=>
  string(38) "<insert the upstream URL, if relevant>"
  ["package"]=>
  string(6) "gentoo"
  ["architecture"]=>
  string(3) "any"
  ["depends"]=>
  string(7) "nothing"
  ["description"]=>
  string(353) "The format for the package description is a short brief summary on the first line (after the Description field). The following lines should be used as a longer, more detailed description. Each line of the long description must be preceded by a space, and blank lines in the long description must contain a single ‘.’ . following the preceding space."
  ["lastline"]=>
  string(3) "last"
}
```

## Installation

##### Software Requirement
- Git
- Composer

##### Installation Steps

1. `composer require makowskid/dcfparser`
2. `composer install`
3. make sure everything is OK by running the tests `phpunit`

## Usage

In Laravel:
```
\DcfParser::parseFile('test.txt');
```

Generic:
```
$parser = new \makowskid\DcfParser\DcfParser();
$parser->parseFile('test.txt');
```



## Test

To run the tests, run the following command from the project folder.

```
bash
$ ./vendor/bin/phpunit
```

or

``` bash
$ composer test
```

## Credits

- [Dawid Makowski](https://github.com/makowskid)
- [Alin Purcaru](https://stackoverflow.com/users/321468/alin-purcaru) - thanks for inspiration on [StackOverflow](https://stackoverflow.com/questions/4392904/control-file-to-php-array)

## License

The MIT License (MIT). See the [License File](https://github.com/makowskid/dcfparser/blob/master/LICENSE) for more information.
