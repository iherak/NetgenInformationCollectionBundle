<?php

namespace Netgen\Bundle\InformationCollectionBundle\Tests\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Netgen\Bundle\InformationCollectionBundle\DependencyInjection\NetgenInformationCollectionExtension;

class NetgenInformationCollectionExtensionTest extends AbstractExtensionTestCase
{
    protected function getContainerExtensions()
    {
        return [
            new NetgenInformationCollectionExtension(),
        ];
    }

    public function testItSetsValidContainerParameters()
    {
        $this->container->setParameter('ezpublish.siteaccess.list', []);
        $this->load();
    }

    protected function getMinimalConfiguration()
    {
        return [
            'system' => [
                'default' => [
                    'templates'       => [
                        'default'       => 'template',
                        'content_types' => [
                            'content_type1' => 'content_type1_template',
                            'content_type2' => 'content_type2_template',
                        ],
                    ],
                    'actions'         => [
                        'default'       => [
                            'action1',
                            'action2',
                        ],
                        'content_types' => [
                            'content_type1' => [
                                'action3',
                                'action4',
                            ],
                            'content_type2' => [
                                'action5',
                                'action6',
                            ],
                        ],
                    ],
                    'fallback_values' => [
                        'sender'    => 'sender',
                        'recipient' => 'recipient',
                        'subject'   => 'subject',
                    ],
                ],
            ],
        ];
    }
}