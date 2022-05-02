<?php

namespace App\Controller;

use App\Repository\PreguntasRepository;
use App\Repository\QuizRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class PreguntasController extends AbstractController
{
    private PreguntasRepository $preguntasRepository;
    private QuizRepository $quizRepository;

    public function __construct(PreguntasRepository $preguntasRepository, QuizRepository $quizRepository)
    {
        $this->preguntasRepository = $preguntasRepository;
        $this->quizRepository = $quizRepository;
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
        $quiz2 = $this->quizRepository->findOneBy(['id' => $id]);
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
            'id_quiz' => $quiz2->getId(),
            'preguntas' => $data1

        ];
        return new JsonResponse($data, Response::HTTP_OK);
    }




}
