<?php

namespace App\Service;

class PortfolioService
{
    public function getSkills(): array
    {
        return [
            'Languages' => [
                'icon' => 'fa-solid fa-code',
                'color_bg' => 'blue-500/40',
                'color_text' => 'blue-400',
                'color_hover' => 'blue-800',
                'items' => [
                    [ 'icon' => 'fa-brands fa-php', 'name' => 'PHP', 'display' => true ],
                    [ 'icon' => 'fa-brands fa-html5', 'name' => 'HTML', 'display' => true ],
                    [ 'icon' => 'fa-brands fa-css3-alt', 'name' => 'CSS', 'display' => true ],
                    [ 'icon' => 'fa-brands fa-js', 'name' => 'JavaScript', 'display' => true ],
                    [ 'image' => 'skills/typescript.svg', 'name' => 'TypeScript', 'display' => true ],
                    [ 'icon' => 'fa-brands fa-python', 'name' => 'Python', 'display' => true ],
                    [ 'icon' => 'fa-brands fa-java', 'name' => 'Java', 'display' => true ],
                    [ 'icon' => 'fa-brands fa-kotlin', 'name' => 'Kotlin', 'display' => false ],
                    [ 'icon' => 'fa-brands fa-swift', 'name' => 'Swift', 'display' => false ]
                ]
            ],
            'Frameworks' => [
                'icon' => 'fa-solid fa-layer-group',
                'color_bg' => 'red-500/40',
                'color_text' => 'red-400',
                'color_hover' => 'red-800',
                'items' => [
                    [ 'icon' => 'fa-brands fa-symfony', 'name' => 'Symfony', 'display' => true ],
                    [ 'image' => 'skills/flask.png', 'name' => 'Flask', 'display' => false ],
                    [ 'image' => 'skills/next-js.svg', 'name' => 'Next.js', 'display' => false ],
                    [ 'image' => 'skills/tailwind.png', 'name' => 'Tailwind CSS', 'display' => true ],
                    [ 'icon' => 'fa-brands fa-bootstrap', 'name' => 'Bootstrap', 'display' => true ]
                ]
            ],
            'Backend' => [
                'icon' => 'fa-solid fa-server',
                'color_bg' => 'green-500/40',
                'color_text' => 'green-400',
                'color_hover' => 'green-800',
                'items' => [
                    [ 'icon' => 'fa-brands fa-node', 'name' => 'Node.js', 'display' => false ],
                    [ 'icon' => 'fa-solid fa-database', 'name' => 'PostgreSQL', 'display' => true ],
                    [ 'icon' => 'fa-solid fa-database', 'name' => 'MySQL', 'display' => true ],
                    [ 'icon' => 'fa-solid fa-database', 'name' => 'SQLite', 'display' => false ],
                    [ 'icon' => 'fa-solid fa-server', 'name' => 'REST APIs', 'display' => false ]
                ]
            ],
            'Practices' => [
                'icon' => 'fa-solid fa-list-check',
                'color_bg' => 'yellow-500/40',
                'color_text' => 'yellow-400',
                'color_hover' => 'yellow-800',
                'items' => [
                    [ 'icon' => 'fa-solid fa-arrows-spin', 'name' => 'Agile', 'display' => true ],
                    [ 'icon' => 'fa-solid fa-list-check', 'name' => 'Scrum', 'display' => true ],
                    [ 'icon' => 'fa-brands fa-git-alt', 'name' => 'Git', 'display' => true ],
                    [ 'image' => 'skills/postman.svg', 'name' => 'Postman', 'display' => true ],
                ]
            ]
        ];
    }

    public function findTechByName(string $name): ?array
    {
        $skills = $this->getSkills();
        
        foreach ($skills as $category) {
            foreach ($category['items'] as $item) {
                if ($item['name'] === $name) {
                    return array_merge($item, [
                        'color_bg' => $category['color_bg'],
                        'color_text' => $category['color_text'],
                        'color_hover' => $category['color_hover']
                    ]);
                }
            }
        }
        return null;
    }

    public function getExperiences(): array
    {
        return [
            [
                'title' => 'Compositeur VFX',
                'company' => 'Nordisk Films Shortcut',
                'location' => 'Copenhague',
                'period' => '2019',
                'logo' => 'companies/nordiskFilms_logo.jpg',
                'description' => [
                    '↳ Rotoscopting et cleanup sur divers projets de films et séries',
                    '↳ Compositing et intégation d\'assets 3D pour la série "The Rain"',
                    '↳ Mise en place d\'un pipeline de production pour le compositing (Python)',
                ],
                'technologies' => array_map(fn($tech) => $this->findTechByName($tech), 
                    ['Python'])
            ]
        ];
    }

    public function getEducations(): array
    {
        return [
            [
                'degree' => 'Licence Audiovisuel, Multimédia et Sciences du Numérique',
                'school' => 'Université de Valenciennes',
                'location' => 'Valenciennes, France',
                'period' => '2014 - 2017',
                'logo' => 'schools/universiteValenciennes.png',
                'description' => [
                    '↳ Partie scientifique : Informatique, optique, science du signal, biologie',
                    '↳ Partie audiovisuelle : Prise de vue, montage, son, post-production',
                    '↳ Partie multimédia : Web, développement, design, ergonomie',
                ]
            ]
        ];
    }

    public function getProjects(): array
    {
        return [
            [
                'title' => 'QBook',
                'description' => 'Application de réservation de salles de réunions',
                'image' => 'projects/project.png',
                'github' => 'https://github.com/quentin-mace/qbook',
                'website' => 'https://github.com/quentin-mace/qbook',
                'demo' => 'https://github.com/quentin-mace/qbook',
                'technologies' => array_map(fn($tech) => $this->findTechByName($tech), 
                    ['HTML', 'CSS', 'MySQL', 'TypeScript', 'PHP', 'Bootstrap', 'Git'])
            ]
        ];
    }

    public function getPersonalInfo(): array
    {
        return [
            'name' => 'Quentin Macé',
            'email' => 'quentin.mace.1110@proton.me',
            'birthdate' => '1996-10-11',
            'files' => [
                'cv' => 'files/cv.pdf',
                'profile_image' => 'images/profile-image.jpg'
            ],
            'social' => [
                'github' => 'https://github.com/quentin-mace',
                'email' => 'quentin.mace.1110@proton.me',
                'linkedin' => 'https://www.linkedin.com/in/quentinmace/'
            ]
        ];
    }
}