<?php

namespace App\Controller;

use App\Entity\Respuestaspartida;
use App\Entity\Partidas;
use App\Repository\PartidasRepository;
use App\Repository\PreguntasRepository;
use App\Repository\QuizRepository;
use App\Repository\RespuestaspartidaRepository;
use App\Repository\RespuestasRepository;
use App\Repository\UsuarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class PartidaController extends AbstractController
{

    private PreguntasRepository $preguntasRepository;
    private QuizRepository $quizRepository;
    private PartidasRepository $partidasRepository;
    private RespuestasRepository $respuestasRepository;
    private UsuarioRepository $usuarioRepository;
    private RespuestaspartidaRepository $respuestaspartidaRepository;

    public function __construct(PreguntasRepository $preguntasRepository, QuizRepository $quizRepository, PartidasRepository $partidasRepository,RespuestasRepository $respuestasRepository, UsuarioRepository $usuarioRepository, RespuestaspartidaRepository $respuestaspartidaRepository )
    {
        $this->preguntasRepository = $preguntasRepository;
        $this->quizRepository = $quizRepository;
        $this->partidasRepository = $partidasRepository;
        $this->respuestasRepository = $respuestasRepository;
        $this->usuarioRepository = $usuarioRepository;
        $this->respuestaspartidaRepository = $respuestaspartidaRepository;
    }

    #[Route('/partida', name: 'app_partida')]
    public function index(): Response
    {
        return $this->render('partida/index.html.twig', [
            'controller_name' => 'PartidaController',
        ]);
    }

    #[Route('/anadir/partida', name: 'api_añadir_partida', methods: ['POST'])]
    public function new(Request $request)
    {

        $quiz =$this->quizRepository->findOneBy(['id'=> $request->get('quiz')]);
        $usuario=$this->usuarioRepository->findOneBy(['id'=> $request->get('idUsuario')]);
        $puntos=0;
        $respuestas=json_decode($_POST["respostas"]);

        for ($i=0;$i<10;$i++) {
            $respuesta = $this->respuestasRepository->estado($respuestas[$i]);
            if ($respuesta[0]["estado"] == 1) {
                $puntos += 10;
            }
        }
        $partida = new Partidas;
        $partida->setQuiz($quiz);
        $partida->setPuntuacion($puntos);
        $partida->setUsuario($usuario);

        $this->partidasRepository->add($partida);

        $idpartida=$this->partidasRepository->ultimaPartida($usuario);


        for ($i=0;$i<10;$i++) {

            $preguntas = $this->respuestasRepository->estado($respuestas[$i]);
            $pregunta = $preguntas[0]["pregunta"];
            $idPregunta=$pregunta;
            $idRespuesta=$respuestas[$i];

            $id_partida=$this->partidasRepository->findOneBy(['id' => $idpartida]);
            $id_pregunta=$this->preguntasRepository->findOneBy(['id' => $idPregunta]);
            $id_respuesta=$this->respuestasRepository->findOneBy(['id' => $idRespuesta]);

            $respuestasPartida = new Respuestaspartida;
            $respuestasPartida->setIdpartida($id_partida);
            $respuestasPartida->setIdpregunta($id_pregunta);
            $respuestasPartida->setIdrespuesta($id_respuesta);

            $this->respuestaspartidaRepository->add($respuestasPartida);

        }

        //return new JsonResponse([$array], Response::HTTP_OK);
        return new JsonResponse(['status' => 'Partida Jugada'], Response::HTTP_CREATED);

    }

    #[Route('/partidas/{id}', name: 'api_jugadas_partida', methods: ['GET'])]
    public function partidasJugadas($id)
    {
        $numPartidas = $this->partidasRepository->partidasJugadas($id);

        return new JsonResponse($numPartidas, Response::HTTP_OK);

    }

}
