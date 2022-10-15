<?php
namespace Test\MPV\Tools;

use MPV\Tools\UUID;
use PHPUnit\Framework\TestCase;

/**
 * @author Máximo Perez Villalba
 */
class UUIDTest extends TestCase
{
    public function testValidate()
    {
        $keyOk = '4dm54gf1';
        $this->assertTrue(UUID::validate($keyOk));
        
        $keyFailBigger = '4dm54gf1p';
        $this->assertFalse(UUID::validate($keyFailBigger));

        $keyFailCharacterInvalid1 = '=dm54gf1';
        $this->assertFalse(UUID::validate($keyFailCharacterInvalid1));

        $keyFailCharacterInvalid2 = 'Fdm54gf1';
        $this->assertFalse(UUID::validate($keyFailCharacterInvalid2));
    }
    
    public function testGenerate()
    {
        $key = UUID::generate();
        print "\n{$key}\n";
        $this->assertTrue(UUID::validate($key));
    }
}
