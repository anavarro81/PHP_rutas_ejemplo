<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CarBikeController extends AbstractController 
{


    
    
    #[Route('/ciudades', name: 'ciudades', methods:["GET"])] 
    public function ciudades() 
    {
        $direcciones = [            
            [            
                "ciudad"=> "Madrid",
                "pais" => "España",
                "CodigoPostal" => "28"
            ],

            [            
                "ciudad"=> "Barcelona",
                "pais" => "España",
                "CodigoPostal" => "08"
            ],

                ["ciudad"=> "Avila",
                "pais" => "España",
                "CodigoPostal" => "01"
            ],
        ];

        return $this->render("ciudades/ciudades.html.twig", ["direcciones" => $direcciones]);
    }
    
    #[Route('/wellcome/{name}/{edad}', name: 'wellcome', methods:["GET"])] 
    public function wellcome($name, $edad)
    {
        return $this->render("/wellcome/wellcome.html.twig", 
        [
            'name' => $name,
            'edad' => $edad
        ]);
    } 


    #[Route('/about/{name}', name: 'about', methods:["GET"])] 
    public function about($name)
    {
        return $this->render("/about/about.html.twig", ['name' => $name]);
    } 

    #[Route('/profile', name: 'profile', methods:["GET"])] 
    public function profile(): JsonResponse
    {
        $data = [
            "name" => "Maria",
            "lastname" => "López"
        ];
        return new JsonResponse($data);
    }
   
   
    #[Route('/', name: 'home', methods:["GET"])]
    public function index(): Response 
    {
        return new Response ("Hola estoy en HOME");
    }

    #[Route('/register', name: 'register', methods:["POST"])]
    public function register(): Response 
    {
        return new Response ("<h2> Estas en Register... </h2>");
    }



    #[Route("/car/{id}", name: 'carDetails', requirements: ["id" => "\d+"])]
    public function getCarDetails($id): Response 
    {
        return new Response ("Estoy en el detalle del coche... $id ");
    }

    
    #[Route('/cars', name: 'cars', methods:["GET"])]
    public function getCars(): Response
    {   
        $coches = [
            0 => [
                'marca' => 'Opel',
                'modelo' => 'Corsa',
                'foto' => "https://d1eip2zddc2vdv.cloudfront.net/dphotos/750x400/34969947-1690991112.jpg"
            ],
            1 => [
                'marca' => 'Toyota',
                'modelo' => 'Yaris',
                'foto' => "data:image/jpeg;base64,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"

            ]
            ];

        
        return $this->render('cars/cars.html.twig', [ 'coches' => $coches ]);         
            

        
        
    }

// Marcas
    #[Route('/marcas', name: 'marcas')]
    public function showBrands(): Response
    {

        $marcas = [
            0 => [
                'nombre' => 'Opel',                
                'logo' => "https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Opel-Logo_2017.png/1200px-Opel-Logo_2017.png"
            ],
            1 => [
                'nombre' => 'Toyota',                
                'logo' => "https://w7.pngwing.com/pngs/21/898/png-transparent-toyota-black-logo-car-logos.png"
            ]
            ];

            return $this->render('brands/brands.html.twig', [ 'marcas' => $marcas ]);            

    }


// Motos
#[Route('/motorcycle', name: 'motos')]
public function showMotercycles(): Response
{

    $motos = [
        0 => [
            'nombre' => 'Yamaha',                
            'modelo' => 'R6 Race',
            'foto' => 'https://www.yamaha-motor.com.au/-/media/products/motorcycle/road/supersport/2022/yzf-r6n/overview-panel/2022_yzf-r6_mdnm6_aus_stu_003_450x375.ashx'
        ],
        1 => [
            'nombre' => 'Aprilia',                
            'modelo' => 'RS 660',
            'foto' => 'https://images.piaggio.com/aprilia/vehicles/ap6115200ebp00/ap6115200ebp05/ap6115200ebp05-01-s.png'

        ]
        ];
    
        return $this->render('bikes/bikes.html.twig', [ 'motos' => $motos ]); 


}

}
