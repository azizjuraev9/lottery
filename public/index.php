<?php

$loader = require dirname(__DIR__) . '/vendor/autoload.php';

require dirname(__DIR__) . '/config/doctrine.php';

\core\BaseModel::setEntityManager($entityManager);

\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader(array($loader, 'loadClass'));