<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LibroController extends AbstractController
{  //metodo util para trabajar con los controladores

    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @Route("/libro/listar", name="listar_libro")
     * 
     */
    public function listarLibro(Request $request, LoggerInterface $logger)
    // accion, metodo de nuestro controller q esta asociada a nuestra ruta
    //aparte de  Request $request, tambíen pueden recibir servicios
    // servicios(clases q hacen cosas y todos están dentro de un container que contiene todos los servicios)
    {
        //  lo que recibe
        $titulo = $request->get('titulo');
        // $titulo = $request->get('titulo', 'Alegria'); //enviar por defecto un valor
        
        $logger->info('Logueado correctamente'); //llamar el logger 

        // devolver un objeto de la clase response
        $response = new  JsonResponse();
        $response->setData([
            'success' => true,
            'data' => [
                [
                    'id' => 1,
                    'titulo' => 'El trabajo'
                ],
                [
                    'id' => 2,
                    'titulo' => 'El libro de luis'
                ],
                [
                    'id' => 3,
                    'titulo' => $titulo
                ]
            ]
        ]);
        return $response;
    }
}
