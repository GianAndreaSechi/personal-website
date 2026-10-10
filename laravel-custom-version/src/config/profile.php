<?php

return [
    'name' => 'Gian Andrea Sechi',
    'role' => 'Senior Software Engineer',
    'company' => 'Musixmatch',
    'location' => 'Spilamberto (MO), Italy',
    'email' => 'me@gianandreasechi.com',
    'github' => 'https://github.com/GianAndreaSechi',
    'linkedin' => 'https://www.linkedin.com/in/gian-andrea-sechi/',
    'skills' => [
        'Backend' => ['PHP', 'Python', 'C# / ASP.NET', 'REST APIs', 'Node.js / NestJS'],
        'Data' => ['MySQL / Aurora', 'PostgreSQL', 'SQL Server', 'DynamoDB', 'Data pipelines'],
        'Cloud & operations' => ['AWS', 'Kubernetes', 'Docker', 'Terraform', 'CI/CD'],
        'Practices' => ['System design', 'Code review', 'Security remediation', 'Production support'],
    ],
    'experience' => [
        [
            'company' => 'Musixmatch',
            'period' => 'June 2022 – present',
            'role' => 'Senior Software Engineer',
            'promotions' => [
                ['role' => 'Senior Software Engineer', 'details' => 'L5 · Jan 2026 – present'],
                ['role' => 'Software Engineer', 'details' => 'L4 · Jan 2025 – Jan 2026'],
                ['role' => 'Software Engineer', 'details' => 'L3 · Jun 2022 – Jan 2025'],
            ],
            'points' => [
                'Backend development for data systems and royalty processing.',
                'Development of a real-time data platform using AWS Kinesis, Firehose and Lambda, with APIs and data exports.',
                'Migration of legacy services to Kubernetes and work on infrastructure and maintenance costs.',
                'Development of usage tracking services and support for production reliability.',
                'Security remediation and engineering practices as part of the security squad.',
            ],
        ],
        [
            'company' => 'Database Informatica',
            'period' => 'July 2011 – June 2022',
            'role' => 'Software Developer → Senior Full-Stack Engineer',
            'promotions' => [
                ['role' => 'Senior Full-Stack Engineer', 'details' => '2015–2022 · technical reference'],
                ['role' => 'Junior Developer → Full-Stack Engineer', 'details' => '2011–2015'],
            ],
            'points' => [
                'Development and maintenance of business applications, websites and APIs using C#, ASP.NET, PHP and relational databases.',
                'Work on electronic invoicing, payment systems and map-based search applications.',
                'Introduction of Git and REST API practices across existing projects.',
                'Project delivery from requirements and implementation through deployment and customer support.',
            ],
        ],
    ],
    'courses' => [
        ['name' => 'Google Data Analytics Professional Certificate', 'provider' => 'Google', 'area' => 'Technical learning'],
        ['name' => 'CS50x & CS50AI', 'provider' => 'Harvard University · online courses via edX', 'area' => 'Technical learning'],
        ['name' => 'Machine Learning for Business Professionals', 'provider' => 'Google', 'area' => 'Technical learning'],
        ['name' => 'Data Science Math Skills', 'provider' => 'Duke University', 'area' => 'Technical learning'],
        ['name' => 'Introduction to Philosophy', 'provider' => 'University of Edinburgh', 'area' => 'Humanities & health'],
        ['name' => 'Social Psychology (with honours)', 'provider' => 'Wesleyan University', 'area' => 'Humanities & health'],
        ['name' => 'Psychological First Aid', 'provider' => 'Johns Hopkins University', 'area' => 'Humanities & health'],
        ['name' => 'Essentials of Global Health', 'provider' => 'Yale University', 'area' => 'Humanities & health'],
    ],
];
