<?php
namespace App\Form;

use App\Entity\Feedback;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\{ChoiceType, DateType, TextareaType};
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FeedbackFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $b, array $o)
    {
        $b->add('dateVisited', DateType::class, ['widget'=>'single_text'])
          ->add('overallRating', ChoiceType::class, [
              'choices'=>[1=>1,2=>2,3=>3,4=>4,5=>5],
              'expanded'=>false, 'multiple'=>false
          ])
          ->add('comments', TextareaType::class, ['required'=>false])
          ->add('extraFeedback', TextareaType::class, ['required'=>false]);
    }
    public function configureOptions(OptionsResolver $r){ 
        $r->setDefaults([
            'data_class'=>Feedback::class,
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id' => 'feedback_form'
        ]); 
    }
}