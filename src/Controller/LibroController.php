<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LibroController extends AbstractController
{  //metodo util para trabajar con los controladores

    /**
     * @Route("/libro/listar", name="listar_libro")
     * 
     */
    public function listarLibro(Request $request)
    // accion, metodo de nuestro controller q esta asociada a nuestra ruta
    //aparte de  Request $request, tambíen pueden recibir servicios
    {
        //  lo que recibe
        $titulo = $request->get('titulo');
        // $titulo = $request->get('titulo', 'Alegria'); //enviar por defecto un valor

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
