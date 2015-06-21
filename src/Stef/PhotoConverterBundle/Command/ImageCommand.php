<?php

namespace Stef\PhotoConverterBundle\Command;

use Stef\PhotoConverterBundle\Helper\Image;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ImageCommand extends BaseCommand
{
    protected function configure()
    {
        $this
            ->setName('demo:image')
            ->setDescription('Greet someone')
            ->addArgument(
                'name',
                InputArgument::OPTIONAL,
                'Who do you want to greet?'
            )
            ->addOption(
                'yell',
                null,
                InputOption::VALUE_NONE,
                'If set, the task will yell in uppercase letters'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $image = new Image($input->getArgument('name'));

        var_dump($image->getHeight());
        var_dump($image->getWidth());
    }
}