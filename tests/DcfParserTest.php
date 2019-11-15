<?php
namespace makowskid\DcfParser\Tests;

use PHPUnit\Framework\TestCase;
use makowskid\DcfParser\DcfParser;

/**
 * Class DcfParserTest
 *
 * @category Test
 * @package  makowskid\DcfParser\Tests
 * @author   Dawid Makowski <dawid.makowski@gmail.com>
 */
class DcfParserTest extends TestCase
{
    public function testparseFile()
    {
        $test_content = "
Source: gentoo
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
Lastline: lol
";
        $file = 'dcfparsertest.txt';
        \file_put_contents($file, $test_content, LOCK_EX);
        $DcfParser = new DcfParser();
        $expected = $DcfParser->parseFile($file);
        $this->assertArrayHasKey('source', $expected);
        $this->assertArrayHasKey('section', $expected);
        $this->assertArrayHasKey('description', $expected);
        $this->assertArrayHasKey('standards-version', $expected);
        $this->assertContains('4.0.0', $expected);
        $this->assertContains('any', $expected);
        $this->assertContains('nothing', $expected);
        $this->assertContains('lol', $expected);
        $this->assertContains("The format for the package description is a short brief summary on the first line (after the Description field). The following lines should be used as a longer, more detailed description. Each line of the long description must be preceded by a space, and blank lines in the long description must contain a single ‘.’ . following the preceding space.", $expected);
        \unlink($file);
    }
}
