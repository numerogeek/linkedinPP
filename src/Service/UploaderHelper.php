<?php

namespace App\Service;

use Gedmo\Sluggable\Util\Urlizer;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Asset\Context\RequestStackContext;

class UploaderHelper
{
    private string $uploadPath;
    private RequestStackContext $requestStackContext;
    const INPUT_IMAGE = 'input';


    public function __construct(string $uploadPath, RequestStackContext $requestStackContext)
    {

        $this->uploadPath = $uploadPath;
        $this->requestStackContext = $requestStackContext;
    }

    public function uploadImage(UploadedFile $uploadedFile): string
    {
        $destination = $this->uploadPath.'/'.self::INPUT_IMAGE;
        $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $destinationFilename = Urlizer::urlize($filename).uniqid().'.'.$uploadedFile->guessExtension();
        $uploadedFile->move($destination, $destinationFilename);

        return $destinationFilename;
    }

    public function getPublicPath(string $path): string
    {

        return $this->requestStackContext->getBasePath().'/uploads/'.$path;
    }
}
