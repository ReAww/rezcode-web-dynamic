<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\ContactSubmission;
use App\Models\Project;
use App\Models\Service;
use App\Models\SocialLink;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── Users ──────────────────────────────────────────────
        User::firstOrCreate(['email' => 'admin@rezcode.com'], [
            'name'     => 'Rezcode Admin',
            'password' => Hash::make('password'),
            'role'     => 'admin',
        ]);

        User::firstOrCreate(['email' => 'user@rezcode.com'], [
            'name'     => 'Demo User',
            'password' => Hash::make('password'),
            'role'     => 'user',
        ]);

        // ── Services ───────────────────────────────────────────
        Service::truncate();
        $services = [
            ['title' => 'Web Development', 'description' => 'Custom, high-performance websites and web applications built with modern frameworks like Laravel, React, and Vue.js — tailored to your business goals.', 'icon' => 'globe', 'sort_order' => 1],
            ['title' => 'AI Integration', 'description' => 'Integrate cutting-edge AI capabilities into your products — from intelligent chatbots and recommendation engines to predictive analytics.', 'icon' => 'cpu', 'sort_order' => 2],
            ['title' => 'Automation Systems', 'description' => 'Streamline your business operations with custom automation workflows, API integrations, and process optimization solutions.', 'icon' => 'settings', 'sort_order' => 3],
            ['title' => 'Enterprise Solutions', 'description' => 'Scalable, secure enterprise-grade software solutions designed to handle complex business requirements and large-scale operations.', 'icon' => 'building', 'sort_order' => 4],
            ['title' => 'Mobile Development', 'description' => 'Cross-platform mobile applications for iOS and Android that deliver seamless user experiences and high performance.', 'icon' => 'lightning', 'sort_order' => 5],
            ['title' => 'Digital Strategy', 'description' => 'Data-driven digital transformation strategies to help your business grow, scale, and stay ahead of the competition.', 'icon' => 'chart', 'sort_order' => 6],
        ];

        foreach ($services as $service) {
            Service::create(array_merge($service, ['is_active' => true]));
        }

        // ── Projects ───────────────────────────────────────────
        Project::truncate();
        $projects = [
            [
                'title'       => 'E-Commerce Platform',
                'description' => 'A full-featured e-commerce platform with real-time inventory management, payment gateway integration, and an advanced analytics dashboard for business insights.',
                'url'         => 'https://rezcode.test',
                'github_url'  => 'https://github.com/rezcodeagency',
                'tech_stack'  => ['Laravel', 'Vue.js', 'MySQL', 'Stripe'],
                'category'    => 'web',
                'is_featured' => true,
                'sort_order'  => 1,
            ],
            [
                'title'       => 'AI Chatbot System',
                'description' => 'An intelligent customer service chatbot powered by GPT-4 that handles inquiries 24/7, reducing support costs by 60% and improving customer satisfaction.',
                'url'         => null,
                'github_url'  => 'https://github.com/rezcodeagency',
                'tech_stack'  => ['Python', 'FastAPI', 'OpenAI', 'React'],
                'category'    => 'ai',
                'is_featured' => true,
                'sort_order'  => 2,
            ],
            [
                'title'       => 'Business Automation Suite',
                'description' => 'End-to-end business process automation connecting CRM, ERP, and communication tools — saving 40+ hours of manual work per week for the client.',
                'url'         => null,
                'github_url'  => 'https://github.com/rezcodeagency',
                'tech_stack'  => ['Node.js', 'Zapier', 'REST APIs', 'PostgreSQL'],
                'category'    => 'automation',
                'is_featured' => true,
                'sort_order'  => 3,
            ],
            [
                'title'       => 'Mobile Banking App',
                'description' => 'A secure, cross-platform mobile banking application with biometric authentication, real-time transactions, and financial analytics for a fintech startup.',
                'url'         => null,
                'github_url'  => 'https://github.com/rezcodeagency',
                'tech_stack'  => ['Flutter', 'Firebase', 'Node.js', 'MongoDB'],
                'category'    => 'mobile',
                'is_featured' => false,
                'sort_order'  => 4,
            ],
            [
                'title'       => 'SaaS Dashboard Platform',
                'description' => 'A multi-tenant SaaS platform with role-based access control, real-time data visualization, and white-label capabilities for B2B clients.',
                'url'         => null,
                'github_url'  => 'https://github.com/rezcodeagency',
                'tech_stack'  => ['Laravel', 'Livewire', 'Alpine.js', 'Chart.js'],
                'category'    => 'web',
                'is_featured' => false,
                'sort_order'  => 5,
            ],
            [
                'title'       => 'Smart Inventory System',
                'description' => 'An IoT-integrated inventory management system with barcode scanning, predictive restocking alerts, and real-time warehouse tracking.',
                'url'         => null,
                'github_url'  => 'https://github.com/rezcodeagency',
                'tech_stack'  => ['Laravel', 'MQTT', 'React', 'Redis'],
                'category'    => 'automation',
                'is_featured' => false,
                'sort_order'  => 6,
            ],
        ];

        foreach ($projects as $project) {
            Project::create(array_merge($project, ['is_active' => true]));
        }

        // ── Blog Posts ─────────────────────────────────────────
        BlogPost::truncate();
        $posts = [
            [
                'title'        => 'Why Every Business Needs a Custom Web Application in 2025',
                'slug'         => 'why-every-business-needs-custom-web-app-2025',
                'excerpt'      => 'Off-the-shelf software can only take you so far. Discover why custom web applications are becoming the competitive advantage that separates thriving businesses from the rest.',
                'content'      => '<p>In today\'s digital-first economy, businesses that rely solely on generic software solutions are leaving significant value on the table. Custom web applications are no longer a luxury reserved for enterprise giants — they\'re becoming the standard for any business serious about growth.</p><h2>The Problem with Generic Software</h2><p>Off-the-shelf solutions are built for the masses, which means they\'re optimized for no one in particular. You end up paying for features you don\'t need while missing the specific functionality that would actually move your business forward.</p><h2>What Custom Development Delivers</h2><p>A custom web application is built around your exact workflows, your team\'s needs, and your customers\' expectations. It scales with you, integrates with your existing tools, and gives you a competitive moat that can\'t be replicated by simply buying the same SaaS subscription your competitors use.</p><p>At Rezcode, we\'ve helped dozens of businesses transform their operations through tailored digital solutions. The ROI consistently outperforms generic alternatives within the first year.</p>',
                'category'     => 'tech',
                'read_time'    => '5 min read',
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title'        => 'How AI Integration is Transforming Small Business Operations',
                'slug'         => 'ai-integration-transforming-small-business',
                'excerpt'      => 'Artificial intelligence is no longer just for tech giants. Learn how small and medium businesses are leveraging AI to automate tasks, improve customer experience, and drive growth.',
                'content'      => '<p>The democratization of AI tools has created an unprecedented opportunity for small and medium businesses. What once required a team of data scientists and millions in infrastructure can now be integrated into your existing systems in weeks.</p><h2>Practical AI Applications for SMBs</h2><p>From intelligent customer service chatbots that handle inquiries 24/7 to predictive analytics that forecast inventory needs, AI is solving real business problems at an accessible price point.</p><h2>Getting Started with AI Integration</h2><p>The key is identifying your highest-impact use cases first. Where are your team members spending the most time on repetitive tasks? Where do customer interactions break down? These are your AI integration opportunities.</p><p>Rezcode specializes in practical AI integrations that deliver measurable results — not just impressive demos. We focus on solutions that your team will actually use and that your customers will actually appreciate.</p>',
                'category'     => 'ai',
                'read_time'    => '6 min read',
                'is_published' => true,
                'published_at' => now()->subDays(12),
            ],
            [
                'title'        => 'The Complete Guide to Business Process Automation',
                'slug'         => 'complete-guide-business-process-automation',
                'excerpt'      => 'Stop wasting hours on repetitive tasks. This comprehensive guide walks you through identifying automation opportunities and implementing solutions that save time and reduce errors.',
                'content'      => '<p>Business process automation (BPA) is one of the highest-ROI investments a growing company can make. Yet many businesses don\'t know where to start, or they automate the wrong things first.</p><h2>Identifying Automation Opportunities</h2><p>The best candidates for automation are processes that are: repetitive and rule-based, high-volume, prone to human error, and time-consuming. Think data entry, report generation, email sequences, invoice processing, and inventory updates.</p><h2>Building Your Automation Stack</h2><p>Modern automation doesn\'t require replacing your entire tech stack. Tools like Zapier, Make, and custom API integrations can connect your existing systems and eliminate manual handoffs between them.</p><p>At Rezcode, we\'ve built automation systems that have saved clients 40+ hours per week. The key is designing workflows that are robust, maintainable, and actually adopted by your team.</p>',
                'category'     => 'automation',
                'read_time'    => '8 min read',
                'is_published' => true,
                'published_at' => now()->subDays(20),
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::create($post);
        }

        // ── Social Links ───────────────────────────────────────
        SocialLink::truncate();
        $socials = [
            ['platform' => 'Instagram',  'url' => 'https://www.instagram.com/rezcodeagency/', 'icon' => 'instagram', 'color' => '#E1306C', 'sort_order' => 1],
            ['platform' => 'TikTok',     'url' => 'https://www.tiktok.com/@rez.code',         'icon' => 'tiktok',    'color' => '#010101', 'sort_order' => 2],
            ['platform' => 'YouTube',    'url' => 'https://www.youtube.com/@RezCodeid',        'icon' => 'youtube',   'color' => '#FF0000', 'sort_order' => 3],
            ['platform' => 'GitHub',     'url' => 'https://github.com/rezcodeagency',          'icon' => 'github',    'color' => '#333333', 'sort_order' => 4],
            ['platform' => 'Facebook',   'url' => 'https://facebook.com',                      'icon' => 'facebook',  'color' => '#1877F2', 'sort_order' => 5],
            ['platform' => 'LinkedIn',   'url' => 'https://linkedin.com',                      'icon' => 'linkedin',  'color' => '#0A66C2', 'sort_order' => 6],
        ];

        foreach ($socials as $social) {
            SocialLink::create(array_merge($social, ['is_active' => true]));
        }
    }
}
