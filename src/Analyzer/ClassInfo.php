<?php

namespace Vtvwww\StaticAnalyzer\Analyzer;

use Symfony\Component\Finder\Finder;

/**
 * Analyzer that provides number of classes, interfaces and trait created by needed developer.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class ClassInfo
{
    private $projectDir;
    private $developerEmail;

    public function __construct(string $projectDir, string $developerEmail)
    {
        $this->projectDir = $projectDir;
        $this->developerEmail = $developerEmail;
    }

    public function analyze(): int
    {
        /* @var \Symfony\Component\Finder\SplFileInfo[] $finder */
        $finder = Finder::create()
            ->in($this->projectDir)
            ->files()
            ->name('/^[A-Z].+\.php$/')
        ;

        $docBlockFactory =  DocBlockFactory::createInstance();

        $counter = 0;

        foreach ($finder as $file) {
            $namespace = ClassInfoHelper::getFullClassNameFromFile($file->getPathname());

            try {
                $reflector = new \ReflectionClass($namespace);
            } catch (\ReflectionException $e) {
                continue;
            }

            if (!$docComment = $reflector->getDocComment()) {
                continue;
            }

            $docBlock = $docBlockFactory->create($docComment);

            /* @var \phpDocumentor\Reflection\DocBlock\Tags\Author[] $authors */
            $authors = $docBlock->getTagsByName('author');

            foreach ($authors as $author) {
                if ($author->getEmail() === $this->developerEmail) {
                    ++$counter;
                }
            }
        }

        return $counter;
    }
}
