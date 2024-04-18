<?php return array(
    'root' => array(
        'name' => '__root__',
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'reference' => NULL,
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        '__root__' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'reference' => NULL,
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'catfan/medoo' => array(
            'pretty_version' => 'v2.1.12',
            'version' => '2.1.12.0',
            'reference' => 'd1ff4e0e873a3e032e3d8804031dd6be4e013b22',
            'type' => 'framework',
            'install_path' => __DIR__ . '/../catfan/medoo',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'flightphp/core' => array(
            'pretty_version' => 'v3.8.1',
            'version' => '3.8.1.0',
            'reference' => '0011efd42c40f4c600612e425ad598ec8cd6bae7',
            'type' => 'library',
            'install_path' => __DIR__ . '/../flightphp/core',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'mikecao/flight' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '2.0.2',
            ),
        ),
    ),
);
