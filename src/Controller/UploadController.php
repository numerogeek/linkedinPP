<?php

namespace App\Controller;

use Gedmo\Sluggable\Util\Urlizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UploadController extends AbstractController
{
    #[Route('/upload/test', name: 'app_upload_test')]
    public function upload(Request $request)
    {

    }

    #[Route('/upload', name: 'app_upload_index')]
    public function index(): Response
    {
        return $this->render(
            'upload.html.twig', [
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UploadController.php',
        ]);
    }
}
