<?php
namespace App\Controller;
use App\Entity\Events;
use App\Service\FileUploader;
use App\Form\EventType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class EventsController extends AbstractController
{
    #[Route('/', name: 'app_events')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $events = $doctrine->getRepository(Events::class)->findAll();
        return $this->render('events/index.html.twig', ['events' => $events]);
    }
    #[Route('/details/{id}', name: 'app_details')]
    public function details(ManagerRegistry $doctrine, $id): Response
    {
        $event = $doctrine->getRepository(Events::class)->find($id);
        return $this->render('events/details.html.twig', ['event' => $event]);
    }
    #[Route('/create', name: 'app_create')]
    public function create(Request $request, ManagerRegistry $doctrine, FileUploader $fileUploader): Response
    {
        $event = new Events();
        $now = new \DateTime("now");
        $event->setDate($now);
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();
            if ($imageFile) {
                $imageFileName = $fileUploader->upload($imageFile);
                $event->setImage($imageFileName);
            } else {
                $imageFileName = "default.png";
                $event->setImage($imageFileName);
            }
            $event = $form->getData();
            $em = $doctrine->getManager();
            $em->persist($event);
            $em->flush();
            $this->addFlash(
                'notice',
                'event Added'
                );
            return $this->redirectToRoute('app_events');
        }
        return $this->render('events/create.html.twig', ['form' => $form->createView()]);
    }
    #[Route('/edit/{id}', name: 'app_edit')]
    public function edit(Request $request, ManagerRegistry $doctrine, $id, FileUploader $fileUploader): Response
    {
        $event = $doctrine->getRepository(Events::class)->find($id);
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $event = $form->getData();
            $imageFile = $form->get('image')->getData();
            if ($imageFile) {
                $imageFileName = $event->getImage();
                if ($imageFileName != "default.png") {
                    unlink("images/{$imageFileName}");
                }
                $imageFileName = $fileUploader->upload($imageFile);
                $event->setImage($imageFileName);
            } else if (!$imageFile && $event->getImage() == "default.png") {
                $imageFileName = "default.png";
                $event->setImage($imageFileName);
            } else {
                $imageFileName = $event->getImage();
                $event->setImage($imageFileName);
            }
            $em = $doctrine->getManager();
            $em->persist($event);
            $em->flush();
            $this->addFlash('notice', 'event edited');
            return $this->redirectToRoute('app_events');
        }
        return $this->render('events/edit.html.twig', ['form' => $form->createView(), 'event' => $event]);
    }
    #[Route('/delete/{id}', name: 'app_delete')]
    public function delete(ManagerRegistry $doctrine, $id){
        $em = $doctrine->getManager();
        $event = $em->getRepository(Events::class)->find($id);
        $imageFileName = $event->getImage();
        if ( $imageFileName != "default.png") {
            unlink("images/{$imageFileName}");
        }
        $em->remove($event);
        $em->flush();
        $this->addFlash(
            'notice',
            'event Removed'
        );
        return $this->redirectToRoute('app_events');
    }
    #[Route('filter/{filter}', name: 'app_filter')]
    public function filter(ManagerRegistry $doctrine, $filter): Response
    {
        $events = $doctrine->getRepository(Events::class)->findBy(['type' => $filter]);
        return $this->render('events/index.html.twig', ['events' => $events]);
    }
}
