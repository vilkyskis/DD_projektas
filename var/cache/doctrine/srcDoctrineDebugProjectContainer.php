<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerEhcRolt\srcDoctrineDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerEhcRolt/srcDoctrineDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerEhcRolt.legacy');

    return;
}

if (!\class_exists(srcDoctrineDebugProjectContainer::class, false)) {
    \class_alias(\ContainerEhcRolt\srcDoctrineDebugProjectContainer::class, srcDoctrineDebugProjectContainer::class, false);
}

return new \ContainerEhcRolt\srcDoctrineDebugProjectContainer(array(
    'container.build_hash' => 'EhcRolt',
    'container.build_id' => '8581fe24',
    'container.build_time' => 1522960976,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerEhcRolt');