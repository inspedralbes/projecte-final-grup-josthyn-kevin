<?php

namespace App\Controller;

use App\Entity\Partidas;
use App\Entity\Quiz;
use App\Repository\PreguntasRepository;
use App\Repository\QuizRepository;
use App\Repository\PartidasRepository;
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

    public function __construct(PreguntasRepository $preguntasRepository, QuizRepository $quizRepository, PartidasRepository $partidasRepository)
    {
        $this->preguntasRepository = $preguntasRepository;
        $this->quizRepository = $quizRepository;
        $this->partidasRepository = $partidasRepository;
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
        $data1=[];
        $i=0;

        foreach ($preguntas as $pregunta) {
            $data1[$i] = [
                        'id' => $pregunta->getId(),
                        'enunciado' => $pregunta->getEnunciado(),
                        'r1' => $pregunta->getR1(),
                        'r2' => $pregunta->getR2(),
                        'r3' => $pregunta->getR3(),
                        'r4' => $pregunta->getR4(),
                        'r5' => $pregunta->getR5()
                        ];
                        $i++;
        }
        $data[] = [
            'id_quiz' => $quiz->getId(),
            'titulo' => $quiz->getTitulo(),
            'preguntas' => $data1

        ];
        return new JsonResponse($data, Response::HTTP_OK);
    }


    #[Route('/anadir', name: 'api_añadir', methods: ['POST'])]
    public function new(Request $request)
    {
        $quiz =$this->quizRepository->findOneBy(['id'=> $request->get('quiz')]);
        $array=json_decode($_POST["Reposta"]);
        $puntos=0;
        foreach ($array as $item) {
            $respuesta=$item;
            if($respuesta=="r1"){
                $puntos+=10;
            }
        }
        $partida = new Partidas;
        $partida->setPuntuacion($puntos);
        $partida->setQuiz($quiz);

        $this->partidasRepository->add($partida);

        return new JsonResponse(['puntuacion' => $puntos], Response::HTTP_OK);
    }


}
