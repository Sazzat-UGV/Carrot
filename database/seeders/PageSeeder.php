<?php
namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::create([
            'terms_condition' => 'Terms and Conditions
Effective Date: [Insert Date]

Welcome to [Your Website Name] (the "Site"). By accessing or using our Site, you agree to comply with and be bound by the following Terms and Conditions ("Terms"). If you do not agree to these Terms, please do not use our Site.

1. General Information
These Terms apply to all users of the Site, including visitors, customers, and vendors. By accessing the Site, you represent that you are at least 18 years old and capable of entering into binding contracts.

2. Products and Services
We offer a variety of products for sale through our Site. All product descriptions, images, and prices are accurate to the best of our knowledge at the time of posting. However, we reserve the right to change or discontinue any product or service without notice.

3. Account Registration
To make a purchase or use certain features of our Site, you may need to create an account. You are responsible for maintaining the confidentiality of your account information and for all activities that occur under your account. You agree to notify us immediately of any unauthorized use of your account.

4. Orders and Payment
By placing an order on our Site, you are making an offer to purchase the items in your cart. All orders are subject to acceptance by us. We may refuse or cancel your order if there is an issue with stock, payment, or the delivery address. Payments can be made through the payment methods listed on the Site.

5. Pricing and Availability
Prices and availability of products are subject to change without notice. While we make every effort to ensure that product information and prices are accurate, errors may occur. We reserve the right to correct any errors and adjust the price or availability of a product at any time before or after your order is placed.

6. Shipping and Delivery
We offer shipping to various locations. Delivery times and charges will vary based on your location and the shipping method chosen. We are not responsible for delays caused by third-party shipping carriers or other unforeseen circumstances.

7. Returns and Refunds
We offer a [X]-day return policy. If you are not satisfied with your purchase, you can request a return or exchange within this period, provided the item is in its original condition and packaging. Refunds will be issued to the original payment method once the return is processed.

8. User Conduct
When using our Site, you agree not to:

Violate any applicable laws or regulations.
Post or transmit any content that is harmful, defamatory, offensive, or otherwise inappropriate.
Use the Site for fraudulent purposes or conduct any unlawful activities.
9. Privacy Policy
Your use of the Site is also governed by our Privacy Policy, which explains how we collect, use, and protect your personal data. Please review the Privacy Policy before using the Site.

10. Intellectual Property
All content on the Site, including text, images, logos, and graphics, is the property of [Your Website Name] or its licensors and is protected by copyright and intellectual property laws. You may not use, copy, or distribute any content from the Site without prior written consent.

11. Limitation of Liability
We are not liable for any damages or losses arising from your use of the Site or the products sold, except to the extent required by law. In no event will our liability exceed the total amount paid by you for the product that caused the damage.

12. Termination
We may suspend or terminate your access to the Site at any time, without notice, if we believe you have violated these Terms. You may terminate your account by notifying us at [support@yourwebsite.com].

13. Governing Law
These Terms are governed by and construed in accordance with the laws of [Your Country/Region]. Any disputes arising under these Terms will be subject to the exclusive jurisdiction of the courts of [Your City, Country].

14. Changes to Terms
We reserve the right to update or change these Terms at any time. Any changes will be posted on this page with an updated "Effective Date." By continuing to use the Site after such changes, you agree to be bound by the revised Terms.',
            'privacy_policy'  => 'Effective Date: [Insert Date]

At [Your Website Name], we respect and protect your privacy. This Privacy Policy outlines how we collect, use, and safeguard your personal information when you use our Site.

1. Information We Collect
We collect information in the following ways:

Personal Information: When you create an account, make a purchase, or interact with the Site, we may collect personal information such as your name, email address, shipping address, payment details, and phone number.
Non-Personal Information: We may also collect non-personal information such as browser type, device information, and browsing patterns to improve our services.
2. How We Use Your Information
We use your information for the following purposes:

To process and fulfill your orders.
To communicate with you regarding your orders, promotions, and customer service inquiries.
To improve the functionality and user experience of the Site.
To send you marketing communications, if you have opted in to receive them.
3. Data Sharing and Disclosure
We do not sell or rent your personal information to third parties. However, we may share your information in the following cases:

Service Providers: We may share your information with third-party service providers who assist us with payment processing, shipping, and marketing.
Legal Compliance: We may disclose your information to comply with applicable laws or to protect our rights.
4. Cookies
We use cookies to enhance your experience on the Site. Cookies are small files that store information about your preferences and browsing history. You can adjust your browser settings to refuse cookies, but doing so may limit certain features of the Site.

5. Data Security
We implement industry-standard security measures to protect your personal information from unauthorized access, alteration, or disclosure. However, no method of data transmission over the internet is 100% secure, and we cannot guarantee absolute security.

6. Your Rights
You have the right to:

Access and update your personal information.
Request that we delete your personal information (subject to legal obligations).
Opt out of marketing communications at any time.
7. Third-Party Websites
Our Site may contain links to third-party websites. We are not responsible for the privacy practices or content of those websites.

8. Children’s Privacy
Our Site is not intended for children under the age of 13, and we do not knowingly collect personal information from children.

9. Changes to This Privacy Policy
We reserve the right to update this Privacy Policy at any time. Any changes will be posted on this page with an updated "Effective Date." Please review this policy periodically to stay informed.',
        ]);

    }
}
