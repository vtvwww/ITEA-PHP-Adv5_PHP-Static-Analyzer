<?php

namespace Vtvwww\StaticAnalyzer\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command for getting short information about specify Class from specify Path
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

//        $analyzer = new ClassAuthor($projectSrc, $email);
//        $count = $analyzer->analyze();
//
//        $replaces = array(
//            'class_name' => 'some-class',
//            'class_type' => 'some-type',
//            'prop-public' => 'prop-public-1',
//            'prop-public' => 'prop-public-1',
//        );
//
//        $output->writeln(\str_replace(
//            '',
//            $email,
//            $count
//        ));
    }
}
