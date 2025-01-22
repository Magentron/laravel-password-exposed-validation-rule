<?php

namespace DivineOmega\LaravelPasswordExposedValidationRule\Factories;

use DivineOmega\PasswordExposed\PasswordExposedChecker;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

/**
 * Class PasswordExposedCheckerFactory.
 */
class PasswordExposedCheckerFactory
{
    /**
     * Creates and returns an instance of PasswordExposedChecker.
     *
     * @return PasswordExposedChecker
     */
    public function instance()
    {
        $cacheDirectory = $this->getCacheDirectory();
        $cache          = new FilesystemAdapter('', 0, $cacheDirectory);

        return new PasswordExposedChecker(null, $cache);
    }

    /**
     * Gets the directory to store the cache files.
     *
     * @return string
     */
    private function getCacheDirectory()
    {
        if (function_exists('storage_path')) {
            return storage_path('app/password-exposed-cache/');
        }

        return sys_get_temp_dir().'/password-exposed-cache/';
    }
}
