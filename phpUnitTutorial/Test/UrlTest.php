<?php
namespace phpUnitTutorial\Test;
use phpUnitTutorial\URL;


class URLTest extends \PHPUnit_Framework_TestCase {
    
    public function testSluggifyReturnsSluggifedString()
    {
        $originalString = "This string will be sluggified";
        $expectedString = "this-string-will-be-sluggified";
        $url = new URL();
        $result = $url->sluggify($originalString);
        
        $this->assertEquals($expectedString, $result);
        //$this->assertEquals($expectedString, $url->sluggify($originalString));
    }
    
    public function testSluggifyReturnsForStringsContainingNumbers()
    {
        $originalString = 'This1 string2 will3 be 44 sluggified10';
        $expectedString = 'this1-string2-will3-be-44-sluggified10';
        
        $url = new URL();
        $result = $url->sluggify($originalString);
        
        $this->assertEquals($expectedString, $result);
    }
    
    public function testSluggifyReturnsExpectedForStringsContainingSpecialCharacters()
    {
        $originalString = 'This! @string#$ %$will ()be "sluggified';
        $expectedResult = 'this-string-will-be-sluggified';

        $url = new URL();

        $result = $url->sluggify($originalString);
        
        $this->assertEquals($expectedResult, $result);
    }
    
    public function testSluggifyReturnsEmptyForEmptyStrings()
    {
        $originalString = '';
        $expectedString = '';
        
        $url = new URL();
        $result = $url->sluggify($originalString);
        
        $this->assertEquals($expectedString, $result);
    }

}