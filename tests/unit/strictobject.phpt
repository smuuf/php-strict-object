<?php

use \Tester\Assert;

use \Smuuf\StrictObject;

require __DIR__ . '/../bootstrap.php';

$obj = new class {

	use StrictObject;

	private $privateProp;
	protected $protectedProp;
	public $publicProp;

};

//
// Completely bogus property.
//

Assert::exception(
	fn() => $obj->bogusProp = 1
, \LogicException::class, '~write to undeclared.*bogusProp~');

Assert::exception(
	fn() => print($obj->bogusProp)
, \LogicException::class, '~read undeclared.*bogusProp~');

//
// Private property.
//

Assert::exception(
	fn() => $obj->privateProp = 1
, \LogicException::class, '~write to undeclared.*privateProp~');

Assert::exception(
	fn() => print($obj->privateProp)
, \LogicException::class, '~read undeclared.*privateProp~');

//
// Protected property.
//

Assert::exception(
	fn() => $obj->protectedProp = 1
, \LogicException::class, '~write to undeclared.*protectedProp~');

Assert::exception(
	fn() => print($obj->protectedProp)
, \LogicException::class, '~read undeclared.*protectedProp~');


//
// Public property.
//

Assert::noError(
	fn() => $obj->publicProp = 1
);

Assert::noError(
	fn() => print($obj->publicProp)
);
