<?php
namespace Dialog\Output;

use Dialog\Formatter\DateTimeBuilderInterface;
use Dialog\Log\InvalidArgumentException;

/**
 * Implementation of OutputInterface that stores the logged messages
 * in files.
 */
class FileOutput implements OutputInterface
{
    /**
     * Holds the file resource
     *
     * @var resource(file)
     */
    protected $file;

    /**
     * Holds the path where the log files are stored
     *
     * @var string
     */
    protected $path = '';

    /**
     * Holds the DateBuilderInterface instance used to build filenames
     *
     * @var \Dialog\Formatter\DateTimeBuilderInterface
     */
    protected $dateBuilder;
    
    public function __construct(DateTimeBuilderInterface $dateBuilder)
    {
        $this->dateBuilder = $dateBuilder;
    }

    /**
     * Set the path where the log files will be stored
     *
     * @param string $path the path
     * @return null
     * @throws InvalidArgumentException in case the directory does not exist
     */
    public function setPath($path)
    {
        if (!is_dir($path)) {
            throw new InvalidArgumentException('The path provided is not a directory');
        }
        
        $this->path = $path;
    }
    
    /**
     * Store the log message in a file
     *
     * @param string $message the log message
     * @return null
     *
     * @see \Dialog\Output\OutputInterface::output()
     */
    public function output($message)
    {
        // if name has changed (e.g. day has changed or whatever rules
        // exist for filename), close the existing resource if any
        $this->closeFileIfNameChanged();
        
        // create a file if it does not exist (invalidated or first time)
        $this->createFileIfNotExists();
        
        fwrite($this->file, $message . PHP_EOL);
    }
    
    /**
     * Create a log file if it does not exist
     *
     * @return null
     *
     * @throws \Exception in case the file cannot be created
     */
    protected function createFileIfNotExists()
    {
        // file exists, exit
        if ($this->file !== null) {
            return;
        }
        
        $filePath = $this->getFilePath();
        $this->file = fopen($filePath, 'a');
        if ($this->file === false) {
            throw new \Exception("Could not create log file {$filePath}");
        }
    }

    /**
     * Closes a file if the file name has changed
     *
     * @return null
     */
    protected function closeFileIfNameChanged()
    {
        // file does not exist, exit
        if ($this->file === null) {
            return;
        }

        $fileMetadata = stream_get_meta_data($this->file);
        if ($fileMetadata['uri'] !== $this->getFilePath()) {
            $this->closeFile();
        }
    }
    
    /**
     * Gets the file path
     *
     * @return string the file path (path set + file name built)
     */
    protected function getFilePath()
    {
        $dateFormatted = $this->dateBuilder->buildFromTime();
        $path = rtrim($this->path, '/');

        return "{$path}/{$dateFormatted}.log";
    }
    
    /**
     * Close the file (if a file has been opened)
     *
     * @return null
     */
    protected function closeFile()
    {
        if (is_resource($this->file)) {
            echo "closing file {$this->file}";
            fclose($this->file);
            $this->file = null;
        }
    }
    
    /**
     * On destruction of the FileOutput, close the logfile associated with it
     */
    public function __destruct()
    {
        $this->closeFile();
    }
}
