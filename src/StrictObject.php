<?php

namespace Smuuf;

trait StrictObject {

	/**
	 * Prohibits access to undeclared properties.
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
	 * Prohibits writing to undeclared or inaccessible properties.
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
