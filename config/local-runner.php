<?php

return [
    'common'   => [
        'hosts_path' => 'C:\Windows\System32\drivers\etc\hosts',
        'docker_ip'  => '10.0.75.2',
    ],
    'projects' => [
        'vendor2' => [
            'type'         => 'libraries',
            'repositories' => [
                'git' => [
                    'organelles/system'             => 'https://github.com/organelles/system.git',
                    'organelles/install'            => 'https://github.com/organelles/install.git',
                    'microbeasts/local-runner-core' => 'https://github.com/microbeasts/local-runner-core.git',
                ],
            ],
        ],
        'example' => [
            'type'         => 'projects',
            'repositories' => [
                'git' => [
                    'test-for-local-runner'   => 'https://github.com/microbeasts/test-for-local-runner.git',
                    'test-for-local-runner-2' => 'https://github.com/microbeasts/test-for-local-runner.git',
                    'https://github.com/teqneers/PHP-Stream-Wrapper-for-Git.git',
                ],
            ],
            'domain_zone'  => 'loc',
            'version'      => '3.5',
            'services'     => [
                'nginx' => [
                    'image'    => 'nginx',
                    'volumes'  => [
                        './docker/nginx/:/etc/nginx/conf.d/',
                    ],
                    'networks' => [
                        'frontend',
                        'backend',
                    ],
                ],
                'mysql' => [
                    'image'       => 'mysql:5.7',
                    'volumes'     => [
                        './docker/db/mysql_5.7/:/var/lib/mysql/',
                    ],
                    'environment' => [
                        'MYSQL_ROOT_PASSWORD' => 'root',
                        'MYSQL_DATABASE'      => 'local',
                        'MYSQL_USER'          => 'local',
                        'MYSQL_PASSWORD'      => 'local',
                    ],
                    'networks'    => [
                        'backend',
                    ],
                ],
                'redis' => [
                    'image'    => 'redis:3.2',
                    'networks' => [
                        'backend',
                    ],
                ],
            ],
            'networks'     => [
                'frontend' => [
                    'driver' => 'bridge',
                ],
                'backend'  => [
                    'driver' => 'bridge',
                ],
            ],
        ],
    ],
];