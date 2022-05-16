<?php

namespace App\Controller;

use App\Entity\Partidas;
use App\Entity\Quiz;
use App\Entity\Preguntas;
use App\Entity\Respuestas;
use App\Entity\Respuestaspartida;
use App\Repository\PreguntasRepository;
use App\Repository\QuizRepository;
use App\Repository\PartidasRepository;
use App\Repository\RespuestasRepository;
use App\Repository\UsuarioRepository;
use App\Repository\RespuestaspartidaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;

$propertyAccessor = PropertyAccess::createPropertyAccessor();

class PreguntasController extends AbstractController
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


    #[Route('/preguntas', name: 'app_preguntas')]
    public function index(): Response
    {
        return $this->render('preguntas/index.html.twig', [
            'controller_name' => 'PreguntasController',
        ]);
    }

    #[Route('/quiz', name: 'api_quiz', methods: ['GET'])]
    public function showQuiz()
    {
        $quizs = $this->quizRepository->findAll();

        $data = [];

        foreach ($quizs as $quiz) {
            $data[] = [
                'id' => $quiz->getId(),
                'titulo' => $quiz->getTitulo(),
            ];
        }
        return new JsonResponse($data, Response::HTTP_OK);
    }

    #[Route('/preguntas/{id}', name: 'api_one', methods: ['GET'])]
    public function show($id)
    {
        $preguntas = $this->preguntasRepository->findBy(['idQuiz' => $id]);
        $quiz = $this->quizRepository->findOneBy(['id' => $id]);
        //$partidas = $this->partidasRepository->encontrarMejoresJugadores($id);
        $data1=[];
        $i=0;

        foreach ($preguntas as $pregunta) {
            $idPregunta=$pregunta->getId();
            $data1[$i] = [
                        'id' => $idPregunta,
                        'enunciado' => $pregunta->getEnunciado(),
                        'respuestas' => $this->respuestasRepository->respuestas($id, $idPregunta),
                        ];
                        $i++;
        }
        $data= [
            'id_quiz' => $quiz->getId(),
            'titulo' => $quiz->getTitulo(),
            'preguntas' => $data1,

        ];
        return new JsonResponse($data, Response::HTTP_OK);
    }



    #[Route('/anadir/partida', name: 'api_añadir_partida', methods: ['POST'])]
    public function new(Request $request)
    {

        $array = $request->toArray();
        $idQuiz=$array['id_quiz'];
        $idUsuario=$array['usuario'];
        $quiz =$this->quizRepository->findOneBy(['id'=> $idQuiz]);
        $usuario=$this->usuarioRepository->findOneBy(['id'=> $idUsuario]);
        $puntos=0;
        for ($i=0;$i<10;$i++) {
                $respuesta = $array['respuestas'][$i]['estado'];
                if ($respuesta == 1) {
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


            $idPregunta=$array['respuestas'][$i]['id_pregunta'];
            $idRespuesta=$array['respuestas'][$i]['id_respuesta'];

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

    #[Route('/anadir/quiz', name: 'api_añadir_quiz', methods: ['POST'])]
    public function newQuiz(Request $request)
    {
        $array = $request->toArray();
        $user = $array['usuario'];
        $titulo = $array['titulo'];

        $usuario =$this->usuarioRepository->findOneBy(['id'=> $user]);
        $quiz = new Quiz;
        $quiz->setTitulo($titulo);
        $quiz->setUsuario($usuario);
        $this->quizRepository->add($quiz);

        $quiz_id=$this->quizRepository->ultimoQuiz($user);

        $quiz =$this->quizRepository->findOneBy(['id'=> $quiz_id]);

        for ($i=0;$i<10;$i++) {

            $pregunta = new Preguntas;
            $pregunta->setIdQuiz($quiz);
            $pregunta->setEnunciado($array['preguntas'][$i]['enunciado']);
            $this->preguntasRepository->add($pregunta);
            $pregunta_id=$this->preguntasRepository->ultimaPregunta($quiz_id);

            $idPregunta=$this->preguntasRepository->findOneBy(['id'=> $pregunta_id]);

            for ($j=0;$j<5;$j++) {
                $res=$array['preguntas'][$i]['respuestas'][$j]['respuesta'];
                $estado=$array['preguntas'][$i]['respuestas'][$j]['estado'];

                $respuesta = new Respuestas;
                $respuesta->setEstado($estado);
                $respuesta->setPregunta($idPregunta);
                $respuesta->setRespuesta($res);
                $this->respuestasRepository->add($respuesta);

            }
        }

        return new JsonResponse(['status' => 'Quiz añadido'], Response::HTTP_CREATED);

    }




}
