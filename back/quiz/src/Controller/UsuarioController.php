<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Repository\UsuarioRepository;
use App\Repository\QuizRepository;
use App\Repository\PartidasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class UsuarioController extends AbstractController
{
    private UsuarioRepository $usuarioRepository;
    private QuizRepository $quizRepository;
    private PartidasRepository $partidasRepository;

    public function __construct(UsuarioRepository $usuarioRepository, QuizRepository $quizRepository, PartidasRepository $partidasRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
        $this->quizRepository = $quizRepository;
        $this->partidasRepository = $partidasRepository;
    }

    #[Route('/usuario', name: 'app_usuario')]
    public function index(): Response
    {
        return $this->render('usuario/index.html.twig', [
            'controller_name' => 'UsuarioController',
        ]);
    }

    #[Route('/anadir/usuario', name: 'api_añadir_usuario', methods: ['POST'])]
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

    #[Route('/login', name: 'api_añadir', methods: ['GET', 'POST'])]
    public function login(Request $request)
    {

        $correo=$request->get('correo');
        $contrasena=$request->get('contrasena');
        $usuario = $this->usuarioRepository->findOneBy(['correo' => $correo]);

        if (!empty($usuario)){

            $contrasenaBBDD=$usuario->getContrasena();

            if (password_verify($contrasena,$contrasenaBBDD)){

                $data= [
                    'id' => $usuario->getId(),
                    'correo' => $correo,
                    'contrasena' => $contrasena,
                    'nombre' => $usuario->getNombre(),
                    'apellido' => $usuario->getApellido(),
                    'admin' => $usuario->isAdmin()

                ];

                return new JsonResponse($data, Response::HTTP_OK);

            }

            return new JsonResponse(['status' => 'Contraseña incorrecta'], Response::HTTP_CREATED);

        }else{

            return new JsonResponse(['status' => 'Correo no registrado o incorrecto'], Response::HTTP_CREATED);

        }

    }

    #[Route('/modificar/usuario/{id}', name: 'api_modificar_usuario', methods: ['GET','POST'])]
    public function modificar(Request $request, $id)
    {

        $id = $this->usuarioRepository->findOneBy(['id' => $id]);
        $correo=$request->get('correo');
        $existe = $this->usuarioRepository->findOneBy(['correo' => $correo]);
        $correoAnterior=$id->getCorreo();

        $contrasenaNueva=$request->get('contrasena');
        $contrasena=password_hash($contrasenaNueva, PASSWORD_BCRYPT);

        if (empty($existe)){
            $usuario = $id;
            $usuario->setCorreo($correo);
            $usuario->setNombre($request->get('nombre'));
            $usuario->setApellido($request->get('apellido'));
            $usuario->setContrasena($contrasena);
            $this->usuarioRepository->update($usuario);

            return new JsonResponse(['status' => 'Usuario modificado correctamente'], Response::HTTP_CREATED);
        }else if(!empty($existe) && $correoAnterior==$correo) {

            $usuario = $id;
            $usuario->setNombre($request->get('nombre'));
            $usuario->setApellido($request->get('apellido'));
            $usuario->setContrasena($contrasena);
            $this->usuarioRepository->update($usuario);

            return new JsonResponse(['status' => 'Usuario modificado correctamente'], Response::HTTP_CREATED);

        }else{

            return new JsonResponse(['status' => 'El correo que intenta introducir ya existe'], Response::HTTP_CREATED);

        }

    }

    #[Route('/eliminar/usuario/{id}', name: 'api_eliminar', methods: ['DELETE'])]
    public function eliminar($id)
    {
        $usuario = $this->usuarioRepository->findOneBy(['id' => $id]);

        //Utilitza el mètode creat al repository amb el controlador
        $this->usuarioRepository->remove($usuario);

        return new JsonResponse(['status' => 'Usuario eliminado'], Response::HTTP_CREATED);

    }

    #[Route('/mejoresUsuarios', name: 'api_mejoresUsuarios', methods: ['GET'])]
    public function mejoresUsuarios()
    {
        $usuarios = $this->usuarioRepository->encontrarUsuariosPartidas();
        print_r($usuarios);
        foreach ($usuarios as $usuario) {

            $id = $usuario['usuario'];
            $puntuacion = $this->partidasRepository->puntuacionTotalJugador($id);
            $datosUsuario = $this->usuarioRepository->findOneBy(['id' => $id]);

            $data[] = [
                'id' => $id,
                'nombre' => $datosUsuario->getNombre(),
                'apellido' => $datosUsuario->getApellido(),
                'puntuacion' => $puntuacion,

            ];
            $price = array_column($data, 'puntuacion');
            array_multisort($price, SORT_DESC, $data);
            $data1 = array_slice($data, 0, 5);

        }
        return new JsonResponse($data1, Response::HTTP_OK);
    }





}
