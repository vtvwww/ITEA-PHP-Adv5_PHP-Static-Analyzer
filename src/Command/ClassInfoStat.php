<?php

/*
 * This file is part of the "PHP Static Analyzer" project.
 *
 * (c) Vladimir Tverdohleb <vtv.www@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Greeflas\StaticAnalyzer\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\{InputArgument, InputInterface};
use Symfony\Component\Console\Output\OutputInterface;
use Greeflas\StaticAnalyzer\Analyzer\ClassInfo;

/**
 * Command for getting short information about specify Class
 *
 * Example of usage
 * ./bin/console stat:class-info <full-class-name> [path]
 *
 * @author Vladimir Tverdohleb <vtv.www@gmail.com>
 */
class ClassInfoStat extends Command
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('stat:class-info')
            ->setDescription('Shows short info about specify Class')
            ->addArgument(
                'class',
                InputArgument::REQUIRED,
                'Full Class-name with Namespace.'
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $class = $input->getArgument('class');

        $analyzer = new ClassInfo($class);

        $resultClassInfo = $analyzer->analyze();

        if (null !== $resultClassInfo) {
            $output->writeln(
                \str_replace(\array_map(function ($i) { return '{{' . $i . '}}'; }, \array_keys($resultClassInfo)),
                $resultClassInfo,
                'Class: {{class_name}} is {{class_type}}' . \PHP_EOL .
                'Properties:' . \PHP_EOL .
                '    public: {{properties_public}}' . \PHP_EOL .
                '    protected: {{properties_protected}}' . \PHP_EOL .
                '    private: {{properties_private}}' . \PHP_EOL .
                'Methods:' . \PHP_EOL .
                '    public: {{methods_public}}' . \PHP_EOL .
                '    protected: {{methods_protected}}' . \PHP_EOL .
                '    private: {{methods_private}}' . \PHP_EOL
            ));
        }
    }
}
