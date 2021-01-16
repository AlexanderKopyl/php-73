<?php

use PHPUnit\Framework\TestCase;

class StringsTest extends TestCase
{
    /**
     * @see https://www.php.net/manual/en/language.types.string.php
     */
    public function testVariableParsing()
    {
        $foo = 'world';

        // Double quotes.
        $this->assertEquals('Hello world', "Hello $foo");

        // Single quotes.
        $this->assertEquals('Hello $foo', 'Hello $foo');

        // TODO "Hello ${foo}"

        $$foo = 'world';
        $this->assertEquals('Hello world', "Hello ${$foo}");

        // TODO "Hello " . $foo
        $this->assertEquals('Hello world', "Hello " . $foo);

        // TODO Heredoc
        $str = <<<EOD
Example of string
EOD;
        $this->assertEquals('Example of string', $str);

        // TODO Nowdoc

        $str = <<<'EOD'
Example of string
EOD;
        $this->assertEquals('Example of string', $str);
    }

    /**
     * @see https://www.php.net/manual/en/ref.strings.php
     */
    public function testStringFunctions()
    {
        // trim — Strip whitespace (or other characters) from the beginning and end of a string
        $this->assertEquals('Hello', trim('Hello         '));
        $this->assertEquals('Hello', trim('Hello......', '.'));

        // ltrim — Strip whitespace (or other characters) from the beginning of a string
        // TODO to be implemented
        $this->assertEquals('Hello', ltrim('         Hello'));

        // rtrim — Strip whitespace (or other characters) from the end of a string
        // TODO to be implemented
        $this->assertEquals('Hello', rtrim('Hello         '));

        // strtoupper — Make a string uppercase
        $this->assertEquals('HELLO', strtoupper('hello'));

        // strtolower — Make a string lowercase
        $this->assertEquals('hello', strtolower('HeLlO'));

        // ucfirst — Make a string's first character uppercase
        // TODO to be implemented
        $this->assertEquals('Hello', ucfirst('hello'));

        // lcfirst — Make a string's first character lowercase
        // TODO to be implemented
        $this->assertEquals('hello', lcfirst('Hello'));

        // strip_tags — Strip HTML and PHP tags from a string
        // TODO to be implemented
        $this->assertEquals('hello', strip_tags('<div>hello</div>'));

        // htmlspecialchars — Convert special characters to HTML entities
        // TODO to be implemented
        $str = "Jane & 'Tarzan'";
        $this->assertEquals("Jane &amp; &#039;Tarzan&#039;",htmlspecialchars($str, ENT_QUOTES));

        // addslashes — Quote string with slashes
        // TODO to be implemented
        $str = 'What does "yolo" mean?';
        $this->assertEquals('What does \"yolo\" mean?', addslashes($str));

        // strcmp — Binary safe string comparison (Compare two strings )
        // TODO to be implemented
        $str1 ='hello';
        $str2 = 'hello';

        $this->assertEquals(0,strcmp($str1, $str2));

        // strncasecmp — Binary safe case-insensitive string comparison of the first n characters
        // TODO to be implemented
        $str1 ='hello';
        $str2 = 'helloed';

        $this->assertEquals(0,strncasecmp($str1, $str2, 4));


        // str_replace — Replace all occurrences of the search string with the replacement string
        // TODO to be implemented
        $string ='good golly miss molly!';

        $this->assertEquals('good goy miss moy!', str_replace("ll", "", $string));

        // strpos — Find the position of the first occurrence of a substring in a string
        // TODO to be implemented
        $str ='Hello World!';
        $find_str = 'H';
        $this->assertEquals(0, strpos($str,$find_str));

        // strstr — Find the first occurrence of a string
        // TODO to be implemented
        $str ='Hello World!';
        $find_str = 'W';
        $this->assertEquals('World!', strstr($str,$find_str));
        $this->assertEquals('Hello ', strstr($str,$find_str,true));

        // strrchr — Find the last occurrence of a character in a string
        // TODO to be implemented
        $path = '/www/public_html/index.html';
        $this->assertEquals('/index.html', strrchr($path, "/"));

        // substr — Return part of a string
        // TODO to be implemented
        $str ='Hello World!';
        $this->assertEquals('Hello World', substr($str, 0,-1));

        // sprintf — Return a formatted string
        // TODO to be implemented
        $num = 5;
        $location = 'tree';
        $format = 'There are %d monkeys in the %s';

        $this->assertEquals('There are 5 monkeys in the tree', sprintf($format,$num,$location));
    }
}
