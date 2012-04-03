<?php

namespace Kata\RomanosBundle\Tests\Kata;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Kata\RomanosBundle\Entity\NumerosRomanos;

class NumerosRomanosTest extends WebTestCase
{
	protected $romanNumber;

	public function setUp()
	{
		$this->romanNumber = new NumerosRomanos();
	}

	public function getRomanNumberTestCases()
	{
		return array(
			'1 should return I' => array(1,'I'),
			'2 should return II' => array(2,'II'),
			'3 should return III' => array(3,'III'),
			'4 should return IV' => array(4,'IV'),			
			'5 should return V' => array(5,'V'),
			'6 should return VI' => array(6,'VI'),							
			'7 should return VII' => array(7,'VII'),					
			'8 should return VIII' => array(8,'VIII'),					
			'9 should return IX' => array(9,'IX'),						
			'10 should return X' => array(10,'X'),					
			'11 should return X' => array(11,'XI'),
			'13 should return X' => array(13,'XIII'),
			'14 should return X' => array(14,'XIV'),
			'15 should return X' => array(15,'XV'),
			'20 should return X' => array(20,'XX'),
			'29 should return X' => array(29,'XXIX'),
			'44 should return X' => array(44,'XLIV'),
			'59 should return X' => array(59,'LIX'),
			'60 should return X' => array(60,'LX'),
			'89 should return X' => array(89,'LXXXIX'),
			'90 should return X' => array(90,'XC'),
			'94 should return X' => array(94,'XCIV'),
			'99 should return X' => array(99,'XCIX'),
			'100 should return X' => array(100,'C'),
			'104 should return X' => array(104,'CIV'),
			'149 should return X' => array(149,'CXLIX'),
			'289 should return X' => array(289,'CCLXXXIX'),
			'291 should return X' => array(291,'CCXCI'),
			'399 should return X' => array(399,'CCCXCIX'),
			'450 should return X' => array(450,'CDL'),
			'499 should return X' => array(499,'CDXCIX'),
			'999 should return X' => array(999,'CMXCIX'),
			'1010 should return X' => array(1010,'MX'),
			'8999 should return X' => array(3999,'MMMCMXCIX'),
			);
	}

	/**
	*  @dataProvider getRomanNumberTestCases
	**/
	public function testIntegerToRomanNumber($number, $expected)
	{
		$this->assertEquals( $expected , $this->romanNumber->getTranslatedNumber($number));
	}
}
