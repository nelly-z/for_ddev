<?php
namespace App\Controller;

use App\Entity\Feedback;
use App\Form\FeedbackFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\{Request, Response};
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class FeedbackController extends AbstractController
{
    #[Route('/feedback', name:'app_feedback')]
    #[IsGranted('ROLE_USER')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $fb = new Feedback();
        $form = $this->createForm(FeedbackFormType::class, $fb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var \App\Entity\User $user */
            $user = $this->getUser();
            $fb->setUser($user);
            $em->persist($fb);
            $em->flush();

            return $this->redirectToRoute('app_feedback_thanks');
        }

        return $this->render('feedback/new.html.twig', ['form'=>$form->createView()]);
    }

    #[Route('/feedback/thanks', name:'app_feedback_thanks')]
    public function thanks(): Response { return $this->render('feedback/thanks.html.twig'); }
}