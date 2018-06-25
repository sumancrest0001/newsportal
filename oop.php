<?php
class A{
	public $a='a';
	protected $b='b';
	private $c='c';

}
class B extends A{

}
$objA= new A;
$objB=new B();
echo $objA->a;