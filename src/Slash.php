<?php

namespace Slash;

use SebastianBergmann\Type\TrueType;
use UnexpectedValueException;
use BadMethodCallException;
use ReflectionClass;
use ReflectionException;

/**
 * @template TKey of array-key
 * @template TValue
 */
class Slash
{

	/**
	 * The instance of Slash.
	 *
	 * @var object
	 */
	protected static object $instance;

	/**
	 * The modules you want to use.
	 *
	 * @var array<int, string>
	 */
	protected array $modules = [
		'Slash\Arrays',
		'Slash\Collections',
		'Slash\Objects',
		'Slash\Functions',
		'Slash\Utilities',
	];

	/**
	 * The loaded module instances.
	 *
	 * @var array<string, object>
	 */
	protected array $instances = [];

	/**
	 * Load a module.
	 *
	 * @throws UnexpectedValueException
	 * @param string $module
	 * @param ?object $instance
	 * @return object
	 */
	public function load(string $module,  ?object $instance = null)
	{
		if (!is_null($instance)) {
			if (!$this->hasModule($module)) {
				$this->addModule($module);
			}

			return ($this->instances[$module] = $instance);
		}

		if ($this->hasModule($module)) {
			return ($this->instances[$module] = new $module);
		}

		throw new UnexpectedValueException("Module {$module} does not exist");
	}

	/**
	 * Determine whether the module exists.
	 *
	 * @param string $module
	 * @return bool
	 */
	public function hasModule(string $module): bool
	{
		return in_array($module, $this->modules);
	}

	/**
	 * Add a new module.
	 *
	 * @param string $module
	 * @return void
	 */
	public function addModule(string $module): void
	{
		$this->modules[] = $module;
	}

	/**
	 * Get all modules.
	 *
	 * @return array<int, string>
	 */
	public function getModules(): array
	{
		return $this->modules;
	}

	/**
	 * Determine whether a module was loaded.
	 *
	 * @param string $module
	 * @return boolean
	 */
	public function isLoaded(string $module): bool
	{
		return array_key_exists($module, $this->instances);
	}

	/**
	 * Load a module (if not yet) and return its instance.
	 *
	 * @param string $module
	 * @return object
	 */
	public function getInstance(string $module): object
	{
		if (!$this->isLoaded($module)) {
			$this->load($module);
		}

		return $this->instances[$module];
	}


	/**
	 * Determine whether the given object has a method.
	 *
	 * @param object $object
	 * @param string $method
	 * @return bool
     */
	public function hasMethod(object $object, string $method): bool
	{
		return (new ReflectionClass($object))->hasMethod($method);
	}

	/**
	 * Run a method and return its output.
	 *
	 * @throws BadMethodCallException
	 * @param string $name
	 * @param array<TKey, TValue> $arguments
	 * @return TValue
     */
	public function run(string $name, array $arguments = [])
	{
		foreach ($this->getModules() as $module) {
			$instance = $this->getInstance($module);

			if ($this->hasMethod($instance, $name)) {
                $fn = [$instance, $name];
                if (is_callable($fn)) {
                    return call_user_func_array($fn, $arguments);
                }
			}
		}

		throw new BadMethodCallException("Method {$name} does not exist");
	}

	/**
	 * Handle calls to non-existent methods.
	 *
	 * @param string $method
	 * @param array<TKey, TValue> $arguments
	 * @return TValue
	 */
	public function __call(string $method, array $arguments = [])
	{
		return call_user_func_array([$this, 'run'], [$method, $arguments]);
	}

	/**
	 * Handle calls to non-existent static methods.
	 *
	 * @param string $method
	 * @param array<TKey, TValue> $arguments
	 * @return TValue
	 */
	public static function __callStatic(string $method, array $arguments = [])
	{
		if (!isset(self::$instance)) {
			self::$instance = new self;
		}

        $fn = [self::$instance, $method];

        if (!is_callable($fn)) {
            throw new BadMethodCallException("Method {$method} does not exist");
        }

		return call_user_func_array($fn, $arguments);
	}
}
