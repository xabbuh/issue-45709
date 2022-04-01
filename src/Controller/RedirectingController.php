<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RedirectingController extends AbstractController
{
    #[Route("/")]
    public function __invoke()
    {
        return $this->redirect('http://www.google.com');
    }

}
