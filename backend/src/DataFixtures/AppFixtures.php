<?php

namespace App\DataFixtures;

use App\Factory\UserFactory;
use App\Factory\NodeFactory;
use App\Factory\LinkFactory;
use App\Factory\NodePermissionFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Enum\NodeType;


final class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // 1. Créer des users
        UserFactory::createMany(10);

        // 2. Créer des dossiers racine
        $rootFolders = NodeFactory::createMany(5, [
            'type' => NodeType::FOLDER,
            'parent' => null,
        ]);

        // 3. Créer des fichiers dans les dossiers
        foreach ($rootFolders as $folder) {
            NodeFactory::createMany(10, [
                'type' => NodeType::FILE,
                'parent' => $folder,
            ]);
        }

        // 4. Créer des liens publics
        LinkFactory::createMany(20, [
            'node' => NodeFactory::random(),
            'creator' => UserFactory::random(),
        ]);

        // 5. Créer des permissions privées
        NodePermissionFactory::createMany(30, [
            'node' => NodeFactory::random(),
            'targetUser' => UserFactory::random(),
            'sharedBy' => UserFactory::random(),
        ]);
    }
}
