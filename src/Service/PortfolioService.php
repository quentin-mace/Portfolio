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
                    ['icon' => 'fa-brands fa-php', 'name' => 'PHP', 'label_key' => 'portfolio.skill.php', 'display' => true],
                    ['icon' => 'fa-brands fa-html5', 'name' => 'HTML', 'label_key' => 'portfolio.skill.html', 'display' => true],
                    ['icon' => 'fa-brands fa-css3-alt', 'name' => 'CSS', 'label_key' => 'portfolio.skill.css', 'display' => true],
                    ['icon' => 'fa-brands fa-js', 'name' => 'JavaScript', 'label_key' => 'portfolio.skill.javascript', 'display' => true],
                    ['image' => 'skills/typescript.svg', 'name' => 'TypeScript', 'label_key' => 'portfolio.skill.typescript', 'display' => true],
                    ['icon' => 'fa-brands fa-python', 'name' => 'Python', 'label_key' => 'portfolio.skill.python', 'display' => true],
                    ['icon' => 'fa-brands fa-java', 'name' => 'Java', 'label_key' => 'portfolio.skill.java', 'display' => true],
                    ['icon' => 'fa-brands fa-kotlin', 'name' => 'Kotlin', 'label_key' => 'portfolio.skill.kotlin', 'display' => false],
                    ['icon' => 'fa-brands fa-swift', 'name' => 'Swift', 'label_key' => 'portfolio.skill.swift', 'display' => false],
                ],
            ],
            'Frameworks' => [
                'icon' => 'fa-solid fa-layer-group',
                'color_bg' => 'red-500/40',
                'color_text' => 'red-400',
                'color_hover' => 'red-800',
                'items' => [
                    ['icon' => 'fa-brands fa-symfony', 'name' => 'Symfony', 'label_key' => 'portfolio.skill.symfony', 'display' => true],
                    ['image' => 'skills/flask.png', 'name' => 'Flask', 'label_key' => 'portfolio.skill.flask', 'display' => false],
                    ['image' => 'skills/next-js.svg', 'name' => 'Next.js', 'label_key' => 'portfolio.skill.nextjs', 'display' => false],
                    ['image' => 'skills/tailwind.png', 'name' => 'Tailwind CSS', 'label_key' => 'portfolio.skill.tailwind_css', 'display' => true],
                    ['icon' => 'fa-brands fa-bootstrap', 'name' => 'Bootstrap', 'label_key' => 'portfolio.skill.bootstrap', 'display' => true],
                ],
            ],
            'Backend' => [
                'icon' => 'fa-solid fa-server',
                'color_bg' => 'green-500/40',
                'color_text' => 'green-400',
                'color_hover' => 'green-800',
                'items' => [
                    ['icon' => 'fa-brands fa-node', 'name' => 'Node.js', 'label_key' => 'portfolio.skill.nodejs', 'display' => false],
                    ['icon' => 'fa-solid fa-database', 'name' => 'PostgreSQL', 'label_key' => 'portfolio.skill.postgresql', 'display' => true],
                    ['icon' => 'fa-solid fa-database', 'name' => 'MySQL', 'label_key' => 'portfolio.skill.mysql', 'display' => true],
                    ['icon' => 'fa-solid fa-database', 'name' => 'SQLite', 'label_key' => 'portfolio.skill.sqlite', 'display' => false],
                    ['icon' => 'fa-solid fa-server', 'name' => 'REST APIs', 'label_key' => 'portfolio.skill.rest_apis', 'display' => true],
                    ['icon' => 'fa-solid fa-spider', 'name' => 'API Platform', 'label_key' => 'portfolio.skill.api_platform', 'display' => true],
                ],
            ],
            'Practices' => [
                'icon' => 'fa-solid fa-list-check',
                'color_bg' => 'yellow-500/40',
                'color_text' => 'yellow-400',
                'color_hover' => 'yellow-800',
                'items' => [
                    ['icon' => 'fa-solid fa-arrows-spin', 'name' => 'Agile', 'label_key' => 'portfolio.skill.agile', 'display' => true],
                    ['icon' => 'fa-solid fa-list-check', 'name' => 'Scrum', 'label_key' => 'portfolio.skill.scrum', 'display' => true],
                    ['icon' => 'fa-brands fa-git-alt', 'name' => 'Git', 'label_key' => 'portfolio.skill.git', 'display' => true],
                    ['image' => 'skills/postman.svg', 'name' => 'Postman', 'label_key' => 'portfolio.skill.postman', 'display' => true],
                    ['icon' => 'fa-solid fa-refresh', 'name' => 'CI/CD', 'label_key' => 'portfolio.skill.cicd', 'display' => true],
                    ['icon' => 'fa-solid fa-vial', 'name' => 'PHPunit', 'label_key' => 'portfolio.skill.phpunit', 'display' => true],
                    ['icon' => 'fa-solid fa-wand-sparkles', 'name' => 'AIDD', 'label_key' => 'portfolio.skill.aidd', 'display' => true],
                ],
            ],
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
                        'color_hover' => $category['color_hover'],
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
                'title_key' => 'portfolio.experience.quarks.title',
                'company' => 'Quarks Alchemy',
                'location_key' => 'portfolio.experience.quarks.location',
                'period_key' => 'portfolio.experience.quarks.period',
                'logo' => 'companies/quarks-alchemy-logo.jpg',
                'description_keys' => [
                    'portfolio.experience.quarks.description.0',
                    'portfolio.experience.quarks.description.1',
                    'portfolio.experience.quarks.description.2',
                ],
                'technologies' => array_map(fn ($tech) => $this->findTechByName($tech),
                    ['PHP', 'HTML', 'CSS', 'TypeScript', 'PostgreSQL', 'MySQL', 'REST APIs', 'API Platform', 'Symfony', 'Tailwind CSS', 'Git', 'Postman', 'Agile', 'Scrum', 'CI/CD', 'PHPunit']),
            ],
            [
                'title_key' => 'portfolio.experience.nordisk.title',
                'company' => 'Nordisk Films Shortcut',
                'location_key' => 'portfolio.experience.nordisk.location',
                'period_key' => 'portfolio.experience.nordisk.period',
                'logo' => 'companies/nordiskFilms_logo.jpg',
                'description_keys' => [
                    'portfolio.experience.nordisk.description.0',
                    'portfolio.experience.nordisk.description.1',
                    'portfolio.experience.nordisk.description.2',
                ],
                'technologies' => array_map(fn ($tech) => $this->findTechByName($tech),
                    ['Python']),
            ],
        ];
    }

    public function getEducations(): array
    {
        return [
            [
                'degree_key' => 'portfolio.education.oc.degree',
                'school' => 'OpenClassrooms',
                'location_key' => 'portfolio.education.oc.location',
                'period_key' => 'portfolio.education.oc.period',
                'logo' => 'schools/OC.jpeg',
                'description_keys' => [
                    'portfolio.education.oc.description.0',
                    'portfolio.education.oc.description.1',
                    'portfolio.education.oc.description.2',
                ],
            ],
            [
                'degree_key' => 'portfolio.education.jonkoping.degree',
                'school' => 'Université de Jönköping',
                'location_key' => 'portfolio.education.jonkoping.location',
                'period_key' => 'portfolio.education.jonkoping.period',
                'logo' => 'schools/universiteSuede.jpeg',
                'description_keys' => [
                    'portfolio.education.jonkoping.description.0',
                    'portfolio.education.jonkoping.description.1',
                    'portfolio.education.jonkoping.description.2',
                ],
            ],
            [
                'degree_key' => 'portfolio.education.valenciennes.degree',
                'school' => 'Université de Valenciennes',
                'location_key' => 'portfolio.education.valenciennes.location',
                'period_key' => 'portfolio.education.valenciennes.period',
                'logo' => 'schools/universiteValenciennes.png',
                'description_keys' => [
                    'portfolio.education.valenciennes.description.0',
                    'portfolio.education.valenciennes.description.1',
                    'portfolio.education.valenciennes.description.2',
                ],
            ],
        ];
    }

    public function getProjects(): array
    {
        return [
            [
                'title_key' => 'portfolio.project.qbook.title',
                'description_key' => 'portfolio.project.qbook.description',
                'image' => 'projects/qbook.png',
                'github' => 'https://github.com/quentin-mace/qbook',
                'technologies' => array_map(fn ($tech) => $this->findTechByName($tech),
                    ['HTML', 'CSS', 'TypeScript', 'PHP', 'MySQL', 'Bootstrap', 'Git']),
            ],
            [
                'title_key' => 'portfolio.project.green_goodies.title',
                'description_key' => 'portfolio.project.green_goodies.description',
                'image' => 'projects/greengoodies.svg',
                'github' => 'https://github.com/quentin-mace/green-goodies/tree/dev',
                'technologies' => array_map(fn ($tech) => $this->findTechByName($tech),
                    ['HTML', 'CSS', 'JavaScript', 'PHP', 'PostgreSQL', 'REST APIs', 'Symfony', 'Tailwind CSS', 'Git', 'Agile', 'Scrum']),
            ],
            [
                'title_key' => 'portfolio.project.critipixel.title',
                'description_key' => 'portfolio.project.critipixel.description',
                'image' => 'projects/critipixel.png',
                'github' => 'https://github.com/quentin-mace/critipixel/tree/main',
                'website' => 'https://critipixel.quentinmace.fr',
                'technologies' => array_map(fn ($tech) => $this->findTechByName($tech),
                    ['PHP', 'MySQL', 'Symfony', 'Git', 'Agile', 'Scrum', 'CI/CD', 'PHPunit']),
            ],
            [
                'title_key' => 'portfolio.project.ecogarden.title',
                'description_key' => 'portfolio.project.ecogarden.description',
                'image' => 'projects/ecogarden.svg',
                'github' => 'https://github.com/quentin-mace/eco_garden_api',
                'technologies' => array_map(fn ($tech) => $this->findTechByName($tech),
                    ['PHP', 'PostgreSQL', 'REST APIs', 'API Platform', 'Symfony', 'Git', 'Agile', 'Scrum']),
            ],
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
                'profile_image' => 'images/profile-image.jpg',
            ],
            'social' => [
                'github' => 'https://github.com/quentin-mace',
                'email' => 'quentin.mace.1110@proton.me',
                'linkedin' => 'https://www.linkedin.com/in/quentinmace/',
            ],
        ];
    }
}
