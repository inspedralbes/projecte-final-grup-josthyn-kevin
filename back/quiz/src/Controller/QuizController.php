<?php

namespace App\Controller;

use App\Entity\Quiz;
use App\Entity\Preguntas;
use App\Entity\Respuestas;
use App\Repository\PreguntasRepository;
use App\Repository\QuizRepository;
use App\Repository\RespuestasRepository;
use App\Repository\UsuarioRepository;
use App\Repository\PartidasRepository;
use App\Repository\TemaRepository;
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
    private PartidasRepository $partidasRepository;
    private TemaRepository $temaRepository;

    public function __construct(PreguntasRepository $preguntasRepository,TemaRepository $temaRepository, QuizRepository $quizRepository,RespuestasRepository $respuestasRepository, UsuarioRepository $usuarioRepository,PartidasRepository $partidasRepository )
    {
        $this->preguntasRepository = $preguntasRepository;
        $this->quizRepository = $quizRepository;
        $this->respuestasRepository = $respuestasRepository;
        $this->usuarioRepository = $usuarioRepository;
        $this->partidasRepository = $partidasRepository;
        $this->temaRepository=$temaRepository;
    }

    #[Route('/quiz', name: 'api_quiz_all', methods: ['GET'])]
    public function allQuiz()
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

    #[Route('/quiz/{id}', name: 'api_quiz', methods: ['GET'])]
    public function show($id)
    {
        $quizs = $this->quizRepository->findBy(['tema'=> $id]);

        $data = [];

        foreach ($quizs as $quiz) {
            $data[] = [
                'id' => $quiz->getId(),
                'titulo' => $quiz->getTitulo(),
            ];
        }
        return new JsonResponse($data, Response::HTTP_OK);
    }

    #[Route('/tema', name: 'api_tema', methods: ['GET'])]
    public function tema()
    {
        $quizs = $this->temaRepository->findAll();

        $data = [];

        foreach ($quizs as $quiz) {
            $data[] = [
                'id' => $quiz->getId(),
                'titulo' => $quiz->getNombre(),
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
        //$theme = $array['tema'];

        //$tema=$this->temaRepository->findOneBy(['id'=> $theme]);
        $usuario =$this->usuarioRepository->findOneBy(['id'=> $user]);
        $quiz = new Quiz;
        $quiz->setTitulo($titulo);
        $quiz->setUsuario($usuario);
        //$quiz->setTema($tema);
        $this->quizRepository->add($quiz);

        $quiz_id=$this->quizRepository->ultimoQuiz($user);

        $quiz =$this->quizRepository->findOneBy(['id'=> $quiz_id]);

        for ($i=0;$i<5;$i++) {

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
        $i=0;

        foreach ($quizs as $quiz) {
            $quizID=$quiz['quiz_id'];
            $data1=$this->quizRepository->quizPuntuacion($quizID,$id);
            $data[$i]=[
                'id' => $data1[0]['id'],
                'titulo' => $data1[0]['titulo'],
                'puntuacion' => $data1[0]['puntuacion'],
            ];
            $i++;
        }
        return new JsonResponse($data, Response::HTTP_OK);

    }

    #[Route('/quiz/eliminar/{id}', name: 'api_quiz_eliminar', methods: ['DELETE'])]
    public function eliminarQuiz($id)
    {

        $quiz=$this->quizRepository->findOneBy(['id'=> $id]);

        $this->quizRepository->remove($quiz);

        return new JsonResponse(['status' => 'Quiz eliminado'], Response::HTTP_CREATED);

    }

    #[Route('/quiz/modificar/{id}', name: 'api_quiz_modificar', methods: ['POST'])]
    public function modificarQuiz(Request $request, $id)
    {
        $array = $request->toArray();
        $titulo = $array['titulo'];

        $j=0;
        $i=0;

        $idQuiz=$this->quizRepository->findOneBy(['id'=> $id]);
        $preguntas = $this->preguntasRepository->findBy(['idQuiz' => $id]);

        $quiz = $idQuiz;
        $quiz->setTitulo($titulo);
        $this->quizRepository->update($quiz);

        foreach ($preguntas as $pregunta) {

            $idPregunta=$pregunta->getId();
            $enunciado=$array['preguntas'][$i]['enunciado'];
            $pre=$this->preguntasRepository->findOneBy(['id'=> $idPregunta]);

            $preguntaN=$pre;
            $preguntaN->setEnunciado($enunciado);
            $this->preguntasRepository->update($preguntaN);

            $respuestas = $this->respuestasRepository->findBy(['pregunta' => $idPregunta]);

            foreach ($respuestas as $respuesta) {

                $idRespuesta=$respuesta->getId();
                $respu=$this->respuestasRepository->findOneBy(['id'=> $idRespuesta]);

                $res=$array['preguntas'][$i]['respuestas'][$j]['respuesta'];
                $estado=$array['preguntas'][$i]['respuestas'][$j]['estado'];

                $respuesta = $respu;
                $respuesta->setEstado($estado);
                $respuesta->setRespuesta($res);
                $this->respuestasRepository->update($respuesta);
                $j++;
            }
            $i++;
            $j=0;
        }
        return new JsonResponse(['status' => 'Quiz actualizado'], Response::HTTP_CREATED);
        //return new JsonResponse($preguntaN, Response::HTTP_OK);
    }

    #[Route('/masjugados', name: 'api_quiz_masJugados', methods: ['GET'])]
    public function quizMasJugados()
    {
        $quizsJugados = $this->partidasRepository->partidasIdQuiz();

        $data1 = [];
        $data = [];

        foreach ($quizsJugados as $quiz) {

            $id=$quiz['quiz_id'];
            $numPartidas = $this->partidasRepository->numPartidas($id);
            $titulo=$this->quizRepository->findOneBy(['id'=> $quiz['quiz_id']]);

            $data[] = [
                'id' => $id,
                'Titulo' => $titulo->getTitulo(),
                'cont' => $numPartidas,
            ];
            $price = array_column($data, 'cont');
            array_multisort($price, SORT_DESC, $data);
            $data1 = array_slice($data, 0, 5);
        }
        return new JsonResponse($data1, Response::HTTP_OK);
    }

    #[Route('/quiz/aleatorio', name: 'api_quiz_aleatorio', methods: ['GET'])]
    public function quizAleatorio()
    {
        $quiz = $this->quizRepository->quizAleatorio();
        return new JsonResponse($quiz, Response::HTTP_OK);
    }





}
