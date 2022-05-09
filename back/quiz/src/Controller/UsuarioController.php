<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Repository\UsuarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class UsuarioController extends AbstractController
{
    private UsuarioRepository $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;

    }

    #[Route('/usuario', name: 'app_usuario')]
    public function index(): Response
    {
        return $this->render('usuario/index.html.twig', [
            'controller_name' => 'UsuarioController',
        ]);
    }

    #[Route('/anadir/usuario', name: 'api_añadir', methods: ['GET','POST'])]
    public function new(Request $request)
    {
        $registrado = $this->usuarioRepository->findOneBy(['correo' => $request->get('correo')]);

        if (empty($registrado)){
            $contrasena=password_hash($request->get('contrasena'), PASSWORD_BCRYPT);

            $usuario = new Usuario();
            $usuario->setCorreo($request->get('correo'));
            $usuario->setNombre($request->get('nombre'));
            $usuario->setApellido($request->get('apellido'));
            $usuario->setContrasena($contrasena);
            $this->usuarioRepository->add($usuario);

            return new JsonResponse(['status' => 'Usuario registrado correctamente'], Response::HTTP_CREATED);

            }else{

            return new JsonResponse(['status' => 'El Usuario ya existe'], Response::HTTP_CREATED);

            }

    }



}
