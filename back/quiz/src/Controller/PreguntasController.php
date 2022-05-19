<?php

namespace App\Controller;
use App\Repository\PreguntasRepository;
use App\Repository\QuizRepository;
use App\Repository\RespuestasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


class PreguntasController extends AbstractController
{
    private PreguntasRepository $preguntasRepository;
    private QuizRepository $quizRepository;
    private RespuestasRepository $respuestasRepository;


    public function __construct(PreguntasRepository $preguntasRepository, QuizRepository $quizRepository,RespuestasRepository $respuestasRepository )
    {
        $this->preguntasRepository = $preguntasRepository;
        $this->quizRepository = $quizRepository;
        $this->respuestasRepository = $respuestasRepository;
    }


    #[Route('/preguntas', name: 'app_preguntas')]
    public function index(): Response
    {
        return $this->render('preguntas/index.html.twig', [
            'controller_name' => 'PreguntasController',
        ]);
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


}
