<?php
namespace App\Form;

use App\Entity\User;
use App\Entity\Service;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\{BirthdayType, DateTimeType, EmailType, PasswordType, RepeatedType, TextareaType, TextType};
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $b, array $o)
    {
        $b->add('firstname', TextType::class, ['constraints'=>[new Assert\NotBlank()]])
          ->add('lastname', TextType::class, ['constraints'=>[new Assert\NotBlank()]])
          ->add('email', EmailType::class, ['constraints'=>[new Assert\NotBlank(), new Assert\Email()]])
          ->add('birthday', BirthdayType::class, ['widget'=>'single_text'])
          ->add('password', RepeatedType::class, [
              'type'=>PasswordType::class,
              'first_options'=>['label'=>'Password'],
              'second_options'=>['label'=>'Repeat Password'],
              'invalid_message'=>'Passwords must match.'
          ])
          ->add('extraInfo', TextareaType::class, ['required'=>false])
          ->add('selectedService', EntityType::class, [
              'class'=>Service::class, 'choice_label'=>'name', 'placeholder'=>'Choose a service', 'required'=>false
          ])
          ->add('preferredDate', DateTimeType::class, ['widget'=>'single_text', 'required'=>false]);
    }

    public function configureOptions(OptionsResolver $resolver){ 
        $resolver->setDefaults([
            'data_class'=>User::class,
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id' => 'registration_form'
        ]); 
    }
}