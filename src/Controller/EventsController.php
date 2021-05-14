<?php

namespace App\Controller;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType; //For number fields
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType; //I did not implement this yet
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Events;

class EventsController extends AbstractController
{
    // This leads to the index page where all events are printed
    
    #[Route('/', name: 'events')]
    public function index(): Response
    {
        $events = $this->getDoctrine()->getRepository('App:Events')->findAll();
        // dd($events); // for testing purposes

        return $this->render('events/index.html.twig', array('events' => $events));
    }

    // Creating events form
    
    #[Route('/create', name: 'events_create')]
    public function create(Request $request): Response
    {
        $event = new Events;

        $form = $this->createFormBuilder($event)
            ->add('name', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('event_date', DateTimeType::class, array('attr' => array('style' => 'margin-bottom:15px')))
            ->add('description', TextareaType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('image', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('capacity', IntegerType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('email', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('phone', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('address', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('web_address', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('type', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))

            ->add('save', SubmitType::class, array('label' => 'Create Event', 'attr' => array('class' => 'btn-primary', 'style' => 'margin-bottom:15px')))
            ->getForm();

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $name = $form['name']->getData();
            $event_date = $form['event_date']->getData();
            $description = $form['description']->getData();
            $image = $form['image']->getData();
            $capacity = $form['capacity']->getData();
            $email = $form['email']->getData();
            $phone = $form['phone']->getData();
            $address = $form['address']->getData();
            $web_address = $form['web_address']->getData();
            $type = $form['type']->getData();


            $event->setName($name);
            $event->setEventDate($event_date);
            $event->setDescription($description);
            $event->setImage($image);
            $event->setCapacity($capacity);
            $event->setEmail($email);
            $event->setPhone($phone);
            $event->setAddress($address);
            $event->setWebAddress($web_address);
            $event->setType($type);


            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();

            $this->addFlash(
                'notice',
                'Event Added'
            );

            return $this->redirectToRoute('events');
        }

        return $this->render('events/create.html.twig', array('form' => $form->createView()));
    }

    // Edit events form
    
    #[Route('/edit/{id}', name: 'events_edit')]
    public function edit(Request $request, $id): Response
    {
        $event = $this->getDoctrine()->getRepository('App:Events')->find($id);

        $form = $this->createFormBuilder($event)
            ->add('name', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('event_date', DateTimeType::class, array('attr' => array('style' => 'margin-bottom:15px')))
            ->add('description', TextareaType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('image', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('capacity', IntegerType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('email', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('phone', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('address', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('web_address', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('type', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))

            ->add('save', SubmitType::class, array('label' => 'Update Event', 'attr' => array('class' => 'btn-primary', 'style' => 'margin-bottom:15px')))
            ->getForm();

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {

            $name = $form['name']->getData();
            $event_date = $form['event_date']->getData();
            $description = $form['description']->getData();
            $image = $form['image']->getData();
            $capacity = $form['capacity']->getData();
            $email = $form['email']->getData();
            $phone = $form['phone']->getData();
            $address = $form['address']->getData();
            $web_address = $form['web_address']->getData();
            $type = $form['type']->getData();


            $event->setName($name);
            $event->setEventDate($event_date);
            $event->setDescription($description);
            $event->setImage($image);
            $event->setCapacity($capacity);
            $event->setEmail($email);
            $event->setPhone($phone);
            $event->setAddress($address);
            $event->setWebAddress($web_address);
            $event->setType($type);


            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();

            $this->addFlash(
                'notice',
                'Event changed'
            );

            return $this->redirectToRoute('events');
        }

        return $this->render('events/edit.html.twig', array('event' => $event, 'form' => $form->createView()));
    }

    // Leads to the details page of the certain event

    #[Route('/details/{id}', name: 'events_details')]
    public function details($id): Response
    {
        $event = $this->getDoctrine()->getRepository('App:Events')->find($id);
        return $this->render('events/details.html.twig', array('event' => $event));
    }

    // Delete certain event
    
    #[Route('/delete/{id}', name: 'events_delete')]
    public function delete($id){
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('App:Events')->find($id);
        $em->remove($event);
       

        $em->flush();
        $this->addFlash(
            'notice',
            'Event Removed'
        );       

        return $this->redirectToRoute('events');
    }
}
