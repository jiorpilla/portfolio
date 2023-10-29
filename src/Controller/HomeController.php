<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\Type\ContactMeType;
use App\Form\Type\CaptchaType;
use Karser\Recaptcha3Bundle\Form\Recaptcha3Type;
use Karser\Recaptcha3Bundle\Validator\Constraints\Recaptcha3;
use Karser\Recaptcha3Bundle\Validator\Constraints\Recaptcha3Validator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: "homepage")]
    public function index(): Response
    {

        $new_works = [
            'portfolio' => [
                'name' => 'My Portfolio',
                'url' => 'https://janivanorpilla.com./',
                'image' => 'screencapture-janivanorpilla-2023-10-23-19_16_40.png',
                'github_url' => 'https://github.com/jiorpilla/portfolio',
                'description' => '',
                'skills' => [
                    'PHP',
                    'Symfony 6',
                    'Tailwind CSS',
                    'Tailwind Elements',
                    'Mysql',
                    'CSS',
                    'Javascript',
                    'MailerSend',
                    'Gmail SMTP',
                ],
            ],
        ];
        $works = [
            'katron' => [
                'name' => 'Katron Creative',
                'url' => 'https://katron.com.au/',
                'image' => 'screencapture-katron-au-home-2023-10-22-00_30_50.png',
                'github_url' => '',
                'description' => '',
                'skills' => [
                    'PHP',
                    'Mysql',
                    'CSS',
                    'JQuery',
                    'Javascript',
                    'Bootstrap',
                    'SEO (On-page)',
                    'Google Maps API',
                    'DNS Configuration',
                    'Website Deployment',
                ],
            ],
            'marketquarter' => [
                'name' => 'Market Quarter',
                'url' => 'https://www.marketquarter.com.au/',
                'image' => 'screencapture-marketquarter-au-2023-10-22-00_34_48.png',
                'github_url' => '',
                'description' => '',
                'skills' => [
                    'PHP',
                    'Mysql',
                    'CSS',
                    'JQuery',
                    'Javascript',
                    'Bootstrap',
                    'SEO (On-page)',
                    'Google Maps API',
                    'DNS Configuration',
                    'Website Deployment',
                ],
            ],
            'rotaryadelaidewest' => [
                'name' => 'Rotary Adelaide West',
                'url' => 'https://rotaryadelaidewest.org/',
                'image' => 'screencapture-rotaryadelaidewest-org-2023-10-22-00_33_40.png',
                'github_url' => '',
                'description' => '',
                'skills' => [
                    'PHP',
                    'Mysql',
                    'CSS',
                    'JQuery',
                    'Javascript',
                    'Bootstrap',
                    'SEO (On-page)',
                    'Google Maps API',
                    'DNS Configuration',
                    'Website Deployment',
                ],
            ],
            'inglefarm' => [
                'name' => 'Ingle Farm Dental',
                'url' => 'https://inglefarmdental.com.au/',
                'image' => 'screencapture-inglefarmdental-au-2023-10-22-00_40_49.png',
                'github_url' => '',
                'description' => '',
                'skills' => [
                    'PHP',
                    'Mysql',
                    'CSS',
                    'JQuery',
                    'Javascript',
                    'Bootstrap',
                    'SEO (On-page)',
                    'Google Maps API',
                    'DNS Configuration',
                    'Website Deployment',
                ],
            ],
            'edfaust' => [
                'name' => 'EDF Australia',
                'url' => 'https://edfaust.com.au/',
                'image' => 'screencapture-edfaust-au-2023-10-22-00_29_47.png',
                'github_url' => '',
                'description' => '',
                'skills' => [
                    'PHP',
                    'Mysql',
                    'CSS',
                    'JQuery',
                    'Javascript',
                    'Bootstrap',
                    'SEO (On-page)',
                    'Google Maps API',
                    'DNS Configuration',
                    'Website Deployment',
                ],
            ],
            'erringtonsec' => [
                'name' => 'Errington Special Education Centre',
                'url' => 'https://www.erringtonsec.sa.edu.au/',
                'image' => 'screencapture-erringtonsec-sa-edu-au-2023-10-22-00_38_58.png',
                'github_url' => '',
                'description' => '',
                'skills' => [
                    'PHP',
                    'Mysql',
                    'CSS',
                    'JQuery',
                    'Javascript',
                    'Bootstrap',
                    'SEO (On-page)',
                    'Google Maps API',
                    'DNS Configuration',
                    'Website Deployment',
                ],
            ],
            'gawler' => [
                'name' => 'Gawler and District College B-12',
                'url' => 'https://www.gdc.sa.edu.au/',
                'image' => 'screencapture-gawlerps-sa-edu-au-2023-10-22-00_36_05.png',
                'github_url' => '',
                'description' => '',
                'skills' => [
                    'PHP',
                    'Mysql',
                    'CSS',
                    'JQuery',
                    'Javascript',
                    'Bootstrap',
                    'SEO (On-page)',
                    'Google Maps API',
                    'DNS Configuration',
                    'Website Deployment',
                ],
            ],
            'teachingtools' => [
                'name' => 'Teaching Tools',
                'url' => 'https://www.teachingtools.com.au/',
                'image' => 'screencapture-teachingtools-au-2023-10-22-00_33_02.png',
                'github_url' => '',
                'description' => '',
                'skills' => [
                    'PHP',
                    'Mysql',
                    'CSS',
                    'JQuery',
                    'Javascript',
                    'Bootstrap',
                    'SEO (On-page)',
                    'Google Maps API',
                    'DNS Configuration',
                    'Website Deployment',
                ],
            ],
            'jimditchfield' => [
                'name' => 'Jim Ditchfield',
                'image' => 'screencapture-jimditchfield-au-2023-10-22-21_31_15.png',
                'url' => 'https://jimditchfield.au/',
                'github_url' => '',
                'description' => '',
                'skills' => [
                    'PHP',
                    'Mysql',
                    'CSS',
                    'JQuery',
                    'Javascript',
                    'Bootstrap',
                    'SEO (On-page)',
                    'Google Maps API',
                    'DNS Configuration',
                    'Website Deployment',
                ],
            ],
        ];
        $works_carousels = [
            'raconteurph' => [
                'name' => 'RaconteurPH',
                'url' => 'https://raconteurph.com/',
                'description' => 'A Custom CMS website ',
                'image' => [
                    'screencapture-raconteurph-2023-10-22-00_28_57.png',
                    'screencapture-raconteurph-admin-2023-10-22-01_34_06.png',
                    'screencapture-raconteurph-admin-index-php-2023-10-22-01_34_25.png',
                    'screencapture-raconteurph-admin-index-php-2023-10-22-01_34_41.png',
                ],
                'skills' => [
                    'PHP', 'Mysql', 'CSS', 'JQuery', 'Javascript', 'Bootstrap', 'SEO (On-page)', 'DNS Configuration', 'Website Deployment',
                ],
            ],
            'juku' => [
                'name' => 'Juku (SMS - Basic)',
                'url' => 'https://juku.e-school.jp/',
                'description' => 'A School Management System with Basic functionalities',
                'image' => [
                    'screencapture-juku-e-school-jp-index-php-2023-10-22-01_03_33.png',
                    'screencapture-juku-e-school-jp-index-php-2023-10-22-01_03_49.png',
                    'screencapture-juku-e-school-jp-index-php-2023-10-22-01_05_02.png',
                    'screencapture-juku-e-school-jp-index-php-2023-10-22-01_05_24.png',
                    'screencapture-juku-e-school-jp-index-php-2023-10-22-01_05_41.png',
                    'screencapture-juku-e-school-jp-index-php-2023-10-22-01_06_02.png',
                    'screencapture-juku-e-school-jp-index-php-2023-10-22-01_06_28.png',
                    'screencapture-juku-e-school-jp-index-php-2023-10-22-01_07_07.png',
                ],
                'skills' => [
                    'PHP 5', 'Mysql', 'CSS', 'JQuery', 'Javascript', 'Bootstrap', 'SEO (On-page)', 'Google Maps API', 'DNS Configuration', 'Website Deployment',
                ],
            ],
            'demojuku' => [
                'name' => 'New Juku (SMS - Basic)',
                'url' => 'https://demojuku.e-school.jp/',
                'description' => 'A School Management System with Basic functionalities',
                'image' => [
                    'screencapture-demojuku-e-school-jp-index-php-2023-10-22-00_42_37.png',
                    'screencapture-demojuku-e-school-jp-index-php-2023-10-22-00_42_58.png',
                    'screencapture-demojuku-e-school-jp-index-php-2023-10-22-00_43_41.png',
                    'screencapture-demojuku-e-school-jp-index-php-2023-10-22-00_43_51.png',
                    'screencapture-demojuku-e-school-jp-index-php-2023-10-22-00_44_40.png',
                    'screencapture-demojuku-e-school-jp-index-php-2023-10-22-00_44_56.png',
                    'screencapture-demojuku-e-school-jp-index-php-2023-10-22-00_45_44.png',
                ],
                'skills' => [
                    'PHP', 'Mysql', 'Yii2', 'Active Record', 'MVC', 'Bootstrap',
                ],
            ],
        ];


        $contact = new Contact();

        $form = $this->createForm(ContactMeType::class);

        return $this->render('portfolio/portfolio.html.twig', [
            'new_works' => $new_works,
            'works_carousel' => $works_carousels,
            'works' => $works,
            'form' => $form,
        ]);
    }

    #[Route('/test', name: "testq")]
    public function test(): Response
    {
        ob_start();

        $address = new Address('jiorpilla@gmail.com', 'Jan Ivan Orpilla1');
//        $address = Address::create('Jan Ivan Orpilla <jiorpilla@gmail.com>');
        echo '<pre>';
        print_r($address);
        echo '</pre>';

        $o = ob_get_clean();
        return new Response($o);
    }

    #[Route('/mailer', name: "mailer")]
    public function sendEmail(Request $request, MailerInterface $mailer,Recaptcha3Validator $recaptcha3Validator)
    {

//        $score = $recaptcha3Validator->getLastResponse()->getScore();
//        $form->handleRequest($request);
//        if ($form->isSubmitted() && $form->isValid()) {
//        }
        $contact_me = $request->request->all('contact_me');
//
//        dump($contact_me);
        $subject = $contact_me['subject'];
        $email = $contact_me['email'];
        $message = $contact_me['body'];


        $email = (new Email())
//            ->from("me@janivanorpilla.com")
            ->from(new Address('jiorpilla@gmail.com', 'Jan Ivan Orpilla'))
            ->to(new Address($email))
            ->bcc('jiorpilla@gmail.com')
            ->subject('Message Sent from : janivanorpilla.com.')
            ->html("<h2 class='text-2xl font-semibold'>{$subject}</h2><p>$message</p>");

        //send email
        $mailer->send($email);

        return new RedirectResponse('/#contact_section');
    }

    #[Route('/images_test', name: "list_images")]
    public function listImages()
    {

        // creates a task object and initializes some data for this example
        $contact = new Contact();

        $captcha = $this->createForm(ContactMeType::class);
        dump($captcha);
        return $this->render('portfolio/portfolio.html.twig', [
            'form' => $captcha,
        ]);
    }
}