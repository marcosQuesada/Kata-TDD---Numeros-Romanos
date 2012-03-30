<?php

namespace Kata\RomanosBundle\Entity;

class NumerosRomanos
{
	protected $millares;
	protected $centena;
	protected $decena;
	protected $moduloDecimal;
	protected $markupSet = array(
					'decimal' =>array('X','L','XC'),
					'centena' =>array('C','D','CM')
			);
	
	public function getTranslatedNumber($number)
	{
		$this->processNumber($number);
		
		$result = '';

		$result .= $this->addMillares();
		$result .= $this->addCentenaDecena('centena');
		$result .= $this->addCentenaDecena('decimal');
		$result .= $this->addUnidades();
	
		return $result;
	}

	public function processNumber($number){
		$this->millares = intval($number/1000);
		$this->centena  = intval(
				($number-$this->millares*1000)/100);
		$this->decimal  = intval(
				($number-$this->millares*1000-$this->centena*100)/10);		
		$this->moduloDecimal = $number%10;
	}

	public function addMillares(){
		$result = '';
		for ($i=0; $i < $this->millares; $i++) { 
			$result .="M";
		}	
		return $result;		
	}

	public function addCentenaDecena($type = null)
	{
		$value = ($type == 'decimal')? $this->decimal: $this->centena;
		$result = '';
		if ($value == 4){
			$result .=$this->markupSet[$type][0];		
		}
		if($value >= 4 && $value !=9) {
			$result .=$this->markupSet[$type][1];	
			$value -=5;
		}
		elseif($value == 9) {
			$value = 0;			
			$result .=$this->markupSet[$type][2];
		}
		for ($i=0; $i < $value; $i++) { 
			$result .=$this->markupSet[$type][0];	
		}

		return $result;
	}

	public function addUnidades()
	{
		if ($this->moduloDecimal ==9 || $this->moduloDecimal == 0)
			return $this->addSomeI($this->moduloDecimal,'X');			
		else
			return $this->addSomeI($this->moduloDecimal,'V');			
	}

	public function addSomeI($number, $key=null)
	{
		$result='';
		if ($number >= 5 )
			$result.=$key;

		$number %= 5;
		if ($number >= 1 && $number <= 3)
		{
			for ($i=1; $i <= $number; $i++) { 
				$result .="I";
			}
		}
		elseif($number == 4)
			return "I".$key;

		return $result;
	}


}