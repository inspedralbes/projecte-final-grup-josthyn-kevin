<?php

namespace App\Controller;

use App\Entity\Partidas;
use App\Entity\Quiz;
use App\Repository\PreguntasRepository;
use App\Repository\QuizRepository;
use App\Repository\PartidasRepository;
use App\Repository\RespuestasRepository;
use App\Repository\UsuarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PreguntasController extends AbstractController
{
    private PreguntasRepository $preguntasRepository;
    private QuizRepository $quizRepository;
    private PartidasRepository $partidasRepository;
    private RespuestasRepository $respuestasRepository;
    private UsuarioRepository $usuarioRepository;

    public function __construct(PreguntasRepository $preguntasRepository, QuizRepository $quizRepository, PartidasRepository $partidasRepository,RespuestasRepository $respuestasRepository, UsuarioRepository $usuarioRepository )
    {
        $this->preguntasRepository = $preguntasRepository;
        $this->quizRepository = $quizRepository;
        $this->partidasRepository = $partidasRepository;
        $this->respuestasRepository = $respuestasRepository;
        $this->usuarioRepository = $usuarioRepository;
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
        $quiz =$this->quizRepository->findOneBy(['id'=> $request->get('quiz')]);
        $array=json_decode($_POST["resposta"]);
        $puntos=0;
        foreach ($array as $item) {
            $respuesta=$item;
            if($respuesta==1){
                $puntos+=10;
            }
        }
        $partida = new Partidas;
        $partida->setPuntuacion($puntos);
        $partida->setQuiz($quiz);
        $partida->setNombre($request->get('nombre'));

        $this->partidasRepository->add($partida);

        return new JsonResponse(['puntuacion' => $puntos], Response::HTTP_OK);
    }

    #[Route('/anadir/quiz', name: 'api_añadir_quiz', methods: ['POST'])]
    public function newQuiz(Request $request)
    {
        $usuario =$this->usuarioRepository->findOneBy(['id'=> $request->get('usuario')]);

        $quiz = new Quiz;
        $quiz->setTitulo($request->get('titulo'));
        $quiz->setUsuario($usuario);
        $this->quizRepository->add($quiz);



        return new JsonResponse(['status' => 'Quiz añadido'], Response::HTTP_CREATED);

    }




}
