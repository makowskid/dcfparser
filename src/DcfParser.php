<?php

namespace makowskid\DcfParser;

/**
 * Class DcfParser
 * more info about format here: https://www.debian.org/doc/debian-policy/ch-controlfields.html
 * https://www.debian.org/doc/debian-policy/ap-pkg-controlfields.html
 *
 * @author  Dawid Makowski <dawid.makowski@gmail.com>
 */
class DcfParser
{
    /**
     * DcfParser constructor.
     *
     */
    public function __construct()
    {
    }

    /**
     * @param $path absolute path to DCF file
     *
     * Code inspired by https://stackoverflow.com/questions/4392904/control-file-to-php-array
     * Kudos to Alin Purcaru https://stackoverflow.com/users/321468/alin-purcaru
     *
     * @return array
     */
    public function parseFile($path)
    {
        $source = fopen($path, 'r');
        $index = '';
        $data = [];
        while (($line = fgets($source)) !== false) {
            if (preg_match('/^\s*$/', $line)) {
                continue 1;
            } // ignore empty lines //

            if (!preg_match('/^\s+/', $line)) { // if the line does not start with whitespace then it has a new key-value pair //
                $items = explode(':', $line, 2); // separate at the first : //
                $index = strtolower($items[0]); // the keys are case insensitive //
                $value = preg_replace('/^\s+/', '', $items[1]); // remove extra whitespace from the begining //
                $value = preg_replace('/\s+$/', '', $value); // and from the end //
            } else { // continue the value from the previous line //
                $value = preg_replace('/\s+$/', '', $line); // remove whitespace only from the end //
            }
            if (isset($data[$index])) {
                $data[$index] .= $value;
            } else {
                $data[$index] = $value;
            }
        }
        fclose($source);
        return $data;
    }
}
