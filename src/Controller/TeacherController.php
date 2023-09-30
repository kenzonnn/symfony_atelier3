<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeacherController extends AbstractController
{
    #[Route('/teacher', name: 'app_teacher')]
    public function index(): Response
    {
        return new Response("Bonjour");
    }

    #[Route('/showteacher/{name}/{id}',name:'app_showteacher')]
    public function showTeacher($name,$id){
        return new Response("Bonjour ". $name.' '.$id);
    }
    #[Route('/show', name:'app_show')]
    public function show(){
        $title = "Teacher";
        $teachers = array (
            array ('id'=> 1 ,'name'=> 'test' , 'salaire'=> 1000),
            array ('id'=> 2 ,'name'=> 'abc' , 'salaire'=> 2000),
            array ('id'=> 3 ,'name'=> 'aze' , 'salaire'=> 3000),
            array ('id'=> 4 ,'name'=> 'lmn' , 'salaire'=> 4000),
            array ('id'=> 5 ,'name'=> 'xyz' , 'salaire'=> 5000)
        );
        return $this -> render('teacher/show.html.twig', ['t'=>$title , 'tt'=>$teachers]);
    }
    #[Route('/details/{id}' , name:'app_details')]
    public function details($id){
        return $this -> render('teacher/details.html.twig', ['id'=>$id]);
    }
    #[Route('/list', name:'app_list')]
    public function list(){
        $authors = array(
            array('id' => 1, 'picture' => '/images/AVT_Victor-Hugo_8486.jpg','username' => ' Victor Hugo', 'email' => 'victor.hugo@gmail.com ', 'nb_books' => 100),
            array('id' => 2, 'picture' => '/images/william-shakespeare-194895-1-402.jpg','username' => 'William Shakespeare', 'email' => ' william.shakespeare@gmail.com', 'nb_books' =>200 ),
            array('id' => 3, 'picture' => '/images/Taha_Hussein_1_crop.jpg','username' => ' Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300),
        );
        return $this -> render('teacher/list.html.twig', ['tableau'=>$authors]);
    }
    #[Route('/auhtorDetails/{id}/{name}/{email}/{nbreLivre}/{picture}' , name:'auhtorDetails' , requirements: ['picture' => '.+'])]
    public function auhtorDetails($id,$name,$email,$nbreLivre,$picture){
        return $this -> render('teacher/showAuthor.html.twig', ['id'=>$id , 'name'=>$name ,'email'=>$email , 'nbreLivre'=>$nbreLivre , 'picture'=>$picture]);
    }
}
