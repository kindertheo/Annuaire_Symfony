<?php

namespace App\Controller;

use App\Entity\Person;
use App\Form\PersonType;
use App\Repository\PersonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


/**
 * PersonController
 */
class PersonController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * index
     *
     * @param  mixed $person
     * @return Response
     */
    public function index(PersonRepository $person): Response
    {
        return $this->render("person/index.html.twig", ['allPerson' => $person->findAll()]);
    }

    /**
     * @Route("/add", name="add_person")
     * addPerson
     *
     * @param  mixed $person
     * @param  mixed $request
     * @param  mixed $manager
     * @return Response
     */
    public function addPerson(PersonRepository $person, Request $request, EntityManagerInterface $manager): Response
    {
        $person = new Person;
        $form = $this->createForm(PersonType::class, $person);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($person);
            $manager->flush();
            $this->addFlash("success", "La personne a bien été ajoutée!");
            return $this->redirectToRoute("home");
        }

        return $this->render("person/add.html.twig", ['form' => $form->createView()]);
    }

    /**
     * @Route("/update/{id}", name="update_person")
     * updatePerson
     *
     * @param  mixed $person
     * @param  mixed $request
     * @param  mixed $manager
     * @return Response
     */
    public function updatePerson(Person $person, Request $request, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(PersonType::class, $person);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($person);
            $manager->flush();
            $this->addFlash("success", "La personne a bien été modifiée");
            return $this->redirectToRoute("home");
        }

        return $this->render("person/update.html.twig", ['form' => $form->createView()]);
    }

    /**
     * @Route("/delete/{id}", name="delete_person")
     * deletePerson
     *
     * @param  mixed $person
     * @param  mixed $manager
     * @return Response
     */
    public function deletePerson(Person $person, EntityManagerInterface $manager): Response
    {
        $manager->remove($person);
        $manager->flush();

        $this->addFlash("success", "La personne a bien été supprimée");

        return $this->redirectToRoute("home");
    }

    /**
     * @Route("/search/",methods={"POST"}, name="search_person")
     * searchPerson
     *
     * @param  mixed $personRepo
     * @param  mixed $request
     * @return void
     */
    public function searchPerson(PersonRepository $personRepo, Request $request){
        $post = $request->request->get('search');

        $result = $personRepo->findByAllColumn($post);
        
        return $this->render("person/search.html.twig", ["result" => $result]);
    }
}
