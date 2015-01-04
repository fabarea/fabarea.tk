#!/usr/bin/env php
<?php

$publisher = new Publisher($argv);

$publisher->initialize()
    ->generate()
    ->deploy();

/**
 * Class Publisher
 */
class Publisher
{

    /**
     * @var bool
     */
    protected $dryRun = FALSE;

    /**
     * @var array
     */
    protected $commands = array();

    /**
     * @param array $arguments
     */
    public function __construct(array $arguments)
    {

        if (!empty($arguments[1]) && $arguments[1] === '--dry') {
            $this->dryRun = TRUE;
        }
    }

    /**
     * Initialize the environment.
     *
     * @return $this
     */
    public function initialize()
    {
        // Remove old repository to avoid confusion
        #$this->commands[] = sprintf('mv %s %s/web-' . time(), $this->getWebDirectory(), $this->getTrashDirectory());

        // Initialize web root directory
        if (!is_dir($this->getWebDirectory())) {
            $this->commands[] = 'git clone ' . $this->getGitRemote() . ' ' . $this->getWebDirectory();
            $this->commands[] = sprintf('cd %s; git checkout gh-pages', $this->getWebDirectory());
            $this->commands[] = sprintf('cd %s; git config --local core.autocrlf false', $this->getWebDirectory());
        }

        return $this;
    }

    /**
     * Generate static web pages.
     *
     * @return $this
     */
    public function generate()
    {
        // Create redirection to "en".
        // @todo add language detection in index.html? Let see...
        $this->createRedirectionPage();

        // Generate for English
        foreach (array('en', 'fr') as $language) {

            // Generate with production flag
            $this->commands[] = sprintf(
                'cd %s/%s; sculpin generate --url=/%s --env=prod',
                $this->getSourceDirectory(),
                $language,
                $language
            );

            // Delete old source
            $this->commands[] = sprintf(
                'rm -rf %s/%s',
                $this->getWebDirectory(),
                $language
            );

            // Move source
            $this->commands[] = sprintf(
                'mv %s/%s/output_prod %s/%s',
                $this->getSourceDirectory(),
                $language,
                $this->getWebDirectory(),
                $language);
        }


        // Handle image
        $this->commands[] = sprintf(
            'rm -rf %s/images',
            $this->getWebDirectory()
        );

        $this->commands[] = sprintf(
            'cp -r %s/images %s/images',
            $this->getSourceDirectory(),
            $this->getWebDirectory()
        );


        return $this;
    }

    /**
     * Publish the web pages.
     *
     * @return void
     */
    public function deploy()
    {

        // Generate for English
        $this->commands[] = sprintf('cd %s; git add .', $this->getWebDirectory());
        $this->commands[] = sprintf('cd %s; git commit -am "Build %s"', $this->getWebDirectory(), time());
        $this->commands[] = sprintf('cd %s; git push origin gh-pages', $this->getWebDirectory(), time());
        $this->commands[] = 'echo "\n"';
        $this->commands[] = 'echo "open http://fabarea.tk"';
        $this->execute($this->commands);
    }

    /**
     * @return string
     */
    protected function getWebDirectory()
    {
        $parts = explode('/', __DIR__);
        array_pop($parts);
        return implode('/', $parts) . '/web';
    }

    /**
     * @return string
     */
    protected function getSourceDirectory()
    {
        return __DIR__;
    }

    /**
     * @return string
     */
    protected function getGitRemote()
    {
        // @todo find a more clever way here...
        return 'git@github.com:fudriot/fabarea.tk.git';
    }

    /**
     * Execute the commands
     *
     * @param mixed $commands
     * @return array
     */
    protected function execute($commands)
    {

        if (is_string($commands)) {
            $commands = array($commands);
        }

        if ($this->isDryRun()) {
            $this->log($commands);
            return array();
        }

        $result = array();
        foreach ($commands as $command) {
            exec($command, $result);
        }
        return $result;
    }

    /**
     * @param string $message
     * @return void
     */
    protected function log($message = '')
    {
        if (is_array($message)) {
            foreach ($message as $line) {
                print trim($line) . PHP_EOL;
            }
        } else {
            print trim($message);
        }
    }

    /**
     * @param string $message
     * @return void
     */
    protected function createRedirectionPage()
    {
        if (!$this->dryRun) {

            $html = <<<EOF
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="0; url=/en" />
</head>
<body>
</body>
</html>
EOF;

            file_put_contents($this->getWebDirectory() . '/index.html', $html);
        }
    }

    /**
     * Tells whether the dry run flag is found.
     *
     * @return bool
     */
    protected function isDryRun()
    {
        return $this->dryRun;
    }

    /**
     * Tells whether the dry run flag is found.
     *
     * @return bool
     */
    protected function getTrashDirectory()
    {
        return '~/.Trash';
    }
}
