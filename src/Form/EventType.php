<?php
namespace App\Form;
use App\Entity\Events;
use App\Service\FileUploader;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => ['class' => 'form-control'],
                'row_attr' => ['class' => 'w-50 mx-2'],
            ])
            ->add('image', FileType::class, [
                'label'=>'upload picture', 'mapped' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '2048k',
                        'mimeTypes' => ['image/png', 'image/jpeg', 'image/jpg'],
                        "mimeTypesMessage" => 'please upload a valid img file',
                    ])
                    ],
                'row_attr' => ['class' => 'w-25 mx-2'],
                'attr' => ['class' => 'form-control'],
                'required' => false
            ])
            ->add('description', TextType::class, [
                'row_attr' => ['class' => 'w-100 mx-2'],
                'attr' => ['class' => 'form-control w-100']
            ])
            ->add('capacity', IntegerType::class, [
                'row_attr' => ['class' => 'w-25 mx-2'],
                'attr' => ['class' => 'form-control']
            ])
            ->add('email', TextType::class, [
                'row_attr' => ['class' => 'w-25 mx-2'],
                'attr' => ['class' => 'form-control']
            ])
            ->add('phone', TextType::class, [
                'row_attr' => ['class' => 'w-25 mx-2'],
                'attr' => ['class' => 'form-control']
            ])
            ->add('address', TextType::class, [
                'row_attr' => ['class' => 'w-50 mx-2'],
                'attr' => ['class' => 'form-control']
            ])
            ->add('zip', TextType::class, [
                'row_attr' => ['class' => 'w-25 mx-2'],
                'attr' => ['class' => 'form-control']
            ])
            ->add('city', TextType::class, [
                'row_attr' => ['class' => 'w-25 mx-2'],
                'attr' => ['class' => 'form-control']
            ])
            ->add('url', TextType::class, [
                'row_attr' => ['class' => 'w-50 mx-2'],
                'attr' => ['class' => 'form-control']
            ])
            ->add('type', ChoiceType::class, [
                'choices' => ['Music' => 'Music', 'Theatre' => 'Theatre', 'Sport' => 'Sport', 'Museum' => 'Museum'],
                'attr' => ['class' => 'form-control']
            ])
            ->add('date', DateTimeType::class, [
                'row_attr' => ['class' => 'w-50 m-2'],
                'attr' => []
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Go!',
                'attr' => ['class' => 'btn-primary btn-sm my-5']
            ]);
    }
public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Events::class,
        ]);
    }
}