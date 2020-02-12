<?php


namespace BxHelper\Registry;


use BxHelper\Collection\Collection;
use BxHelper\Exception\ArgumentException;
use BxHelper\Exception\ParameterException;
use BxHelper\Traits\Thrower;

abstract class Registry
{
    use Thrower;

    /**
     * @var Collection;
     */
    private $registry;

    /**
     * @var Collection;
     */
    private $allowedKeys;

    /**
     * @var array
     */
    private $usedKeys = [];

    /**
     * @var Registry
     */
    private static $instance = null;

    final private function __construct()
    {
        $this->registry = new Collection();
        $this->allowedKeys = new Collection();

        $this->init();
    }

    protected abstract function init();

    final protected function setAllowedKeysAndTypes(array $allowed)
    {
        $this->allowedKeys->setArrayToCollection($allowed);
    }

    final function setValue(string $key, $value)
    {
        if ($allowedValue = $this->allowedKeys->$key) {
            self::ensureParameter($allowedValue($value), "$value is not a valid type");
        } else {
            throw new ParameterException("$key is not a valid key");
        }

        self::ensureParameter(!in_array($key, $this->usedKeys), "$key was already set");
        $this->usedKeys[] = $key;

        $this->registry->$key = $value;
    }

    final function getValue(string $key)
    {
        return $this->registry->$key;
    }

    final private function getInstance()
    {
        if (self::$instance) {
            return self::$instance;
        }

        self::$instance = new static;

        return self::$instance;
    }

    static function set(string $key, $value)
    {
        self::getInstance()->setValue($key, $value);
    }

    static function get(string $key)
    {
        self::getInstance()->getValue($key);
    }
}
