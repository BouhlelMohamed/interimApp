<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerCmcsPOq\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerCmcsPOq/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerCmcsPOq.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerCmcsPOq\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerCmcsPOq\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'CmcsPOq',
    'container.build_id' => '7330853e',
    'container.build_time' => 1570957213,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerCmcsPOq');
