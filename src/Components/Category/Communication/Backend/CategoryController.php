<?php

namespace App\Components\Category\Communication\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\DTO\CategoryDTO;
use App\Components\Category\Persistence\categoryCsvImporter;

class CategoryController extends AbstractController
{


    #[Route('/', name: 'app_category')]
    public function index(): Response
    {
        $category = new CategoryDTO();
        $categoryImporter = new categoryCsvImporter($category);
        $values = $categoryImporter->readCSV();


        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
            'values' => $values
        ]);
    }
}
