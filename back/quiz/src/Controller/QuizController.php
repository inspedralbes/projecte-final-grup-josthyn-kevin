<?php

namespace App\Controller;

use App\Entity\Quiz;
use App\Entity\Preguntas;
use App\Entity\Respuestas;
use App\Repository\PreguntasRepository;
use App\Repository\QuizRepository;
use App\Repository\RespuestasRepository;
use App\Repository\UsuarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class QuizController extends AbstractController
{
    private PreguntasRepository $preguntasRepository;
    private QuizRepository $quizRepository;
    private RespuestasRepository $respuestasRepository;
    private UsuarioRepository $usuarioRepository;

    public function __construct(PreguntasRepository $preguntasRepository, QuizRepository $quizRepository,RespuestasRepository $respuestasRepository, UsuarioRepository $usuarioRepository )
    {
        $this->preguntasRepository = $preguntasRepository;
        $this->quizRepository = $quizRepository;
        $this->respuestasRepository = $respuestasRepository;
        $this->usuarioRepository = $usuarioRepository;
    }


    #[Route('/quiz', name: 'api_quiz', methods: ['GET'])]
    public function show()
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



    #[Route('/anadir/quiz', name: 'api_añadir_quiz', methods: ['POST'])]
    public function new(Request $request)
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


    #[Route('/quiz/usuario/{id}', name: 'api_quiz_usuario', methods: ['GET'])]
    public function mostrarQuizUsuario($id)
    {
        $quizs = $this->quizRepository->quizUsuario($id);

        return new JsonResponse($quizs, Response::HTTP_OK);

    }

    #[Route('/quiz/puntuacion/{id}', name: 'api_quiz_puntuacion', methods: ['GET'])]
    public function quizPuntuacion($id)
    {
        $quizs = $this->quizRepository->quizJugados($id);
        //$partidas = $this->quizRepository->quizPuntuacion();
        $i=0;
        $data = [];

        foreach ($quizs as $quiz) {
            $quizID=$quiz['quiz_id'];
            $data[$i]=[
                'quiz' =>$this->quizRepository->quizPuntuacion($quizID,$id),
            ];
            $i++;
        }


        return new JsonResponse($data, Response::HTTP_OK);

    }




}
