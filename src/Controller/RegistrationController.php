<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use App\Entity\Army;
use App\Entity\Village;
use App\Entity\Castle;
use App\Entity\Quarry;
use App\Entity\Barrack;
use App\Entity\Field;
use App\Entity\Sawmill;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'register')]
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $form = $this->createFormBuilder()
            ->add('nick')
            ->add('email')
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'required' => true,
                'first_options' => ['label' => 'Hasło'],
                'second_options' => ['label' => 'Powtórz hasło']
            ])
            ->add('register', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ])
            ->getForm()
        ;

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();

            $army = new Army();
            $army->setWorriors(0);
            $army->setArchers(0);
            $em->persist($army);

            $user = new User();
            $user->setNick($data['nick']);
            $user->setEmail($data['email']);
            $user->setPassword(
                $passwordEncoder->encodePassword($user, $data['password'])
            );
            $user->setWood(100);
            $user->setStone(100);
            $user->setCreral(100);
            $user->setIdArmy($army->getId());
            $user->setGlory(0);
            $user->setAdmin(false);
            $user->setBanned(false);
            $em->persist($user);

            $village = new Village();
            $village->setIdUser($user->getId());
            $castle = $em->getRepository(Castle::class)->find(1);
            $village->setIdCastle($castle);
            $sawmill = $em->getRepository(Sawmill::class)->find(1);
            $village->setIdSawmill($sawmill);
            $quraay = $em->getRepository(Quarry::class)->find(1);
            $village->setIdQuarry($quraay);
            $field = $em->getRepository(Field::class)->find(1);
            $village->setIdField($field);
            $barrack = $em->getRepository(Barrack::class)->find(1);
            $village->setIdBarrack($barrack);
            $em->persist($village);

            $em->flush();

            return $this->redirect($this->generateUrl('app_login'));
        }

        return $this->render('registration/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
