<?php

class EmailTest extends PHPUnit\Framework\TestCase{

    public function testIsValidAncienEmail() : void 
    {
        $ancienEmail = new Email("test@accesscodeschool.com");
        $this->assertTrue($ancienEmail->ancienneValidation());
    }
 
    public function testIsValidNouvelEmail() : void 
    {
        $nouvelEmail = new Email("test@accesscodeschool.online");
        $ancienEmail1 = new Email("test.0123@accesscodeschool.fr");
        $ancienEmail2 = new Email("test.0123@online.accesscodeschool.fr");
        $this->assertTrue($nouvelEmail->nouvelleValidation());
        $this->assertTrue($ancienEmail1->nouvelleValidation());
        $this->assertTrue($ancienEmail2->nouvelleValidation());
    }

    public function testIsValidEmails() : void 
    {
        $ancienEmail = new Email("test@accesscodeschool.com");
        $nouvelEmail = new Email("test@accesscodeschool.online");
        $this->assertTrue($ancienEmail->ancienneValidation());
        $this->assertTrue($ancienEmail->nouvelleValidation());
        $this->assertFalse($nouvelEmail->ancienneValidation());
        $this->assertTrue($nouvelEmail->nouvelleValidation());
    }
}

// https://phpunit.readthedocs.io/fr/latest/assertions.html

// ./vendor/bin/phpunit html/php_tests_unitaires/

// PHPUnit 9.0.0 by Sebastian Bergmann and contributors.

// ...                                                                 3 / 3 (100%)

// Time: 00:00.132, Memory: 4.00 MB

// OK (3 tests, 6 assertions)