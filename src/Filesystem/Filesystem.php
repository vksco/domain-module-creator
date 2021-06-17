<?php

namespace Vksco\DomainModuleCreator\Filesystem;

/**
 * Class Filesystem.
 *
 * @author Vikash Sharma <vikashsharma2039@gmail.com>
 */
class Filesystem
{
    /**
     * Make a file.
     *
     * @param $file
     * @param $content
     *
     * @throws FileAlreadyExists
     *
     * @return int
     */
    public function make($file, $content)
    {
        if ($this->exists($file)) {
            throw new FileAlreadyExists();
        }

        return file_put_contents($file, $content);
    }

    /**
     * Determine if file is already exists.
     *
     * @param $file
     *
     * @return bool
     */
    public function exists($file)
    {
        return file_exists($file);
    }

    /**
     * Make directory.
     *
     * @param string $path
     *
     * @return void
     */
    public function makeDir($path)
    {
        if (is_dir($path)) {
            throw new FileAlreadyExists();
        }
        mkdir($path, 0777, true);
    }

    /**
     * File append.
     *
     * @param strign $path
     * @param string $content
     *
     * @return int
     */
    public function append($path, $content)
    {
        return file_put_contents($path, $content, FILE_APPEND | LOCK_EX);
    }

    public function deleteDir($path, $directory)
    {
        $dir = $path . DIRECTORY_SEPARATOR . $directory;
        $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
        $files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($files as $file) {
            if ($file->isDir()) {
                rmdir($file->getRealPath());
            } else {
                unlink($file->getRealPath());
            }
        }
        rmdir($dir);
    }
}
