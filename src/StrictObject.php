<?php

namespace Smuuf;

trait StrictObject {

	/**
	 * Used when trying to access undeclared or inaccessible property.
	 *
	 * @throws \LogicException
	 * @return mixed
	 */
	public function __get(string $name) {

		throw new \LogicException(\sprintf(
			"Cannot read undeclared property '%s' in %s",
			$name,
			\get_called_class()
		));

	}

	/**
	 * Used when trying to write to any undeclared or inaccessible property.
	 *
	 * @param mixed $value
	 * @throws \LogicException
	 * @return mixed
	 */
	public function __set(string $name, $value) {

		throw new \LogicException(\sprintf(
			"Cannot write to undeclared property '%s' in %s",
			$name,
			\get_called_class()
		));

	}

}
