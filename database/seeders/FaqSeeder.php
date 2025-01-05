<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'How can I create an account?',
                'answer' => 'Click on the "Sign Up" button, fill out the registration form, and verify your email to activate your account.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'What payment methods do you accept?',
                'answer' => 'We accept credit cards, debit cards, PayPal, and other popular payment gateways.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'How do I contact customer support?',
                'answer' => 'You can reach us via email at support@example.com or through the contact form on our website.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Is my data secure on your website?',
                'answer' => 'Yes, we use industry-standard encryption and follow best practices to ensure your data is safe.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Can I access the website on mobile devices?',
                'answer' => 'Yes, our website is fully responsive and works seamlessly on smartphones and tablets.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Faq::insert($faqs);

    }
}
